<?php

namespace App\Exports;

use App\Models\Registration;
use App\Models\League;
use App\Models\Club;
use Auth;
use DB;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Carbon;



class ClupTransactionExport implements FromView,WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection


    */
    protected $leagueData1;
    protected $id;
    


    public function __construct($leagueData1,$id)
    {
        $this->leagueData1 = $leagueData1;
        $this->id = $id;

    }
    public function view(): View
    {
        $ongngLeaguesCount=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->get();
        if(count($ongngLeaguesCount)>0){
            $league=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->first();
        }else{
            $league=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->orderBy('id','desc')->latest()->first();
        }   

        if($this->leagueData1!=null){
            $league=League::find($this->leagueData1);
        
            $clubId=array();
           $clubId2=array();
           $clubs= DB::table('group_registrations')->where('league_id',$league?$league->id:'')
                 ->join('clubs', 'group_registrations.club_id', '=', 'clubs.id')
                 ->select('clubs.id')
                 ->groupBy('clubs.id')->get();
                 $clubs2= DB::table('registrations')->where('league_id',$league?$league->id:'')
                 ->join('users', 'registrations.user_id', '=', 'users.id')
                 ->join('clubs', 'users.club_id', '=', 'clubs.id')
                 ->select('clubs.club_name','clubs.id')
                 ->groupBy('clubs.id')->get();
                 foreach($clubs as $club){
                   $clubId[]=$club->id;
                 }
                 foreach($clubs2 as $club){
                   $clubId2[]=$club->id;
                 }
                 $club=array_unique(array_merge($clubId, $clubId2));
                 $registrations=Club::whereIn('id',$club)->get();
           }else{
            $clubId=array();
           $clubId2=array();
           $clubs= DB::table('group_registrations')->where('league_id',$league?$league->id:'')
                 ->join('clubs', 'group_registrations.club_id', '=', 'clubs.id')
                 ->select('clubs.id')
                 ->groupBy('clubs.id')->get();
                 $clubs2= DB::table('registrations')->where('league_id',$league?$league->id:'')
                 ->join('users', 'registrations.user_id', '=', 'users.id')
                 ->join('clubs', 'users.club_id', '=', 'clubs.id')
                 ->select('clubs.club_name','clubs.id')
                 ->groupBy('clubs.id')->get();
        
                 foreach($clubs as $club){
                   $clubId[]=$club->id;
                 }
                 foreach($clubs2 as $club){
                   $clubId2[]=$club->id;
                 }
                 $club=array_unique(array_merge($clubId, $clubId2));
                 $registrations=Club::whereIn('id',$club)->get();
            
           }
   
       return view('admin.reports.clubTransactionExcel', [
        'registrations'=>  $registrations,
        'league'=>  $league,

    
    ]);

    
}
       
    public function headings(): array
    {
        return [
            'clubName',
            'Paid Amount',
            'Unpaid Amount'

        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(35);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(12);
               

                $event->sheet->getColumnDimension('A')->setWidth(50);
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
