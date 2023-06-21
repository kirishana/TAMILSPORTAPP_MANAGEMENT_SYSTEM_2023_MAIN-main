<?php

namespace App\Exports;

use App\Models\Organization;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Auth;

class OrganizationsExport implements FromView, WithHeadings,WithEvents
{
    protected $categories;
   

    public function __construct($categories)
    {

        $this->categories = $categories;

    }

    public function view(): View
    {

        if(Auth::user()->hasRole(1)){
            $organizations = Organization::where('country_id',Auth::user()->country_id);
            if($this->categories){
            foreach ($this->categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                     $organizations = $organizations->where('season_id', $values);

                    }
                }
                
            }
        }else{
            $organizations = Organization::where('country_id',Auth::user()->country_id);

        }
        }

        
        else{
            $organizations = Organization::whereNotNull('status');

            if($this->categories){
            foreach ($this->categories as $key => $values) {
                if ($key == "country") {
                    if($values!=0){
                        $organizations = $organizations->where('country_id', $values);
                    }
                } 
                elseif ($key == "season") {
                    if($values!=0){
                        $organizations = $organizations->where('season_id', $values);
                    }
                }
                elseif ($key == "name") {
                    if($values!=null){
                        $organizations = $organizations->where('name', 'like', '%' . $values. '%');
                    }
                } 
            }
        }else{
            $organizations = Organization::whereNotNull('status');

        }
        }
        $organizations = $organizations->get();
        return view('admin.reports.filterData', [
            'organizations' => $organizations
        ]);
    }

    public function headings(): array
    {
        return [
            'Organization Name',
            'Email',
            'Contact Number',
            'City',
            'Country',
            'Season'
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
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(12);
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
