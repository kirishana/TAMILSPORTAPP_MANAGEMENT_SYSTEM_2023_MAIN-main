<?php

namespace App\Exports;

use App\Models\League;
use App\Models\AgeGroup;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Carbon;



class ParticipantOverview implements FromView,WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection


    */
    protected $leaguesid;
    protected $id;
    


    public function __construct($leaguesid,$id)
    {
        $this->leaguesid = $leaguesid;
        $this->id = $id;

    }
    public function view(): View
    {
        $ongngLeaguesCount=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->get();
        if(count($ongngLeaguesCount)>0){
            $ongngLeagues=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->first();
        }else{
            $ongngLeagues=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->orderBy('id','desc')->latest()->first();
        }
       if($this->leaguesid){
        $ongngLeagues=League::find($this->leaguesid);

        $ageGroupnames=AgeGroup::where('status',1)->wherehas('organization',function($q){
            $q->where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id :$this->id);
        })->wherehas('events',function($q) {
            $q->where('league_id',$this->leaguesid)->wherehas('mainEvent',function($q){
                $q->where('event_category_id','!=',3);
            });
        })->get()->sortBy('name');
       }else{

        $ageGroupnames=AgeGroup::where('status',1)->wherehas('organization',function($q){
            $q->where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id :$this->id);
        })->wherehas('events',function($q) use($ongngLeagues) {
            $q->where('league_id',$ongngLeagues?$ongngLeagues->id:'')->wherehas('mainEvent',function($q){
                $q->where('event_category_id','!=',3);
            });
        })->get()->sortBy('name');
       }
   
       return view('admin.PDF.ParticipantOverviewExcel', [
        'ageGroupnames'=>  $ageGroupnames,
        'ongngLeagues'=>  $ongngLeagues,

    
    ]);

    
}
       
    public function headings(): array
    {
        return [

        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(11);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(14);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(18);

                $event->sheet->getColumnDimension('A')->setWidth(50);
                // $event->sheet->getStyle('A1:E1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:Z1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
                $event->sheet->getStyle('A2:Z2')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
    }
