<?php

namespace App\Exports;

use App\Models\AgeGroupGender;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use App\Models\OrganizationSetting;
use App\Models\AgeGroup;
use App\User;
use App\Models\League;

class AllEventsExport implements FromView, WithHeadings,WithEvents
{
    protected $id;
    protected $sortType;
    protected $sortBy;
    protected $genders;

    public function __construct($sortType,$sortBy, $id,$genders)
    {

      
        $this->id = $id;
        $this->sortType=$sortType;
        $this->sortBy=$sortBy;
        $this->genders=$genders;
    }

    public function view(): View
    {
        if($this->sortBy=='name'){
            if($this->sortType=='asc'){
    
                $this->genders=$this->genders->sortBy(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
    
                        }else{
                            $this->genders=$this->genders->sortByDesc(function($query){
                                return $query->ageGroupEvent->Event->mainEvent->name;
                             })->all();
                        }
                        }
                        if($this->sortBy=='gender'){
                            if($this->sortType=='asc'){
                            $this->genders=$this->genders->sortBy(function($query){
                                        return $query->gender->id;
                                     })->all();
                                    }else{
                                        $this->genders=$this->genders->sortByDesc(function($query){
                                            return $query->gender->id;
                                         })->all();  
                                    }
                              
                                    }
                                    if($this->sortBy=='age_group'){
                                        if($this->sortType=='asc'){
                                        $this->genders=$this->genders->sortBy(function($query){
                                                    return $query->ageGroupEvent->ageGroup->id;
                                                 })->all();
                                                }else{
                                                    $this->genders=$this->genders->sortByDesc(function($query){
                                                        return $query->ageGroupEvent->ageGroup->id;
                                                     })->all(); 
                                                }
                                          
                                                }
                                                if($this->sortBy=='time'){
                                                    if($this->sortType=='asc'){
                                                        $this->genders=$this->genders->sortBy(function($query){
                                                                return $query->time;
                                                             })->all();
                                                            }else{
                                                                $this->genders=$this->genders->sortByDesc(function($query){
                                                                    return $query->time;
                                                                 })->all(); 
                                                            }
                                                      
                                                            }

        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('is_approved', 1)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('is_approved', 1)->get();
        $agegroups = AgeGroup::all();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->get();

       
        return view('admin.events.excelAllEvents', [
            'genders' => $this->genders,
            'id' => $this->id,
            'judges'=>$judges,
            'starters'=>$starters,
            'agegroups'=>$agegroups,
            'leagues'=>$leagues
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
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(16);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(11);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(9);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(13);
             
                $event->sheet->getStyle('A1:I1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
                $event->sheet->getStyle('A1:I1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
