<?php

namespace App\Exports;

use App\Models\League;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
class ChampionsExport implements FromView, WithHeadings,WithEvents
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

    public function __construct($league, $id,$totalEvents,$firstPlace,$totalPoints,$AgeGroups,$leagues,$events)
    {

        $this->league = $league;
        $this->id = $id;
        $this->totalEvents = $totalEvents;
        $this->firstPlace = $firstPlace;
        $this->totalPoints = $totalPoints;
        $this->AgeGroups = $AgeGroups;
        $this->leagues=$leagues;
        $this->events=$events;
    }

    public function view(): View
    {

       
        return view('reports.champions.exportChampionsData', [
            'league'=> $this->league,
            'events'=> $this->events,
            'leagues'=>$this->leagues,
            'AgeGroups'=> $this->AgeGroups
        ]);
    }

    public function headings(): array
    {
        return [
            'User Name',
            'Email',
            'DOB',
            'Role',
            'Gender',
            'Contact Number',
            'User Id',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A4');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(20);
                // $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(10);
                // $event->sheet->getColumnDimension('A')->setWidth(50);
                $event->sheet->getStyle('A2:F2')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
                $event->sheet->getStyle('A1:F1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
                $event->sheet->getStyle('A3:F3')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

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
                $event->sheet->getStyle('A3:F3')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
