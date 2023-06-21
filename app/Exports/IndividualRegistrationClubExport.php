<?php

namespace App\Exports;

use App\Models\Registration;
use App\Models\MainEvent;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon as Carbon;



class IndividualRegistrationClubExport implements FromView,WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection


    */
    protected $categories;
    protected $filter;


    public function __construct($categories,$filter)
    {
        $this->categories = $categories;
        $this->filter = $filter;
    }

    public function view(): View
    {
      
            $registations=Registration::where([['is_approved','=',1],['self_reg','=',1]])->distinct('user_id')->wherehas('user',function($q){
                $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
            });
            if ($this->categories) {
                foreach ($this->categories as $key => $values) {
                    if ($key == "Gender") {
                        if($values!=0){
                            $registations=$registations->where('gender',$values);
                        }
                    }
                    elseif ($key == "League") {
                        if($values!=0){
                            $registations=$registations->where('league_id',$values);
                        }
                    }
                    elseif ($key == "Event") {
                        if($values!=0){
                            $registations=$registations->whereHas('events',function($qu) use($values){
                                $qu->whereHas('mainEvent',function($qur) use($values) {
                                    $qur->where('id','=',$values);
                                });
                            });
                            $this->filter=$values;
                        }
                    }
                    elseif ($key == "name") {
                        if($values!=null){
                            $registations=$registations->wherehas('user',function($q) use($values) {
                                $q->where('first_name', 'like', '%' . $values. '%')->orwhere('last_name', 'like', '%' . $values . '%');
                            });
                        }
                    }elseif ($key == "AgeGroup") {
                        if($values!=0){
                            $exp = preg_split("/-/", $values);
                            $regist=Registration::where([['is_approved','=',1],['self_reg','=',1]])->distinct('user_id')->wherehas('user',function($q){
                                $q->where('is_approved',1)->where('club_id',Auth::user()->club_id);
                            })->get();
                            $userDobYear=array();
        
                            foreach($regist as $user){
                                $dob=$user->user->dob;
                                $mine = Carbon::createFromFormat('Y-m-d', $dob)->format('Y');
                                $today = Carbon::now()->format('Y');
                                $age = $today - $mine;
                                    if(isset($exp[1])) {
                                        if (($exp[0] < $age||$exp[0]==$age) && ($exp[1] == $age || $exp[1] > $age ) ) {
                                            // $userDobYear[]=$today-$age;
                                            $userDobYear[]=$user->user->dob;
                                        }
                                    }if($exp[0]==$age){
                                        $userDobYear[]=$user->user->dob;
                                    }
                                   
                                    
                        }
                        $registations=$registations->wherehas('user',function($q) use($userDobYear) {
                            $q->whereIn('dob',array_values($userDobYear));
                        }); 
                        }
                        }
                }
            }
            else {
        
                $registations=Registration::where([['is_approved','=',1],['self_reg','=',1]])->distinct('user_id')->wherehas('user',function($q){
                    $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
                });
            }   
            $registations=$registations->orderBy('created_at','DESC')->get();  

       return view('admin.reports.clubteam.individualEventsFilter', [
        'registations'=>  $registations,
        'filter'=>  $this->filter
    
    ]);

    
}
       
    public function headings(): array
    {
        return [
            'PARTICIPANTS   NAME',
            'LEAGUE ',
            'EVENT',
            'AGE',
            'GENDER'
           
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(6);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(12);
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