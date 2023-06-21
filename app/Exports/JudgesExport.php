<?php

namespace App\Exports;

use App\Models\AgeGroupGender;
use App\Models\Season;
use App\Models\League;
use App\Models\AgeGroup;
use App\Models\MainEvent; 
use App\User;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class JudgesExport implements FromView,WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $categories;
    protected $id;
    protected $gendersSortType;
    protected $gendersSortBy;

    public function __construct($categories, $id,$gendersSortType,$gendersSortBy)
    {

        $this->categories = $categories;
        $this->id = $id;
        $this->gendersSortType = $gendersSortType;
        $this->gendersSortBy = $gendersSortBy;
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
                    } elseif ($key == "gender") {
                        if($values!=0){
                            $genders = $genders->whereHas('gender', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                        }
                    } 
                    elseif ($key == "judge") {
                        if($values!=0){
                            $genders = $genders->where('judge_id', $values);
                        }
                    } 
                    elseif ($key == "starter") {
                        if($values!=0){
                            $genders = $genders->where('starter_id', $values);
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
                }
            }else{
                $genders = AgeGroupGender::with('ageGroupEvent');
        
            }
        $genders = $genders->get();

        if($this->gendersSortBy=='event'){
            if($this->gendersSortType=='asc'){
    
                $genders=$genders->sortBy(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
                        }else{
                            $genders=$genders->sortByDesc(function($query){
                                return $query->ageGroupEvent->Event->mainEvent->name;
                             })->all();
                        }
                        }
                        elseif($this->gendersSortBy=='gender'){
                            if($this->gendersSortType=='asc'){
                            $genders=$genders->sortBy(function($query){
                                        return $query->gender->id;
                                     })->all();
                                    }
                                    
                                    else{
    
                                        $genders=$genders->sortByDesc(function($query){
                                            return $query->gender->id;
                                         })->all();
                                    }
                                    }
                                    elseif($this->gendersSortBy=='age'){
                                        if($this->gendersSortType=='asc'){
                                        $genders=$genders->sortBy(function($query){
                                                    return $query->ageGroupEvent->ageGroup->id;
                                                 })->all();
                                                }else{
                                                    $genders=$genders->sortByDesc(function($query){
                                                        return $query->ageGroupEvent->ageGroup->id;
                                                     })->all();
                                                }
                                                }
                                                elseif($this->gendersSortBy=='league'){
                                                    if($this->gendersSortType=='asc'){
                                                    $genders=$genders->sortBy(function($query){
                                                                return $query->ageGroupEvent->Event->league->id;
                                                             })->all();
                                                            }else{
                                                                $genders=$genders->sortByDesc(function($query){
                                                                    return $query->ageGroupEvent->Event->league->id;
                                                                 })->all();
                                                            }
                                                            }
                                                            elseif($this->gendersSortBy=='starter'){
                                                                if($this->gendersSortType=='asc'){
                                                                $genders=$genders->sortBy(function($query){
                                                                    return $query->starter?$query->starter->first_name:'';
                                                                })->all();
                                                                        }else{
                                                                            $genders=$genders->sortByDesc(function($query){
                                                                                return $query->starter?$query->starter->first_name:'';
                                                                            })->all();
                                                                        }
                                                                        }
                                                                        elseif($this->gendersSortBy=='judge'){
                                                                            if($this->gendersSortType=='asc'){
                                                                            $genders=$genders->sortBy(function($query){
                                                                                return $query->judge?$query->judge->first_name:'';
                                                                            })->all();
                                                                                    }else{
                                                                                        $genders=$genders->sortByDesc(function($query){
                                                                                            return $query->judge?$query->judge->first_name:'';
                                                                                        })->all();
                                                                                    }
                                                                                    }
                                                                                    elseif($this->gendersSortBy=='date'){
                                                                                        if($this->gendersSortType=='asc'){
                                                                                        $genders=$genders->sortBy(function($query){
                                                                                            return $query->ageGroupEvent->Event->date;
                                                                                        })->all();
                                                                                                }else{
                                                                                                    $genders=$genders->sortByDesc(function($query){
                                                                                                        return $query->ageGroupEvent->Event->date;
                                                                                                    })->all();
                                                                                                }
                                                                                                }
                                                                                                elseif($this->gendersSortBy=='time'){
                                                                                                    if($this->gendersSortType=='asc'){
                                                                                                    $genders=$genders->sortBy(function($query){
                                                                                                        return $query->starter?$query->time:'';
                                                                                                    })->all();
                                                                                                            }else{
                                                                                                                $genders=$genders->sortByDesc(function($query){
                                                                                                                    return $query->starter?$query->time:'';
                                                                                                                })->all();
                                                                                                            }
                                                                                                            }
        $seasons = Season::all();
        $judges = User::Role(['Judge'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->get();

    return view('reports.judges.judge-starter-excel', [
        'genders' => $genders,
        'id' => $this->id,
        'season'=>$seasons,
        'ageGroups'=>$ageGroups,
        'leagues'=>$leagues
    ]);
    
}
public function headings(): array
    {
        return [
            'League',
            'Event',
            'Gender',
            'Age Group',
            'Status',
            'Starter',
            'Judge'
           
        ];
    }
public function registerEvents(): array
{
    return [
        AfterSheet::class    => function(AfterSheet $event) {

            $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
            $event->sheet->getDelegate()->freezePane('A2');
            $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
            $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(17);
            $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(17);
            $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(17);
            $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(17);
            $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(20);
            $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(20);
            $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(17);
            $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(17);
            // $event->sheet->getColumnDimension('A')->setWidth(50);
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
