<?php

namespace App\Exports;

use App\Models\Event;
use App\Models\MainEvent;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\League;
use App\Models\AgeGroup;
use App\User;


class EventsPlayerExport implements FromView,WithHeadings,WithEvents
{

    protected $categories;
    protected $id;
    protected $filter;

    public function __construct($categories, $id,$filter)
    {

        $this->categories = $categories;
        $this->id = $id;
        $this->filter = $filter;
    }
    public function view(): View
    {
       
    // dd($filter);

            $child_id=array();
            if(Auth::user()->children){
                $user_ids=Auth::user()->children;
                foreach($user_ids as $user_id){
                    $child_id[]=$user_id->id;
                } 
        
            }else{
                    $child_id[]=null;
            }
         
        
              array_push($child_id,Auth::user()->id);
            $Leagues = League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $this->id)->wherehas('registrations',function($q) use($child_id){
                $q->whereIn('user_id',$child_id);
            });

            if ($this->categories) {

                foreach ($this->categories as $key => $values) {
                    if ($key == "season") {
                        if($values!=0){
                            $Leagues = $Leagues->where('season_id', $values);
                        }
                    } elseif ($key == "league") {
                        if($values!=0){
                            $Leagues =  $Leagues->where('id', $values);
                        }
                    }
                   
                    elseif ($key == "event") {
                        if($values!=0){
                            $mainEvent= MainEvent::find($values);
                            $this->filter=$mainEvent->id;
                        }else{
                            $this->filter=null;
                        }
                    }
                }
            } else {
                $Leagues = League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $this->id)->wherehas('registrations',function($q) use($child_id){
                    $q->whereIn('user_id',$child_id);
                });
            }
            $Leagues = $Leagues->get();

            $regs2=array();
            foreach($Leagues as $league){
                foreach($league->registrations as $reg){
                   foreach($reg->events as $evnt){
                    if($evnt->main_event_id==$this->filter){
                        $regs2[]=$reg->user_id;
                    }
                   }
                }
                
            }
            $children=array();
foreach($regs2 as $reg1){
    if(in_array($reg1,$child_id)){
        $children[]=$reg1;

    }

}
        return view('admin.events.eventsPlayerfilter', [
            'Leagues' => $Leagues,
            'children' => $children,
            'filter' => $this->filter,
        ]);
    }

    public function headings(): array
    {
        return [
            'Event Name',
            'Organization Name',
            'League',
            'Venue',
            'Event Organizer',
            'Date',
           
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(35);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(12);
             
                
                // $event->sheet->getColumnDimension('A')->setWidth(50);
                $event->sheet->getStyle('A1:F1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
