<?php

namespace App\Exports;

use App\Models\Registration;
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



class ParticipantsExport implements FromView,WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection


    */
    protected $categories;
    protected $id;

    public function __construct($categories,$id)
    {
        $this->categories = $categories;
        $this->id = $id;
        $this->filter = null;

    }
    public function view(): View
    {
        $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id],['is_approved','=',1]])->wherehas('user',function($q){
            $q->where('is_approved',1);
        });
        $this->filter=null;
        if ($this->categories) {
        foreach ($this->categories as $key => $values) {
            if ($key == "gender") {
                if($values!=0){
                    $registrations =  $registrations->where('gender',$values);
                }
            } 
            elseif ($key == "name") {
                if($values!=null){
                    $registrations=$registrations->whereHas('user',function($q) use($values){
                        $q->where('first_name', 'like', '%' . $values. '%')
                        ->orwhere('last_name', 'like', '%' . $values. '%'); 
                        });                
                }
            }
            elseif ($key == "club") {
                if($values!=0){
                    $registrations=$registrations->whereHas('user',function($q) use($values){
                        $q->where('club_id',$values);
                    });          
                }
            }
            elseif ($key == "age_group") {
                if($values!=0){
                    $exp = preg_split("/-/", $values);
                    $regist=Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    })->get();
                    $userDobYear=array();
                    foreach($regist as $user){
                        $dob=$user->user->dob;
                        $mine = Carbon::createFromFormat('Y-m-d', $dob)->format('Y');
                        $today = Carbon::now()->format('Y');
                        $age = $today - $mine;
                            if(isset($exp[1])) {
                                if (($exp[0] < $age||$exp[0]==$age) && ($exp[1] == $age || $exp[1] > $age ) ) {
                                    $userDobYear[]=$user->user->dob;
                                }
                            }if($exp[0]==$age){
                                $userDobYear[]=$user->user->dob;
                            }   
                }
                $registrations=$registrations->wherehas('user',function($q) use($userDobYear) {
                    $q->whereIn('dob',array_values($userDobYear));
                });       
            }
            }
            elseif ($key == "league") {
                if($values!=0){
                    $registrations=$registrations->where('league_id', $values); 
                }
            }
            elseif ($key == "event") {
                if($values!=0){
                    $registrations=$registrations->whereHas('events',function($qu) use($values){
                        $qu->whereHas('mainEvent',function($qur) use($values) {
                            $qur->where('id','=',$values);
                        });
                    });
                    $this->filter=$values;
                }else{
                    $this->filter=null;
                }
            }
        }
    }
    else {
        $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->wherehas('user',function($q){
            $q->where('is_approved',1);
        });
        } 
        $registrations=$registrations->get();
   
       return view('admin.PDF.participants', [
        'registrations'=>  $registrations,
        "filter"=>$this->filter
    
    ]);

    
}
       
    public function headings(): array
    {
        return [
            'Name',
            'Age',
            'Gender',
            'Club',
            'Event'
           
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(32);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(25);
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
