<?php

namespace App\Exports;

use App\Models\Event;
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


class EventsExport implements FromView,WithHeadings,WithEvents
{

    protected $categories;
    protected $id;
    public function __construct($categories,$id)
    {

        $this->categories = $categories;
        $this->id = $id;
    }

    public function view(): View
    {
        $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization->id : $this->id);
        if ($this->categories) {
            foreach ($this->categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                        $events = $events->where('season_id', $values);
                    }
                } elseif ($key == "league") {
                        if($values!=0){
                            $events =  $events->where('league_id', $values);
                        }
                } elseif ($key == "age") {
                    if($values!=0){
                        $events = $events->whereHas('ageGroups', function ($q) use ($values) {
                            $q->where('age_groups.id', $values);
                        });                    
                    }
                } elseif ($key == "event") {
                    if($values!=0){
                        $events = $events->whereHas('mainEvent', function ($q) use ($values) {
                            $q->where('id', $values);
                        });                    
                    }
                }
            }
        } else {
            $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization->id : $id);
        }

        $events = $events->get();
        return view('admin.events.filterEventData', [
            'events' => $events,
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
            'Judge',
            'Starter',
            'Time'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(11);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(11);
                // $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(15);
                // $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(10);
                
                // $event->sheet->getColumnDimension('A')->setWidth(50);
                $event->sheet->getStyle('A1:G1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
