<?php

namespace App\Exports;
use App\User;
use App\Models\Club;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
// use Auth;
// use App\Models\User;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class OrgStaffListExport implements FromView, WithStartRow,WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return User::all();
    // }

    protected $search2;
    protected $id;
    protected $sorttypeStaff;
    protected $sortByStaff;
   

    public function __construct($search2, $id,$sorttypeStaff,$sortByStaff)
    {
        
        $this->search2 = $search2;
        $this->id = $id;
        $this->sorttypeStaff = $sorttypeStaff;
        $this->sortByStaff = $sortByStaff;
    }

    public function view(): View
    {
       
// ----------------------------------------------------------------------------------
         if($this->search2 != ''){
                if($this->sortByStaff){
                    if($this->sortByStaff=='club'){
                        $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                        ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                        ->where(function($query) {
                            return $query
                            ->whereHas('roles', function ($q)  {
                                $q->where('name', 'like', '%' . $this->search2 . '%');                      
                            })
                        ->orwhere('email', $this->search2 )
                        ->orWhere('tel_number',$this->search2)
                        ->orWhere('last_name','like', '%' . $this->search2 . '%')
                        ->orWhere('first_name','like', '%' . $this->search2 . '%');
                        })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$this->sorttypeStaff)->get();
                    }else{
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                    ->where(function($query) {
                        return $query
                        ->whereHas('roles', function ($q)  {
                            $q->where('name', 'like', '%' . $this->search2 . '%');                      
                        })
                    ->orwhere('email', $this->search2 )
                    ->orWhere('tel_number',$this->search2)
                    ->orWhere('last_name','like', '%' . $this->search2 . '%')
                    ->orWhere('first_name','like', '%' . $this->search2 . '%');
                    })->orderBy($this->sortByStaff,$this->sorttypeStaff)->get();
                    }  
                }else{
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                    ->where(function($query) {
                        return $query
                        ->whereHas('roles', function ($q)  {
                            $q->where('name', 'like', '%' . $this->search2 . '%');                      
                        })
                    ->orwhere('email', $this->search2 )
                    ->orWhere('tel_number',$this->search2)
                    ->orWhere('last_name','like', '%' . $this->search2 . '%')
                    ->orWhere('first_name','like', '%' . $this->search2 . '%');
                    })->orderBy('created_at','Desc')->get();
                }

        }else{
            if($this->sortByStaff){
                if($this->sortByStaff=='club'){
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$this->sorttypeStaff)
                    ->get();
                }else{
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                    ->orderBy($this->sortByStaff,$this->sorttypeStaff)->get();

                }

            }else{
                $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)
                    ->orderBy('created_at','Desc')->get();
            }
        }

        return view('organizations.show_org_staff_export', [
             'users' => $users,
            'id' => $this->id,
            'header'=>null,
            'setting'=>null
        ]);
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
                'Organization'
            ];
        }
        /**
         * @return \Illuminate\Support\Collection
      
      
         */
        public function startRow(): int
        {
            return 2;
        }
        public function registerEvents(): array
        {
            return [
                AfterSheet::class    => function(AfterSheet $event) {
       
                    $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                    $event->sheet->getDelegate()->freezePane('A2');
                    $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
                    $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(32);
                    $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);
                    $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(5);
                    $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(20);
                    $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(20);
                    $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(10);
                    $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(15);

                    // $event->sheet->getColumnDimension('A')->setWidth(50);
                    $event->sheet->getStyle('A1:I1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
    
                    $event->sheet->getStyle('A1:I1')->applyFromArray([
                        'font' => [
                            'bold' => true
                        ]
                    ]);
                },
            ];
        }
    }
    