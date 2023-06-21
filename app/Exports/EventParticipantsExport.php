<?php

namespace App\Exports;

use App\Models\AgeGroupGender;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Auth;


class EventParticipantsExport implements FromView,WithHeadings,WithEvents
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
        $agegroupgenders = AgeGroupGender::where('status',1);
        if ($this->categories) {
            foreach ($this->categories as $key => $values) {
                if ($key == "gender") {
                    if ($values!=0) {
                        $agegroupgenders=$agegroupgenders->where('gender_id',$values);
                    }  
                }elseif ($key == "league") {
                    if ($values!=0) {
                        $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent',function($q) use($values){
                            $q->wherehas('Event',function($q) use($values){
                                $q->wherehas('league',function($q) use($values){
                                    $q->where('id',$values);
                                });
                            });
                        });
                    } 
                }elseif ($key == "age") {
                    if ($values!=0) {
                        $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent',function($q) use($values){
                            $q->whereHas('ageGroup',function($qu) use($values){
                                     $qu->where('id','=',$values);
                             });
                         });
                        }
                } elseif ($key == "club") {
                    if ($values!=0)  {
                        $agegroupgenders=$agegroupgenders->whereHas('users',function($q) use($values){
                            $q->whereHas('club',function($qu) use($values){
                                     $qu->where('id','=',$values);
                             });
                         });
                    }     
                }elseif ($key == "event") {
                    if ($values!=0)
                        $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent',function($q) use($values){
                            $q->whereHas('Event',function($qu) use($values){
                                 $qu->whereHas('mainEvent',function($qur) use($values) {
                                     $qur->where('id','=',$values);
                                 });
                             });
                         });
            }
        }
    
    }else{
        $agegroupgenders = AgeGroupGender::where('status',1);

    }
                $agegroupgenders=$agegroupgenders->get();

   
       return view('admin.reports.eventsParticipantsExport', [
        'id'=>  $this->id,
        'agegroupgenders'=>  $agegroupgenders
    
    ]);

    
}
       
    public function headings(): array
    {
        return [
            'Name',
            'userId',
            'Time',
            'First',
            'Second',
            'Third'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(35);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(15);
             
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