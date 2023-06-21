<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgeGroup;
use App\Models\EventCategory;
use App\Models\MainEvent;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class MainEventController extends Controller
{
    public function agegroup(Request $request)
    {   $id = Session::get('id');
        // $search=$request->get('query')?$request->get('query'):'';
        // Session::put('search',$search);
        // dd($search);
        if ($request->ajax()) {
            $search = $request->get('query') ? $request->get('query') : '';
            $sortBy = $request->get('sortby');
            $sorttype = $request->get('sorttype');
            // dd($sortBy);
            if ($request->get('query')) {
                if($sortBy){
                    if($sortBy=='name'){
                        $mainEvents = MainEvent::with('eventCategory')->where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->where('name', 'LIKE', '%' . $search . '%')
                        ->orderBy($sortBy,$sorttype)->paginate(10);
                    }else{
                        $mainEvents = MainEvent::with('eventCategory')->where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->where('name', 'LIKE', '%' . $search . '%')->orderBy(EventCategory::select('name')->whereColumn('event_categories.id','main_events.event_category_id'),$sorttype)->paginate(10);

                    }
                   
                }else{
                    $mainEvents = MainEvent::with('eventCategory')->where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->where('name', 'LIKE', '%' . $search . '%')
                    ->orderBy('id','Desc')->paginate(10);
                }
                
            } 
            else {
                if($sortBy){
                if($sortBy=='name'){
                    if($sorttype=='asc'){
                        $mainEvents = MainEvent::with('eventCategory')->where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->orderBy('name','asc')->paginate(10);
                    }else{
                        $mainEvents = MainEvent::with('eventCategory')->where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->orderBy('name','Desc')->paginate(10);

                    }

                }else{
                    $mainEvents = MainEvent::with('eventCategory')->where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->orderBy(EventCategory::select('name')->whereColumn('event_categories.id','main_events.event_category_id'),$sorttype)->paginate(10);

                }
                }else{
                    $mainEvents = MainEvent::with('eventCategory')->where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->orderBy('id','Desc')->paginate(10);
                }
            }
            return view('mainEvents.table', compact('mainEvents'));

        } else {
            $eventCategories = EventCategory::all();
            $mainEvents = MainEvent::with('eventCategory')->where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->orderBy('id','Desc')->paginate(10);
            return view('mainEvents.index', compact('mainEvents','eventCategories'));
        }
    }
    public function index()
    {
        $id = Session::get('id');

        $mainEvents = MainEvent::with('eventCategory')->where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->get();
    
        // $dis=explode(' ' ,$event->discount);
          

       
        return response([
            'mainEvents' => $mainEvents
        ]);
    }

    public function store(Request $request)
    {
        $id = Session::get('id')?Session::get('id'):'';

        $names=MainEvent::where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->get();
        if($request->input('discount')>100){
            return response()->json(['errors'=>"Discount should be less than 100%"]);

        }
        if(count($names)>0){
            for($i = 0;$i<count($names);$i++)
            {

                  if($names[$i]->name == $request->input('name'))
                {

                    return response()->json(['errors'=>"Event already exists"]);

                }
              
            }
            $mainEvent = new MainEvent;
            $mainEvent->name = $request->input('name');
            $mainEvent->price = $request->input('price')?$request->input('price'):0;
            $mainEvent->discount = $request->input('discount')?$request->input('discount'):0;
            $mainEvent->organization_id = Auth::user()->organization_id?Auth::user()->organization_id:$id;
            $mainEvent->event_category_id = $request->input('cat');
            $mainEvent->save();
            $url = "/event/create";
            $message="Event Successfully Created";
            return response()->json([
                'status' => 200,
                'mainEvent' => $mainEvent,
                'url' => $url,
                'message' => $message
            ]);              

            }
        else{
            $mainEvent = new MainEvent;
            $mainEvent->name = $request->input('name');
            $mainEvent->price = $request->input('price')?$request->input('price'):0;
            $mainEvent->discount = $request->input('discount')?$request->input('discount'):0;
            $mainEvent->organization_id = Auth::user()->organization_id?Auth::user()->organization_id:$id;
            $mainEvent->event_category_id = $request->input('cat');
            $mainEvent->save();
            $url = "/event/create";
            $message="Event Successfully Created";
            return response()->json([
                'status' => 200,
                'mainEvent' => $mainEvent,
                'url' => $url,
                'message' => $message
            ]);              
  
        }
  
        
     
        
        
       
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $AgeGroup = MainEvent::with('eventCategory')->find($id);
        return response()->json([
            'status' => 200,
            'AgeGroup' => $AgeGroup,
            'Discount'=>$AgeGroup->discount
        ]);
    }

    public function update(Request $request, $id)
    {
        $mainEvent = MainEvent::find($id);
        $mainEvent->name = $request->input('data');
        $mainEvent->price = $request->input('price');
        $mainEvent->discount = $request->input('discount');
        $mainEvent->event_category_id = $request->input('cat');
        $mainEvent->save();
        $message="Event Successfully Updated";
        return response()->json([
            'status' => 200,
            'mainEvent' => $mainEvent,
            'message' => $message
        ]);
    }

    public function activate(Request $request)
    {
        $AgeGroup = AgeGroup::find($request->input('id'));
        $AgeGroup->status = 0;
        $AgeGroup->save();
        return response()->json([
            'message' => 'updated'
        ]);
    }

    public function deactivate(Request $request)
    {
        $AgeGroup = AgeGroup::find($request->input('id'));
        $AgeGroup->status = 1;
        $AgeGroup->save();
        return response()->json([
            'message' => 'updated'
        ]);
    }
    public function search(Request $request){
        $id = Session::get('id');

        $search = $request->get('query');
        Session::put('search', $search);

        if ($search != '') {
            $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('name', 'LIKE', '%' . $search . '%')
        ->get();
        } else {
            $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        }



        $view = view('mainEvents.table', compact('mainEvents'))->render();

        return response()->json(['html' => $view]);
    }
}
