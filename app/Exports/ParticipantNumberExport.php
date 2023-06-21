<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\Registration;
use Auth;
use Illuminate\Support\Carbon;

class ParticipantNumberExport implements FromView, WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection


    */
    protected $FUleagueId;
    protected $data;
    protected $id;
    protected $Query;
    protected $dataId;
    protected $orderType;
    protected $columnName;

    public function __construct($FUleagueId,$data,$id,$Query,$dataId,$orderType,$columnName)
    {
        $this->FUleagueId = $FUleagueId;
        $this->data = $data;
        $this->id = $id;
        $this->Query = $Query;
        $this->dataId = $dataId;
        $this->orderType = $orderType;
        $this->columnName = $columnName;
       
    }
    public function view(): View
    {
        if($this->data||$this->FUleagueId){
        if($this->data!=" "){
            if($this->FUleagueId=="whole"){
                    $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->wherehas('league',function($q){
                        $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    });
                if ($this->dataId == "club") {
                    $registrations = $registrations->whereHas('user', function ($q) {
                        $q->where('club_id', $this->Query);
                    });
                }elseif($this->dataId == "organization") {
                $registrations = $registrations->whereHas('user', function ($q) {
                    $q->where([['organization_id', $this->Query],['club_id',null]]);
                });    
                }elseif($this->dataId == "without-Membership") {
                    // dd($dataId);
                $registrations = $registrations->wherehas('user', function ($q) {
                    $q->where([['organization_id',null],['club_id',null]]);
                });    
                }elseif($this->dataId == "Club/Organization") {
                    $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->wherehas('league',function($q){
                        $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    });
            }   
                 
        }else{
           
                    $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id],['league_id',$this->FUleagueId]] )->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    });
                if ($this->dataId == "club") {
                    $registrations = $registrations->whereHas('user', function ($q) {
                        $q->where('club_id', $this->Query);
                    });
                }elseif($this->dataId == "organization") {
                $registrations = $registrations->whereHas('user', function ($q) {
                    $q->where([['organization_id', $this->Query],['club_id',null]]);
                });    
                }elseif($this->dataId == "without-Membership") {
                $registrations = $registrations->whereHas('user', function ($q) {
                    $q->where([['organization_id',null],['club_id',null]]);
                });    
                }elseif($this->dataId == "Club/Organization") {
                $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id],['league_id',$this->FUleagueId]] )->wherehas('user',function($q){
                    $q->where('is_approved',1);
                });
    
            }
            }
        }else{
            $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->wherehas('league',function($q){
                $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
                $q->where('is_approved',1);
            });
        }
    }else{
        $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
            $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
            $q->where('is_approved',1);
        });
        // dd($registrations);
    }
        $registrations = $registrations->get();
        if($this->columnName=='number'){
            if($this->orderType=='asc'){
                $registrations=$registrations->sortBy(function($query){
                            return $query->user->userId;
                         })->all();
                        }
                        else{
                            $registrations=$registrations->sortByDesc(function($query){
                                return $query->user->userId;
                             })->all();
                        }
                    }
        // dd($registrations);
        return view('admin.leagues.playerNumberExcelData', [
            'registrations'=>  $registrations,            
        ]);



    }
    public function headings(): array
    {
        return [
            ' ParticipantNumber',
            'Participant Name',        
            'club'
        ];
    }
   public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(25);
               
                $event->sheet->getStyle('A1:C1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:C1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}