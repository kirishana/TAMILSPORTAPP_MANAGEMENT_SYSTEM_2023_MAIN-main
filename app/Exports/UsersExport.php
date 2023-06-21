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
use Spatie\Permission\Models\Role;

class UsersExport implements FromView, WithHeadings,WithEvents
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
    }

    public function view(): View
    {

        $users = User::where([['organization_id','=',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $this->id],['is_approved','=',1]]);
        if($this->categories){
            foreach ($this->categories as $key => $values) {
               if ($key == "role") {
                if($values!=0){
                    $roleName=Role::find($values);
                    $users =  $users->role($roleName->name);
                }
                } 
                elseif ($key == "gender") {
                    if($values!=0){
                        if ($values==1) {
                            $gender = "male";
                        } else {
                            $gender = 'female';
                        }
                        $users = $users->where('gender', $gender);
                    }
                } 
                elseif ($key == "name") {
                    if($values!=null){
                        $users = $users->where('first_name', 'like', '%' . $values. '%');
                    }
                }
                elseif ($key == "club") {
                    if($values!=0){
                        if ($values=="exceptClub"){
                            $users = User::where([['organization_id','=',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id],['is_approved','=',1]])->where('club_id',null);
                        } else {
                            $users =  $users->where('club_id', $values);
                        }                
                    }
                }
                
            }
        }else{
            $users = User::where([['organization_id','=',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id],['is_approved','=',1]]);
    
        }
        $users = $users->get();
        return view('admin.users.filterUserData', [
            'users' => $users
        ]);
    }

    public function headings(): array
    {
        return [
            'User Name',
            'Email',
            'DOB',
            'Role',
            'Gender',
            'Contact Number',
            'User Id',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(32);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(35);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(10);
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

