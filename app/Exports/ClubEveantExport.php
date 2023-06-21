<?php

namespace App\Exports;

// use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use App\Models\Team;
use Auth;
use App\Models\GroupRegistration;
use App\User;
// use Maatwebsite\Excel\Concerns\FromCollection;

class ClubEveantExport implements FromView,WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return User::all();
    // }
    protected $categories;
        protected $id;
       
    
        public function __construct($categories, $id)
        {
    
            $this->categories = $categories;
            $this->id = $id;
        }
    
        public function view(): View
        {
            $group_registations=GroupRegistration::where('id','!=','null');

            if ($this->categories) {
                foreach ($this->categories as $key => $values) {
                    if ($key == "organization") {
                        if($values!=0){
                            $group_registations->wherehas('organization',function($query) use($values) {
                                $query->where('id',$values);
                            });
                        }
                    }elseif ($key == "league") {
                        if($values!=0){
                            $group_registations->wherehas('league',function($query) use($values) {
                                $query->where('id',$values);
                            });
                        }
                    }elseif ($key == "status") {
                        if($values!=5){
                            $group_registations->wherehas('ageGroupGender',function($query) use($values) {
                                $query->where('status',$values);
                            });
                        }
                    } 
                }
            }else{
                $group_registations=GroupRegistration::with('club')->where('club_id',Auth::user()->club_id);
        
            }
                    $group_registations=$group_registations->get();
    
    
            return view('admin.reports.clubteam.clubevents_filter', ['group_registations' => $group_registations]);
        }
    
        public function headings(): array
        {
            return [
                'Organization',
                'League',
                'Event',
                'Age Group',
                'Gender',
                'Team Name',
                'Status'
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
                    $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(11);
                    $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(8);
                    $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(10);
                    $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(18);
                    $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(10);
                    // $event->sheet->getColumnDimension('A')->setWidth(50);
                    // $event->sheet->getStyle('A2:G2')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
                    $event->sheet->getStyle('A1:G1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
    
                    $event->sheet->getStyle('A1:G1')->applyFromArray([
                        'font' => [
                            'bold' => true
                        ]
                    ]);
                    $event->sheet->getStyle('A1:G1')->applyFromArray([
                        'font' => [
                            'bold' => true
                        ]
                    ]);
                },
            ];
        }
    }
