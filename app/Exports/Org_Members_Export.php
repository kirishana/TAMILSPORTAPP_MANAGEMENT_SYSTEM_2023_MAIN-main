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

class Org_Members_Export implements FromView, WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return User::all();
    // }
    protected $search3;
    protected $id;
    protected $sorttypeMember;
    protected $sortByMember;

    public function __construct($search3, $id,$sorttypeMember,$sortByMember)
    {
        
        $this->search3 = $search3;
        $this->id = $id;
        $this->sorttypeMember = $sorttypeMember;
        $this->sortByMember = $sortByMember;
    }

    public function view(): View
    {
       
// ----------------------------------------------------------------------------------
$dob=null;
if(is_numeric($this->search3)&& ((strlen($this->search3)==1)||(strlen($this->search3)==2))){
$today=Carbon\Carbon::now()->format('Y');
$dob=$today-$this->search3;
}
        if($this->search3 !=''){ 
            if($this->sortByMember){
                if($this->sortByMember=='club'){
            $users = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
            ->where(function($query) use($dob){
                return $query
                ->Where('last_name','like', '%' . $this->search3 . '%')
                ->orWhere('first_name','like', '%' . $this->search3 . '%')
                ->orWhere('email', $this->search3 )
                ->orWhereYear('dob',$dob!=null?$dob:'');

            })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$this->sorttypeMember)->get();
        }else{
            $users = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
            ->where(function($query) use($dob){
                return $query
                ->Where('last_name','like', '%' . $this->search3 . '%')
                ->orWhere('first_name','like', '%' . $this->search3 . '%')
                ->orWhere('email', $this->search3 )
                ->orWhereYear('dob',$dob!=null?$dob:'');

            })->orderBy($this->sortByMember,$this->sorttypeMember)->get();

        }
    }else{
        $users = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
        ->where(function($query) use($dob){
            return $query
            ->Where('last_name','like', '%' . $this->search3 . '%')
                ->orWhere('first_name','like', '%' . $this->search3 . '%')
                ->orWhere('email', $this->search3 )
                ->orWhereYear('dob',$dob!=null?$dob:'');

        })->get();

    }
        }else{
            if($this->sortByMember){
                if($this->sortByMember=='club'){
                    $users = User::Role(['Player'])
                    ->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$this->sorttypeMember)
                    ->get();
                }else{
                    $users = User::Role(['Player'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                    ->orderBy($this->sortByMember,$this->sorttypeMember)->get();

                }

            }else{
                $users = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->orderBy('created_at','desc')->get();

            }
        }

        return view('organizations.org_members_Export', [
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
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(30);

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
