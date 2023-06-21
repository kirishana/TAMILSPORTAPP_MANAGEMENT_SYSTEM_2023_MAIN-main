<?php

namespace App\Exports;

use App\Models\GroupRegistration;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class TeamsResultClubExport implements FromView,WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection


    */
    protected $categories;
    protected $id;

    public function __construct($categories,$id)
    {
        $this->id = $id;
        $this->categories = $categories;
    }

    public function view(): View
    {
        $groupRegistrations=GroupRegistration::where('id','!=',null)->wherehas('AgeGroupGender',function($q){
            $q->where('status',1);
        });

        if ($this->categories) {
            foreach ($this->categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->where('season_id', $values);
                    }
                } elseif ($key == "league") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->where('league_id', $values);
                    }
                } elseif ($key == "event") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->whereHas('ageGroupGender', function ($q) use ($values) {
                            $q-> whereHas('ageGroupEvent', function ($q) use ($values) {
                                     $q->whereHas('Event', function ($q) use ($values) { 
                                         $q-> where('main_event_id', $values);
                         });
                         });
                         });
                    }
                }
               elseif ($key == "age") {
                if($values!=0){
                    $groupRegistrations = $groupRegistrations->wherehas('ageGroupGender', function($qu) use ($values){
                        $qu->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('ageGroup', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                            });
                        });
                }
                }
                elseif ($key == "gender") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->whereHas('ageGroupGender', function ($q) use ($values) {
                            $q->where('gender_id', $values);
                            });
                    }
                }
            }
        } else {
            $groupRegistrations=GroupRegistration::where('status',1)->wherehas('AgeGroupGender',function($q){
                            $q->where('status',1);
                        });
        }
        $groupRegistrations= $groupRegistrations->get();
       return view('admin.reports.clubteam.clubGroupfilter', [
        'groupRegistrations'=>  $groupRegistrations
    
    ]);

    
}
       
    public function headings(): array
    {
        return [
            'Event Name',
            'Team Name',
            ' Gender ',
            'Team Name',
            'Status',
            'Winners'
           
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->freezePane('A3');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(20);
                // $event->sheet->getColumnDimension('A')->setWidth(50);
                $event->sheet->getStyle('A1:I1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
                $event->sheet->getStyle('A2:I2')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:I1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
    }
