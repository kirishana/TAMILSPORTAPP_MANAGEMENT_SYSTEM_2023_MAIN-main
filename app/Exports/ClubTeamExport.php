<?php

namespace App\Exports;

// use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\Team;
use Auth;
use App\User;

class ClubTeamExport implements FromView, WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
  
    protected $categories;
        protected $id;
       
    
        public function __construct($categories, $id)
        {
    
            $this->categories = $categories;
            $this->id = $id;
        }
    
        public function view(): View
        {
    
    
            $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->where('status',1);
            if ($this->categories) {
                foreach ($this->categories as $key => $values) {
                    if ($key == "t_name") {
                        if($values!=null){
                            $teams=$teams->where('name', 'like', '%' . $values. '%');
                        }
                    }elseif ($key == "p_name") {
                        if($values!=null){
                            $teams=$teams->wherehas('users',function($query) use($values) {
                                $query->where('first_name','like', '%' . $values. '%');
                            });
                        }
                    }elseif ($key == "gender") {
                        if($values!=0){
                            $teams->wherehas('gender',function($query) use($values) {
                                $query->where('id',$values);
                            });
                        }
                    }elseif ($key == "age") {
                        if($values!=0){
                            $teams->wherehas('ageGroup',function($query) use($values) {
                                $query->where('id',$values);
                            });
                        }
                    } 
                }
            }else{
                $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->where('status',1);
        
            }
                       
                    $teams=$teams->get();
    
    
            return view('admin.reports.clubteam.clubteam_excel_table', ['teams' => $teams,]);
        }
    
        public function headings(): array
        {
            return [
                'Club Team Name',
                'Members',
                'Age Group',
                'Gender'
            ];
        }
        public function registerEvents(): array
        {
            return [
                AfterSheet::class    => function(AfterSheet $event) {
       
                    $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                    $event->sheet->getDelegate()->freezePane('A2');
                    $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(22);
                    $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                    $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(12);
                    $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(10);
                  
                    $event->sheet->getStyle('A1:D1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
    
                    $event->sheet->getStyle('A1:D1')->applyFromArray([
                        'font' => [
                            'bold' => true
                        ]
                    ]);
                },
            ];
        }
    }
    
