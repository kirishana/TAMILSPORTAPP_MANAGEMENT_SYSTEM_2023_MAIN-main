<?php

namespace App\Exports;
use App\User;
use App\Models\Organization;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon;

class UsersListExport implements FromView, WithHeadings,WithEvents

{

    // protected $id;
    /**
    * @return \Illuminate\Support\Collection
    */

    
    protected $search;
    protected $id;
   

    public function __construct($search, $id)
    {
        
        $this->search = $search;
        $this->id = $id;
    }

    public function view(): View
    {
       
// ----------------------------------------------------------------------------------
$org=Organization::first();

$dob=null;
if(is_numeric($this->search)&& ((strlen($this->search)==1)||(strlen($this->search)==2))){
$today=Carbon\Carbon::now()->format('Y');
$dob=$today-$this->search;
}
 if($this->search != ''){
     $users = User::whereNotIn('id',[1])->where('organization_id', null)->where('club_id',null)
     ->where(function($query) use($dob){
         return $query
         ->WhereHas('roles', function ($q){
         $q->where('name', 'LIKE', '%' . $this->search . '%');

         
     })
     
     ->orwhereHas('country', function ($q) {
         $q->where('name', 'LIKE', '%' . $this->search . '%');
     }) 
     ->orWhere('first_name','LIKE', '%' . $this->search . '%')
     ->orWhere('tel_number',$this->search)
     ->orWhere('last_name','LIKE', '%' . $this->search . '%')
     ->orWhere('email', $this->search )
     ->orWhereYear('dob',$dob!=null?$dob:'');
    })->get();
           
        }
   
        else{
            if (Auth::user()->hasRole(1)) {
                $users =  User::whereNotIn('id',[1])->where('organization_id', null)->where('club_id',null)->orderBy('id','desc')->get();
            } else {
                $users =  User::whereNotIn('id',[1])->where('organization_id', null)->where('club_id',null)->orderBy('id','desc')->get();

            }
        }

        return view('admin.users.user-list-print', [
             'users' => $users,
             'org' => $org,
            'id' => $this->id
        ]);
        
       
    }     

 public function headings(): array
        {
            return [
                'Name',
                'Email',
                'Mobile',
                'Role',
                'DOB',
                'Age',
               
            ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(16);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(6);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(20);
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