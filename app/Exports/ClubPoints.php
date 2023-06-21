<?php

namespace App\Exports;

use App\Models\League;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
class ClubPoints implements FromView, WithHeadings,WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $league;
    protected $id;
    protected $totalEvents;
    protected $firstPlace;
    protected $totalPoints;
    protected $AgeGroups;

    public function __construct($league,$events)
    {

        $this->league = $league;
      
        $this->events=$events;
    }

    public function view(): View
    {

       
        return view('reports.clubPoints.excel', [
            'league'=> $this->league,
            'events'=> $this->events,
           
        ]);
    }

    public function headings(): array
    {
        return [
            '#',
            'Event Name',
            'League Name',
            'Event Organizer',
            'Gender',
            'Age Group',
            'No.Of Part',
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
   
                $event->sheet->getDelegate()->getStyle('2')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->freezePane('A3');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(15);
              
             
                // $event->sheet->getColumnDimension('A')->setWidth(50);
                $event->sheet->getStyle('A1:F1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
                $event->sheet->getStyle('A2:F2')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
                $event->sheet->getStyle('A2:F2')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}