<?php

namespace App\Exports;

use App\User;
use Auth;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithUsers;
use App\Models\Club;
use App\Models\Country;
use App\Models\Organization;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon;

class OrgUsersListExport implements FromView, WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return User::all();
    // }
    protected $search5;
    protected $id;
    protected $sortBy;
    protected $sorttype;

    public function __construct($search5, $id,$sortBy,$sorttype)
    {
        
        $this->search5 = $search5;
        $this->id = $id;
        $this->sortBy = $sortBy;
        $this->sorttype = $sorttype;
    }

    public function view(): View
    {
       
// ----------------------------------------------------------------------------------
$dob=null;
if(is_numeric($this->search5)&& ((strlen($this->search5)==1)||(strlen($this->search5)==2))){
$today=Carbon\Carbon::now()->format('Y');
$dob=$today-$this->search5;
}
  if($this->search5 != ''){
                if($this->sortBy){
                if($this->sortBy=='club'){

                    $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('is_approved',1)
                    ->where(function($query) use($dob){
                        return $query
                    ->whereHas('roles', function ($q)  {
                        $q->where('name', 'like', '%' . $this->search5 . '%');     
                    })
                    ->orwhereHas('club', function ($q)  {
                        $q->where('club_name', 'like', '%' . $this->search5 . '%');
        
                    })           
                    ->orWhere('first_name','like', '%' . $this->search5 . '%')
                    ->orWhere('email', $this->search5 )
                    ->orWhere('tel_number',$this->search5)
                    ->orWhere('last_name','like', '%' . $this->search5 . '%')
                    ->orWhereYear('dob',$dob!=null?$dob:'');
                    })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$this->sorttype)->get();
                    
                }else{
                    $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('is_approved',1)
                    ->where(function($query) use($dob){
                        return $query
                    ->whereHas('roles', function ($q) {
                        $q->where('name', 'like', '%' . $this->search5 . '%');     
                    })
                    ->orwhereHas('club', function ($q) {
                        $q->where('club_name', 'like', '%' . $this->search5 . '%');
        
                    })           
                    ->orWhere('first_name','like', '%' . $this->search5 . '%')
                    ->orWhere('email', $this->search5 )
                    ->orWhere('tel_number',$this->search5)
                    ->orWhere('last_name','like', '%' . $this->search5 . '%')
                    ->orWhereYear('dob',$dob!=null?$dob:'');
                    })->orderBy($this->sortBy, $this->sorttype)->get();
                }
            }else{
                $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('is_approved',1)
                    ->where(function($query) use($dob){
                        return $query
                    ->whereHas('roles', function ($q) {
                        $q->where('name', 'like', '%' . $this->search5 . '%');     
                    })
                    ->orwhereHas('club', function ($q){
                        $q->where('club_name', 'like', '%' . $this->search5 . '%');
        
                    })           
                    ->orWhere('first_name','like', '%' . $this->search5 . '%')
                    ->orWhere('email', $this->search5 )
                    ->orWhere('tel_number',$this->search5)
                    ->orWhere('last_name','like', '%' . $this->search5 . '%')
                    ->orWhereYear('dob',$dob!=null?$dob:'');
                    })->orderBy('first_name','Asc')->get();
            }
                   
        }else{
            if($this->sortBy){

            if($this->sortBy=='club'){
                $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('is_approved',1)->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$this->sorttype)->get();
            }
           else{
                $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('is_approved',1)->orderBy($this->sortBy, $this->sorttype)->get();

            }
        }else{
            $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('is_approved',1)->orderBy('first_name','Asc')->get();

        }
        }

        // dd($users);
        

        return view('admin.users.org-userlist-export', [
            'users' => $users,
           'id' => $this->id
       ]);
        // $country=Country::all();
        // $user=User::all();
        // $organization=Organization::all();
        // $roles=Role::all();
        // $view2 = view('admin.users.user-list-table', compact('roles','users', 'country', 'user', 'organization', 'id'))->render();
        // return response()->json(['html' => $view2]);
    }     

    public function headings(): array
    {
        return [
            ' Name',
            'Email',
            'Contact Number',
            'Age',
            'Role',
            'Country',
            'Organization',
            'club'
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
  
  
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(32);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(32);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(14);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(10);

                // $event->sheet->getColumnDimension('A')->setWidth(50);
                $event->sheet->getStyle('A1:J1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:J1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
