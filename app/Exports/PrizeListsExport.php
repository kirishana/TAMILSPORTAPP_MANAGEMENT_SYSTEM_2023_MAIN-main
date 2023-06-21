<?php

namespace App\Exports;

use App\Models\AgeGroupGender;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
class PrizeListsExport implements FromView, WithHeadings,WithEvents
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
        $genders = AgeGroupGender::with('ageGroupEvent')->where('status',1);

        if($this->categories){
            foreach ($this->categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {
                                $q->where('season_id', $values);
                            });
                        });
                    }
                } elseif ($key == "league") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {
                                $q->where('league_id', $values);
                            });
                        });
                    }
                } elseif ($key == "gender") {
                    if($values!=0){
                        $genders = $genders->whereHas('gender', function ($q) use ($values) {
                            $q->where('id', $values);
                        });
                    }
                } elseif ($key == "judge") {
                    if($values!=0){
                        $genders = $genders->where('judge_id', $values);
                    }
                } elseif ($key == "age") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('ageGroup', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                        });
                    }
                } 
                elseif ($key == "prizeGiven") {
                    if($values!=5){
                        $genders = $genders->where('status', $values);
                    }
                } 
                
                elseif ($key == "event") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {
                                $q->whereHas('mainEvent', function ($q) use ($values) {
                                    $q->where('id', $values);
                                });
                            });
                        });
                    }
                }
            }
        }else{
            $genders = AgeGroupGender::with('ageGroupEvent')->where('status',1);
        }
        $genders = $genders->get();
        return view('reports.prizes.exportPrizeGiven', [
            'genders' => $genders,
            'id' => $this->id,
            'header'=>null,
            'setting'=>null
        ]);
    }

        public function headings(): array
        {
        return [
            ' Event',
            ' Gender',
            ' Age',
            ' First',
            ' Second',
            ' Third'
          
        ];
        }
        public function registerEvents(): array
        {
            return [
                AfterSheet::class    => function(AfterSheet $event) {
        
                    $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                    $event->sheet->getDelegate()->freezePane('A3');
                    $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                    $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(10);
                    $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(8);
                    $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(8);
                    $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(20);
                    $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(8);
                    $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(20);
                    $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(8);
                    $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(20);
                    $event->sheet->getDelegate()->getColumnDimension('L')->setWidth(15);
                    // $event->sheet->getColumnDimension('A')->setWidth(50);
                    $event->sheet->getStyle('A1:L1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
                    $event->sheet->getStyle('A2:L2')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
        
                    $event->sheet->getStyle('A1:L1')->applyFromArray([
                        'font' => [
                            'bold' => true
                        ]
                    ]);
                },
            ];
        }
        }
        
        