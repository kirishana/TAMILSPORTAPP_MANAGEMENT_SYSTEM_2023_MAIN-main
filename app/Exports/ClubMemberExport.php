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

use Maatwebsite\Excel\Concerns\FromCollection;

class ClubMemberExport implements FromView,WithHeadings, WithEvents
{
    

        protected $categories;
        protected $id;
     
        public function __construct($categories, $id)
        {
    
            $this->categories = $categories;
            $this->id = $id;
        }
    
        public function view(): View
        {
    
    
            $users=User::where('club_id', Auth::user()->club_id)->where('is_approved',1);

    
            if ($this->categories) {
                foreach ($this->categories as $key => $values) {
        
                    if ($key == "f_name") {
                        if($values!=null){
                            $users=$users->where('first_name', 'like', '%' . $values. '%');
                        }
                    } 
                    elseif ($key == "l_name") {
                        if($values!=null){
                            $users=$users->where('last_name', 'like', '%' . $values. '%');
                        }
                    } 
                    elseif ($key == "gender") {
                        if($values!=0){
                            if($values==1){
                                $users=$users->where('gender','=','male');
                            }else{
                                $users=$users->where('gender','=','female');
                            }                        
                        }
                    }
                    elseif ($key == "user_id") {
                        if($values!=null){
                            $users=$users->where('userId', 'like', '%' . $values. '%');
                        }
                    }
                }
            }else{
                $users=User::where('club_id', Auth::user()->club_id)->where('is_approved',1);
        
            }
                    $users=$users->get();
    
    
            return view('admin.reports.clubMember.clubMemberFilter', [
                'users' => $users,
            ]);
        }
    
        public function headings(): array
        {
            return [
                'First Name',
                'Last Name',
                'E-mail',
                'DOB',
                'Gender',
                'Contact No',
                'User Id'
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
                    $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);
                    $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(12);
                    $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(10);
                    $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(18);
                    $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(15);
                    
                    // $event->sheet->getColumnDimension('A')->setWidth(50);
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
