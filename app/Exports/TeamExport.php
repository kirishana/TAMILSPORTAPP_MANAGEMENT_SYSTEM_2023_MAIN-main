<?php

namespace App\Exports;

use App\Models\GroupRegistration;
use App\Models\MainEvent;
use App\User;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Carbon;



class TeamExport implements FromView,WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection


    */
    protected $categories12;
    protected $id;


    public function __construct($categories12,$id)
    {
       
        $this->categories12 = $categories12;
        $this->id = $id;

    }
    public function view(): View
    {
        $groupRegistrations =GroupRegistration::where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $this->id);

        if ($this->categories12) {

            foreach ($this->categories12 as $key => $values) {
                
                if ($key == "clubGroup") {
                    if($values!=0){
                        $groupRegistrations=$groupRegistrations->where('club_id',$values);
                    }
                } 
                elseif ($key == "leagueGroup") {
                    if($values!=0){
                        $groupRegistrations=$groupRegistrations->where('league_id',$values);
    
                    }
                } 
                elseif ($key == "eventGroup") {
                    if($values!=0){
                        $groupRegistrations=$groupRegistrations->wherehas('ageGroupGender',function($q) use($values){
                            $q->wherehas('ageGroupEvent',function($q) use($values){
                            $q->wherehas('Event',function($q) use($values){
                                $q->where('main_event_id',$values);
                            });
                            });
                        });    
                
                    }
                }
                elseif ($key == "age_groupGroup") {
                    if($values!=0){
                        $groupRegistrations=$groupRegistrations->wherehas('ageGroupGender',function($q) use($values){
                            $q->wherehas('ageGroupEvent',function($q) use($values){
                                $q->where('age_group_id',$values);
                            });
                        });
    
                    }
                }
                elseif ($key == "genderGroup") {
                    if($values!=0){
                        $groupRegistrations=$groupRegistrations->wherehas('ageGroupGender',function($q) use($values){
                            $q->where('gender_id',$values);
                    });   
                 
                }
                }
    
          
       }
       }else{
            $groupRegistrations =GroupRegistration::where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id);
        }
            $groupRegistrations=$groupRegistrations->get();
    
   
       return view('admin.PDF.teamExcel', [
        'groupRegistrations'=>  $groupRegistrations,
    ]);

    
}
       
    public function headings(): array
    {
        return [
            'Team Name',
            'Club Name',
            'Gender',
            'Age Group',
            'Event'
           
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(11);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(14);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(18);
                // $event->sheet->getColumnDimension('A')->setWidth(50);
                $event->sheet->getStyle('A1:E1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
    }
