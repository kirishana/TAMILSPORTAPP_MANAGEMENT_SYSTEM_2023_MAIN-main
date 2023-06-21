<?php

namespace App\Exports;

use App\Models\AgeGroupGender;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\OrganizationSetting;
use App\Models\AgeGroup;
use App\User;
use App\Models\League;
use Auth;
use Carbon;
class CancelledEventsExport implements FromView,WithEvents,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $cats;
    protected $id;
    protected $length2;
    protected $length3;
    protected $length4;
    protected $length5;
    protected $sortByCancelEvent;
    protected $sortTypeCancelEvent;

    public function __construct($cats, $id, $sortByCancelEvent,$sortTypeCancelEvent)
    {

        $this->cats = $cats;
      
        $this->id = $id;
        $this->sortByCancelEvent = $sortByCancelEvent;
        $this->sortTypeCancelEvent = $sortTypeCancelEvent;
       
    }

    public function view(): View
    {
       
        $genders = AgeGroupGender::with('ageGroupEvent');

        if ($this->cats) {

            foreach ($this->cats as $key => $values) {
               
                if ($key == "league") {
                    if ($values !=0) {
                       
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {



                                $q->where('league_id', $values);
                            });
                        });
                    }
                } elseif ($key == "gender") {


                    if ($values !=0) {
                        $genders = $genders->whereHas('gender', function ($q) use ($values) {



                            $q->where('id', $values);
                        });
                    }
                } 
                
                 elseif ($key == "age") {
                    if ($values !=0) {
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('ageGroup', function ($q) use ($values) {



                                $q->where('id', $values);
                            });
                        });
                    }
                } 
               
                elseif ($key == "event") {
                    if ($values !=0) {
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {

                                $q->whereHas('mainEvent', function ($q) use ($values) {


                                    $q->where('id', $values[$this->length5 - 1]);
                                });
                            });
                        });
                    }
                }
            }
        } else {
            $genders = AgeGroupGender::with('ageGroupEvent');
        }

        $genders = $genders->get();
        if($this->sortByCancelEvent=='name'){
            if($this->sortTypeCancelEvent=='asc'){
                $genders=$genders->sortBy(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
                        }else{
                            $genders=$genders->sortByDesc(function($query){
                                return $query->ageGroupEvent->Event->mainEvent->name;
                             })->all();
                        }
                        }
                        elseif($this->sortByCancelEvent=='gender_id'){
                            if($this->sortTypeCancelEvent=='asc'){
                                $genders=$genders->sortBy($this->sortByCancelEvent);
                            }else{
                                $genders=$genders->sortByDesc($this->sortByCancelEvent);
                            }
                          } elseif($this->sortByCancelEvent=='age_group_id'){
                            if($this->sortTypeCancelEvent=='asc'){
                                $genders=$genders->sortBy(function($query){
                                    return $query->ageGroupEvent->ageGroup->name;
                                 })->all();
                            }else{
                                $genders=$genders->sortByDesc(function($query){
                                    return $query->ageGroupEvent->ageGroup->name;
                                 })->all();                        
                            }
    
                           } elseif($this->sortByCancelEvent=='date'){
                            if($this->sortTypeCancelEvent=='asc'){
                                $genders=$genders->sortBy(function($query){
                                    return $query->ageGroupEvent->Event->date;
                                 })->all();
                            }else{
                                $genders=$genders->sortByDesc(function($query){
                                    return $query->ageGroupEvent->Event->date;
                                 })->all();                       
                            }
    
                          }
                            elseif($this->sortByCancelEvent=='league_id'){
                                if($this->sortTypeCancelEvent=='asc'){
                                    $genders=$genders->sortBy(function($query){
                                        return $query->ageGroupEvent->Event->league_id;
                                     })->all();
                                }else{
                                    $genders=$genders->sortByDesc(function($query){
                                        return $query->ageGroupEvent->Event->league_id;
                                     })->all();                       
                                }
    
                          }
        $today=Carbon\Carbon::now()->format('Y-m-d');

        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('is_approved', 1)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('is_approved', 1)->get();
        $agegroups = AgeGroup::all();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->get();

       
        return view('admin.events.eventCancel.export', [
            'genders' => $genders,
            'id' => $this->id,
            
            'judges'=>$judges,
            'starters'=>$starters,
            'agegroups'=>$agegroups,
            'leagues'=>$leagues,
            'today'=>$today
        ]);
    }
    public function headings(): array
    {
        return [
            'Event Name',
            'League Name',
            'Gender',
            ' Date',
            'Status',
            'Participants'
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
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(11);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(11);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(11);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(15);
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
