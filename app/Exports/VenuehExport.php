<?php

namespace App\Exports;

use App\Models\Season;
use App\Models\Venue;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon;

class VenuehExport implements FromView, WithHeadings,WithEvents

{

    // protected $id;
    /**
    * @return \Illuminate\Support\Collection
    */

    
    protected $search;
    protected $sortby;
    protected $sorttype;
    protected $id;
   

    public function __construct($search,$sortby,$sorttype, $id)
    {
        
        $this->search = $search;
        $this->sortby = $sortby;
        $this->sorttype = $sorttype;
        $this->id = $id;
    }

    public function view(): View
    {
       
// ----------------------------------------------------------------------------------
$seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
        if($this->search != ''){
            if($this->sortby){
                if($this->sortby=='track_event_name'){
                    $Venues = Venue::with(array('venueDetails' => function($query) {
                        $query->orderBy('track_event_name', $this->sorttype);}))->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                    ->where(function($query) {
                        return $query
                    ->Where('name','LIKE', '%' . $this->search . '%')
                    ->orWhere('email', $this->search )
                    ->orWhere('location','LIKE', '%' . $this->search . '%');
                    })->get(); 
                }elseif($this->sortby=='field_event_name'){
                    $Venues = Venue::with(array('venueFieldDetails' => function($query) {
                        $query->orderBy('field_event_name',$this->sorttype);}))->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                    ->where(function($query) {
                        return $query
                    ->Where('name','LIKE', '%' . $this->search . '%')
                    ->orWhere('email', $this->search )
                    ->orWhere('location','LIKE', '%' . $this->search . '%');
                    })->get(); 
                
                }else{
                    $Venues = Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                    ->where(function($query) {
                        return $query
                    ->Where('name','LIKE', '%' . $this->search . '%')
                    ->orWhere('email', $this->search )
                    ->orWhere('location','LIKE', '%' . $this->search . '%');
                    })->orderBy($this->sortby,$this->sorttype)->get();
                }
            }else{
                $Venues = Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                ->where(function($query) {
                    return $query
                ->Where('name','LIKE', '%' . $this->search . '%')
                ->orWhere('email', $this->search )
                ->orWhere('location','LIKE', '%' . $this->search . '%');
                })->get();
            }
          

        }else{   
            if($this->sortby){           
            if($this->sortby=='track_event_name'){
                $Venues =Venue::with(array('venueDetails' => function($query) {
                    $query->orderBy('track_event_name', 'asc');}))
                    ->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                ->get();
            }elseif($this->sortby=='field_event_name'){
                $Venues =Venue::with(array('venueFieldDetails' => function($query) {
                    $query->orderBy('field_event_name', 'asc');}))
                    ->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                ->get();
            
            }else{
                $Venues =Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                ->orderBy($this->sortby,$this->sorttype)->get();
            }
        }else{
            $Venues =Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->get(); 
        }
         
        }
  
    




        return view('admin.venues.venueExcel', [
             'Venues' => $Venues,
            'id' => $this->id
        ]);
        
     
    }     


 public function headings(): array
        {
            return [
                'Name',
                'Email',
                'Track Details',
                'Field Details',
                'Contact No',
            ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A3');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(14);
                // $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(13);
                // $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(20);
                // $event->sheet->getColumnDimension('A')->setWidth(50);
                $event->sheet->getStyle('A1:E1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
                $event->sheet->getStyle('A2:E2')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
                $event->sheet->getStyle('A2:E2')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}