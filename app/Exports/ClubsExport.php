<?php

namespace App\Exports;

use App\Models\Club;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ClubsExport implements FromView, WithHeadings,WithEvents
{
    protected $categories;
   

    public function __construct($categories)
    {

        $this->categories = $categories;
       
    }

    public function view(): View
    {

        $clubs = Club::where('is_approved', 1);
        if($this->categories){
            foreach ($this->categories as $key => $values) {
                if ($key == "country") {
                    if($values!=0){
                        $clubs = $clubs->where('country_id', $values);
                    }
                } 
                
                elseif ($key == "name") {
                    if($values!=null){
                        $clubs = $clubs->where('club_name', 'like', '%' . $values. '%');
                    }
                } 
                
                elseif ($key == "season") {
                    if($values!=0){
                        $clubs = $clubs->where('season_id', $values);
                    }
                }
            }  
        }else{
            $clubs = Club::where('is_approved', 1);
    
        }
        $clubs = $clubs->get();
        return view('admin.reports.filterClubData', [
            'clubs' => $clubs
        ]);
    }

    public function headings(): array
    {
        return [
            'Club Name',
            'ClubRegistration Number',
            'Email',
            'Contact Number',
            'City',
            'Country',
            'Season'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(22);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(10);
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
