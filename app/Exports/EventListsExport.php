<?php

namespace App\Exports;

use App\Models\Event;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use App\Models\Season;
use App\Models\League;
use App\User;
use Carbon;

class EventListsExport implements FromView, WithHeadings,WithEvents
{

    protected $search;
    protected $id;
    protected $columnname;
    protected $ordertype;

    public function __construct($search, $id,$columnname,$ordertype)
    {

        $this->search = $search;
        $this->id = $id;
        $this->columnname = $columnname;
        $this->ordertype = $ordertype;
    }

    public function view(): View
    {
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }

        if ($this->search != '') {
            if($this->columnname){
            if($this->columnname=='name'){
            if($this->ordertype=='asc'){
                $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->whereIn('season_id',$seasonIds)
            ->where(function($query) {
                return $query
            ->whereHas('mainEvent', function ($q)  {


                $q->where('name', 'LIKE', '%' . $this->search . '%');
            })


                ->orwhereHas('league', function ($q)  {

                    $q->where('name', 'LIKE', '%' . $this->search . '%');
                })
                ->orwhereHas('ageGroups', function ($q)  {


                    $q->where('name', 'LIKE', '%' . $this->search . '%');
                });
             })->get()->sortBy('mainEvent.name');
            }else{
                $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->whereIn('season_id',$seasonIds)
                ->where(function($query) {
                    return $query
                ->whereHas('mainEvent', function ($q)  {
    
    
                    $q->where('name', 'LIKE', '%' . $this->search . '%');
                })
    
    
                    ->orwhereHas('league', function ($q)  {
    
                        $q->where('name', 'LIKE', '%' . $this->search . '%');
                    })
                    ->orwhereHas('ageGroups', function ($q)  {
    
    
                        $q->where('name', 'LIKE', '%' . $this->search . '%');
                    });
                 })->get()->sortByDesc('mainEvent.name');
            }
            }
            if($this->columnname=='league_id'){
                if($this->ordertype=='asc'){
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->whereIn('season_id',$seasonIds)
                ->where(function($query) {
                    return $query
                ->whereHas('mainEvent', function ($q)  {
    
    
                    $q->where('name', 'LIKE', '%' . $this->search . '%');
                })
    
    
                    ->orwhereHas('league', function ($q)  {
    
                        $q->where('name', 'LIKE', '%' . $this->search . '%');
                    })
                    ->orwhereHas('ageGroups', function ($q)  {
    
    
                        $q->where('name', 'LIKE', '%' . $this->search . '%');
                    });
                 })->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),'asc')->get();
                }
                 else{
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->whereIn('season_id',$seasonIds)
                    ->where(function($query) {
                        return $query
                    ->whereHas('mainEvent', function ($q)  {
        
        
                        $q->where('name', 'LIKE', '%' . $this->search . '%');
                    })
        
        
                        ->orwhereHas('league', function ($q)  {
        
                            $q->where('name', 'LIKE', '%' . $this->search . '%');
                        })
                        ->orwhereHas('ageGroups', function ($q)  {
        
        
                            $q->where('name', 'LIKE', '%' . $this->search . '%');
                        });
                     })->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),'desc')->get();
                }
                }

            }else{

                $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->whereIn('season_id',$seasonIds)
            ->where(function($query) {
                return $query
            ->whereHas('mainEvent', function ($q)  {


                $q->where('name', 'LIKE', '%' . $this->search . '%');
            })


                ->orwhereHas('league', function ($q)  {

                    $q->where('name', 'LIKE', '%' . $this->search . '%');
                })
                ->orwhereHas('ageGroups', function ($q) {


                    $q->where('name', 'LIKE', '%' . $this->search . '%');
                });
             })->get();

            }
            
        } 
        else {
            if($this->columnname){
                if($this->columnname=='name'){
                    if($this->ordertype=='asc'){
                        $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->whereIn('season_id',$seasonIds)->wherehas('mainEvent')->get()->sortBy('mainEvent.name');
                    }else{
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->whereIn('season_id',$seasonIds)->wherehas('mainEvent')->get()->sortByDesc('mainEvent.name');

                    }

                }
                if($this->columnname=='league_id'){
                    if($this->ordertype=='asc'){
                        $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->whereIn('season_id',$seasonIds)->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),'asc')->get();
                    }else{
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->whereIn('season_id',$seasonIds)->wherehas('mainEvent')->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),'desc')->get();

                    }

                }
            }else{
            $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->whereIn('season_id',$seasonIds)->get();
            }
        }


        return view('admin.events.eventListExcel', [
            'events' => $events,
            'id' => $this->id,
            'header'=>null,
            'setting'=>null
        ]);
    }

    public function headings(): array
    {
        return [
            'Event Name',
            'League Name',
            'Event Organizer',
            'Gender',
            'Age Group',
            'Date',
            // 'Judge',
            // 'Starter',
            // 'Time'
        ];
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(35);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(10);
                // $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(10);
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
