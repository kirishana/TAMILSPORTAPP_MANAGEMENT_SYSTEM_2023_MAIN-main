<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\Season;
use App\Models\Organization;
use App\Models\VenueDetail;
use App\Models\OrganizationSetting;
use App\Exports\VenuehExport;

use App\generalSetting;
use App\Http\Controllers\Controller;
use App\Models\MainEvent;
use Illuminate\Support\Facades\Validator;
use Response;
use DB;
use Auth;
use PDF;
use Excel;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Route;
use Session;

class VenueController extends Controller
{
    public function index(Request $request)
    {

        // dd(Route::current()->getParameter('id'));
        $id=Session::get('id');
        $search=Session::forget('search');
        $sortby=Session::forget('sortby');
        $sorttype=Session::forget('sorttype');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();	
        $organizations = Organization::all();
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        // foreach ($seasons as $season) {
        //     $seasonIds[] = $season->id;
        // }
        $Venues = Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        return view('admin.venues.index', compact('organizations', 'Venues','header','id','setting'));
    }
    public function data(Request $request)
    {
        $id = Session::get('id');
        $seasonIds = array();
        $search1= $request->filter_league?$request->filter_league:null;
        // dd($search);
        Session::put('search1', $search1);
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }

        if($search1!=null)
        {
            $Venues = Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search1){
                        return $query
                    ->Where('name','LIKE', '%' . $search1 . '%')
                    ->orWhere('email', $search1 )
                    ->orWhere('location','LIKE', '%' . $search1 . '%');
                    })->get();
            
   
        }
        else
        {
            $Venues = Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        }


        return DataTables::of($Venues)
            ->editColumn('created_at', function (Venue $Venue) {
                return $Venue->created_at->diffForHumans();
            })
            ->addColumn('tracks', function ($Venue) {
                $id = $Venue->id;
                // $tracks = array();
                $breakTracks=array();
                foreach ($Venue->venueDetails as $det) {
                    $tracks= $det->track_event_name ." "."-"." ". $det->track_event_count;
                    $breakTracks[]=$tracks;
                }
                return $breakTracks;
            })
            ->rawColumns(['tracks'])
            // ->addColumn('counts', function ($Venue) {
            //     $id = $Venue->id;
            //     $counts = array();
            //     foreach ($Venue->venueDetails as $det) {
            //         $counts[] = $det->track_event_count;
            //     }
            //     return $counts;
            // })
            // ->rawColumns(['counts'])
            ->addColumn('fields', function ($Venue) {
                $id = $Venue->id;
                $fields = array();
                foreach ($Venue->venueFieldDetails as $det) {
                    $fields[] = $det->field_event_name;
                }
                return $fields;
            })
            ->rawColumns(['fields'])
            ->addColumn('actions', function ($Venue) {
                $id = $Venue->id;
                if($Venue->leagues->count()>0){
                    $actions = '  <a href=' . route('venue.edit', $id) . '><button style="padding: 2px 4px" class=" btn btn-primary"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>';
    
                }
                else{
                    $actions = '<a href="#" data-id="' . $id . '" class="btn btn-danger delete" data-toggle="modal"  data-target="#deleteModal" style="padding: 2px 4px"><i class="material-icons" style="margin-bottom:5px">delete</i></a>
                    <a href=' . route('venue.edit', $id) . '><button style="padding: 2px 4px" class=" btn btn-primary"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>';
    
                }
                
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    /**
     * Show the form for creating a new Organization.
     *
     * @return Response
     */
    public function create()
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $season = Season::where('status', 1)->latest()->first();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereNotIn('event_category_id', [2])->get();
        return view('admin.venues.create', compact('season', 'mainEvents'));
    }

    /**
     * Store a newly created Organization in storage.
     *
     * @param CreateOrganizationRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'name'                  => 'required|max:255',
        //         'email'                       => 'required',
        //         'mobile'                       => 'required',
        //         'person_name' => 'required',
        //         'city'=>'required'
        //     ],
        //     [
        //         'name.required' => 'Venue Name is Required',
        //         'email.required'           => 'Email is Required',
        //         'mobile.required'    => 'Mobile Number is Required',
        //         'person_name.required' => 'Person Name is Required',
        //         'city.required' => 'City is Required'


        //     ]

        // );

        // if ($validator->fails()) {
        //     return redirect('/venues/create')->withErrors($validator)->withInput();
        // }
        $id = Session::get('id');
        $Venue = new Venue;
        $Venue->name   = $request->input('name');
        $Venue->email   = $request->input('email');
        $Venue->tp  = $request->input('tp');
        $Venue->mobile   = $request->input('mobile');
        $Venue->location   = $request->input('address');
        $Venue->city   = $request->input('city');
        $Venue->state   = $request->input('state');
        $Venue->latitude   = $request->input('latitude');
        $Venue->longitude   = $request->input('longitude');
        $Venue->map   = $request->input('map');
        $Venue->organization_id   = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        // $Venue->tracks   = $request->input('tracks');
        $Venue->season_id   = $request->input('season');
        $Venue->person_name   = $request->input('person_name');
        $Venue->save();
        if ($request->venueDetails) {
            foreach ($request->venueDetails as $venueDetail) {

                $venueDetailObj = [
                    "venue_id"          => $Venue->id,
                    'track_event_name'                 => $venueDetail['track_event_name'],
                    'max_length'               => $venueDetail['capacity'],
                    'track_event_count'            => $venueDetail['track'],
                ];
                $Venue->venueDetails()->insert([$venueDetailObj]);
            }
        }


        if ($request->venueFieldDetails) {
            foreach ($request->venueFieldDetails as $venueFieldDetail) {

                $venueDetail = [
                    "venue_id"          => $Venue->id,
                    'field_event_name'                 => $venueFieldDetail['field_event_name'],
                ];
                $Venue->venueFieldDetails()->insert([$venueDetail]);
            }
        }

        if ($Venue->save()) {
            return redirect('/venues')->with('success', 'Venue Created Successfully');
        }
    }

    /**
     * Display the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //         $id=Auth::user()->id;
    //         $user=User::find($id);
    //         $organization=$user->organization;
    //     return view('organizations.show',compact('organization'));
    // }

    /**
     * Show the form for editing the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Organization $organization */
        $venue = Venue::find($id);
        $season = Season::where('status', 1)->first();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id)->whereNotIn('event_category_id', [2])->get();
        return view('admin.venues.edit', compact('venue', 'season', 'mainEvents'));
    }

    /**
     * Update the specified Organization in storage.
     *
     * @param  int              $id
     * @param UpdateOrganizationRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        /** @var Organization $organization */
        $Venue = Venue::find($id);
        $validator = Validator::make(
            [
                'name'                  => 'required|max:255',
                'email'                       => 'required',
                'tp'                       => 'required',
                // 'tracks'                    =>'required',
                'person_name' => 'required'
            ],
            [
                'name.required' => 'Venue Name is Required',
                'email.required'           => 'Email is Required',
                'tp.required'    => 'Telephone Number is Required',
                // 'tracks.required'  => 'Track count is Required',
                'person_name.required' => 'Person Name is Required'


            ]

        );
        $id=$Venue->id;
        if ($validator->fails()) {
            return redirect("/venues/edit/$id")->withErrors($validator)->withInput();
        }

        $Venue->name   = $request->input('name');
        $Venue->email   = $request->input('email');
        $Venue->tp  = $request->input('tp');
        $Venue->mobile   = $request->input('mobile');
        $Venue->location   = $request->input('address');
        // $Venue->tracks   = $request->input('tracks');
        $Venue->person_name   = $request->input('person_name');
        $Venue->season_id   = $request->input('season');
        $Venue->save();
        // $Venue->venueDetails()->delete();
        if ($request->venuesDetail) {
            foreach ($request->venuesDetail as $key => $venueDetails) {
                $Venue->venueDetails()->where('id',$key)->update(['track_event_name'=> $venueDetails['track_event_name'],'max_length'=> $venueDetails['capacity'],
                'track_event_count'=> $venueDetails['track']]);
            }
        }
        if ($request->venues) {
            foreach ($request->venues as $venueDetail) {

                $venueDetailObj = [
                    "venue_id"          => $Venue->id,
                    'track_event_name'                 => $venueDetail['track_event_name'],
                    'max_length'               => $venueDetail['capacity'],
                    'track_event_count'            => $venueDetail['track'],
                ];
                $Venue->venueDetails()->insert([$venueDetailObj]);
            }
        }

        return redirect("/venues");
    }

    /**
     * Remove the specified Organization from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */


    public function remove(Request $request)
    {

        $venue = Venue::find($request->input('id'));
        //  dd($organization);
        $venue->status = 0;
        $venue->save();
        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function print(Request $request)
    {
        $id=Session::get('id');
        $search = $request->get('query');
        $sorttype = $request->get('sorttype');
        $sortby = $request->get('sortby');
        Session::put('search', $search);
        Session::put('sorttype', $sorttype);
        Session::put('sortby', $sortby);
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
                $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
                $header = $setting ? $setting->header : '';
                $general = generalSetting::first();
        if($search != ''){
            if($sortby){
                if($sortby=='track_event_name'){
                    $Venues = Venue::with(array('venueDetails' => function($query) use($sorttype) {
                        $query->orderBy('track_event_name', $sorttype);}))->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search){
                        return $query
                    ->Where('name','LIKE', '%' . $search . '%')
                    ->orWhere('email', $search )
                    ->orWhere('location','LIKE', '%' . $search . '%');
                    })->get(); 
                }elseif($sortby=='field_event_name'){
                    $Venues = Venue::with(array('venueFieldDetails' => function($query) use($sorttype) {
                        $query->orderBy('field_event_name',$sorttype);}))->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search){
                        return $query
                    ->Where('name','LIKE', '%' . $search . '%')
                    ->orWhere('email', $search )
                    ->orWhere('location','LIKE', '%' . $search . '%');
                    })->get(); 
                
                }else{
                    $Venues = Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search){
                        return $query
                    ->Where('name','LIKE', '%' . $search . '%')
                    ->orWhere('email', $search )
                    ->orWhere('location','LIKE', '%' . $search . '%');
                    })->orderBy($sortby,$sorttype)->get();
                }
            }else{
                $Venues = Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->where(function($query) use($search){
                    return $query
                ->Where('name','LIKE', '%' . $search . '%')
                ->orWhere('email', $search )
                ->orWhere('location','LIKE', '%' . $search . '%');
                })->get();
            }
          

        }else{   
            if($sortby){           
            if($sortby=='track_event_name'){
                $Venues =Venue::with(array('venueDetails' => function($query) use($sorttype) {
                    $query->orderBy('track_event_name', $sorttype);}))
                    ->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->get();
            }elseif($sortby=='field_event_name'){
                $Venues =Venue::with(array('venueFieldDetails' => function($query) use($sorttype) {
                    $query->orderBy('field_event_name',$sorttype);}))
                    ->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->get();
            
            }else{
                $Venues =Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->orderBy($sortby,$sorttype)->get();
            }
        }else{
            $Venues =Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get(); 
        }
         
        }
        $view = view('admin.venues.venues_print', compact('Venues','id','setting','header'))->render();
        return response()->json(['html' => $view
    ]);

    

}
            public function pdf(Request $request)
            {
                $id=Session::get('id');
                $seasonIds = array();
                $seasons = Season::where('status', 1)->get();
                foreach ($seasons as $season) {
                    $seasonIds[] = $season->id;
                }
                $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
                $header = $setting ? $setting->header : '';
                $general = generalSetting::first();
                $org=Organization::find(Auth::user()->organization_id);
                $search=Session::get('search');
                $sortby=Session::get('sortby');
                $sorttype=Session::get('sorttype');
                if($search != ''){
                    if($sortby){
                        if($sortby=='track_event_name'){
                            $Venues = Venue::with(array('venueDetails' => function($query) use($sorttype) {
                                $query->orderBy('track_event_name', $sorttype);}))->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                            ->where(function($query) use($search){
                                return $query
                            ->Where('name','LIKE', '%' . $search . '%')
                            ->orWhere('email', $search )
                            ->orWhere('location','LIKE', '%' . $search . '%');
                            })->get(); 
                        }elseif($sortby=='field_event_name'){
                            $Venues = Venue::with(array('venueFieldDetails' => function($query) use($sorttype) {
                                $query->orderBy('field_event_name',$sorttype);}))->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                            ->where(function($query) use($search){
                                return $query
                            ->Where('name','LIKE', '%' . $search . '%')
                            ->orWhere('email', $search )
                            ->orWhere('location','LIKE', '%' . $search . '%');
                            })->get(); 
                        
                        }else{
                            $Venues = Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                            ->where(function($query) use($search){
                                return $query
                            ->Where('name','LIKE', '%' . $search . '%')
                            ->orWhere('email', $search )
                            ->orWhere('location','LIKE', '%' . $search . '%');
                            })->orderBy($sortby,$sorttype)->get();
                        }
                    }else{
                        $Venues = Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                        ->where(function($query) use($search){
                            return $query
                        ->Where('name','LIKE', '%' . $search . '%')
                        ->orWhere('email', $search )
                        ->orWhere('location','LIKE', '%' . $search . '%');
                        })->get();
                    }
                  
        
                }else{   
                    if($sortby){           
                    if($sortby=='track_event_name'){
                        $Venues =Venue::with(array('venueDetails' => function($query) {
                            $query->orderBy('track_event_name', 'asc');}))
                            ->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                        ->get();
                    }elseif($sortby=='field_event_name'){
                        $Venues =Venue::with(array('venueFieldDetails' => function($query) {
                            $query->orderBy('field_event_name', 'asc');}))
                            ->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                        ->get();
                    
                    }else{
                        $Venues =Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                        ->orderBy($sortby,$sorttype)->get();
                    }
                }else{
                    $Venues =Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get(); 
                }
                 
                }
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf = PDF::loadView('admin.venues.venues_pdf', compact('org','Venues','id','header','setting'))->setPaper('a4', 'landscape');
            return $pdf->stream('Venues.pdf');
            }
            public function excel()
            {
                $search = Session::get('search');
                $sortby=Session::get('sortby');
                $sorttype=Session::get('sorttype');
                $id = Session::get('id');
                
                
                return Excel::download(new VenuehExport($search,$sortby,$sorttype, $id), 'Venues List.xlsx');
            }

}
