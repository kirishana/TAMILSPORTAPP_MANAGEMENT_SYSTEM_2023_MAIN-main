<?php

namespace App\Exports;

use App\Models\AgeGroupGender;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class EventsResultPlayerExport implements  FromView,WithHeadings, WithEvents
{
    protected $categories;
    protected $id;

    public function __construct($categories, $id)
    {

        $this->categories = $categories;
        $this->id = $id;
       
    }
    public function view(): View
    {
        $genders = AgeGroupGender::with('ageGroupEvent');


        if ($this->categories) {
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
                } elseif ($key == "event") {
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
                elseif ($key == "age") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('ageGroup', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                        });
                    }
                }
                elseif ($key == "organization") {
                    if($values!=0){
                        $genders = $genders->whereHas('users', function ($q) use ($values) {
                            $q->whereHas('organization', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                        });
                    }
                }
                elseif ($key == "status") {
                    if($values!=5){
                        $genders = $genders->where('status', $values);
                    }
                }
                elseif ($key == "gender") {
                    if($values!=0){
                        $genders = $genders->where('gender_id', $values);
                    }
                }
            }
        } else {
            $genders = AgeGroupGender::with('ageGroupEvent');
        }

$genders = $genders->get();
return view('players.search', [
    'genders' => $genders,
    'id'=>$this->id]);
}

public function headings(): array
{
return [
    'Event Name',
  
];
}
public function registerEvents(): array
{
    return [
        AfterSheet::class    => function(AfterSheet $event) {

            $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
            $event->sheet->getDelegate()->freezePane('A3');
            $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
            $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(10);
            $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(10);
            $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(10);
            $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(15);
            $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(15);
            $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(15);
            // $event->sheet->getColumnDimension('A')->setWidth(50);
            $event->sheet->getStyle('A1:G1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
            $event->sheet->getStyle('A2:G2')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

            $event->sheet->getStyle('A1:G1')->applyFromArray([
                'font' => [
                    'bold' => true
                ]
            ]);
        },
    ];
}
}
