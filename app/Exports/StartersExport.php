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
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class StartersExport implements FromView,WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $categories;
    protected $length;
    protected $length2;
    protected $length3;
    protected $length4;
    protected $length5;
    protected $length6;
    protected $id;

    public function __construct($categories, $length, $length2, $length3, $length4, $length5, $length6, $id)
    {

        $this->categories = $categories;
        $this->length = $length;
        $this->length2 = $length2;
        $this->length3 = $length3;
        $this->length4 = $length4;
        $this->length5 = $length5;
        $this->length6 = $length6;
        $this->id = $id;
    }

    public function view(): View
    {
        $genders = AgeGroupGender::with('ageGroupEvent');

        if ($this->categories) {
            foreach ($this->categories as $key => $values) {
                if ($key == "season") {
                    if ($values[$this->length - 1] == "duplicate") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {



                                $q->where('season_id', $values[$this->length - 1]);
                            });
                        });
                    }
                } elseif ($key == "league") {
                    if ($values[$this->length2 - 1] == "duplicate2") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {



                                $q->where('league_id', $values[$this->length2 - 1]);
                            });
                        });
                    }
                } elseif ($key == "gender") {


                    if ($values[$this->length3 - 1] == "duplicate5") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
                        $genders = $genders->whereHas('gender', function ($q) use ($values) {



                            $q->where('id', $values[$this->length3 - 1]);
                        });
                    }
                } elseif ($key == "judge") {


                    if ($values[$this->length6 - 1] == "duplicateJudge") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
                        $genders = $genders->where('starter_id', $values[$this->length6 - 1]);
                    }
                } elseif ($key == "age") {
                    if ($values[$this->length4 - 1] == "duplicate4") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('ageGroup', function ($q) use ($values) {



                                $q->where('id', $values[$this->length4 - 1]);
                            });
                        });
                    }
                } elseif ($key == "event") {
                    if ($values[$this->length5 - 1] == "duplicate3") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
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
        $seasons = Season::all();
        $judges = User::Role(['Starter'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->get();

    return view('reports.starters.search', [
        'genders' => $genders,
        'id' => $this->id,
        'season'=>$seasons,
        'ageGroups'=>$ageGroups,
        'leagues'=>$leagues,
        'mainEvents'=>$mainEvents
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
            $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(17);
            $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(17);
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
