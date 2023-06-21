<?php

namespace App\Exports;
use App\User;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon;

class clubMembersearchExport implements FromView, WithHeadings,WithEvents

{

    // protected $id;
    /**
    * @return \Illuminate\Support\Collection
    */

    
    protected $search;
    protected $id;
    protected $sortBy;
    protected $sorttype;
   

    public function __construct($search, $id,$sortBy,$sorttype)
    {
        
        $this->search = $search;
        $this->id = $id;
        $this->sortBy = $sortBy;
        $this->sorttype = $sorttype;
    }

    public function view(): View
    {
       
// ----------------------------------------------------------------------------------
$dob=null;
if(is_numeric($this->search)&& ((strlen($this->search)==1)||(strlen($this->search)==2))){
$today=Carbon\Carbon::now()->format('Y');
$dob=$today-$this->search;
}
 if($this->search != ''){
 if($this->sortBy){
    $users = User::Role(['player'])->where('club_id', Auth::user()->club_id ? Auth::user()->club_id : $this->id)->where('is_approved',1)  
    ->where(function($query) use($dob){
        return $query
    ->Where('first_name','LIKE', '%' . $this->search . '%')
    ->orWhere('email', $this->search )
    ->orWhere('last_name','LIKE', '%' . $this->search . '%')
    ->orWhereYear('dob',$dob!=null?$dob:'');
    })->orderBy($this->sortBy, $this->sorttype)
     ->get();
 }else{
    $users = User::Role(['player'])->where('club_id', Auth::user()->club_id ? Auth::user()->club_id : $this->id)->where('is_approved',1)  
    ->where(function($query) use($dob){
        return $query
    ->Where('first_name','LIKE', '%' . $this->search . '%')
    ->orWhere('email', $this->search )
    ->orWhere('last_name','LIKE', '%' . $this->search . '%')
    ->orWhereYear('dob',$dob!=null?$dob:'');
    })->orderBy('id', 'DESC')
     ->get();
 }
            
     
      
    }else{
        if($this->sortBy){
            $users = User::Role(['player'])->where('club_id', Auth::user()->club_id)->where('is_approved',1)->orderBy($this->sortBy, $this->sorttype)->get();

        }else{
            $users = User::Role(['player'])->where('club_id', Auth::user()->club_id)->where('is_approved',1)->orderBy('id', 'DESC')->get();

        }
       
    }
  
    

        return view('clubs.club_membersExcel', [
             'users' => $users,
            'id' => $this->id
        ]);
        
     
    }     


 public function headings(): array
        {
            return [
                'Full Name',
                'Age',
                'Email',
                'status',
                'RegistrationDate'
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
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(8);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(6);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(20);
                // $event->sheet->getColumnDimension('A')->setWidth(50);
                $event->sheet->getStyle('A1:H1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:H1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
              
            },
        ];
    }
}