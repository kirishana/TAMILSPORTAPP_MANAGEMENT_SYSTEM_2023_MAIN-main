<?php

namespace App\Exports;
use App\Models\Organization;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;

class OrgExcelExport implements FromView, WithHeadings,WithEvents

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

 if($this->search != ''){
            
        $organizations = Organization::where('status',1)
            
         ->where(function($query){
        return $query
        ->orwhereHas('country', function ($q) {
            $q->where('name', 'LIKE', '%' . $this->search . '%');  
        })
        ->orWhere('name','LIKE', '%' . $this->search . '%')              
        ->orWhere('city','LIKE', '%' . $this->search . '%')            
        ->orWhere('email','LIKE', '%' . $this->search . '%');               
        })->orderBy('id', 'DESC')->get();
      
        }else{

        $organizations = Organization::where('status',1)->get();
       
        }
    
  
    

        return view('organizations.org_excel', [
             'organizations' => $organizations,
            'id' => $this->id
        ]);
        
     
    }     


 public function headings(): array
        {
            return [
                'Org.No',
                'Name',
                'Email',
                ' Mobile',
                'City',
                'Country',
            ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(14);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(15);
                // $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(20);
                // $event->sheet->getColumnDimension('A')->setWidth(50);
                $event->sheet->getStyle('A1:F1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
               
            },
        ];
    }
}