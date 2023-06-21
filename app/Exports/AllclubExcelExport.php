<?php

namespace App\Exports;
use App\Models\Club;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;

class AllclubExcelExport implements FromView, WithHeadings,WithEvents

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
            
    $clubs = Club::where('is_approved',1)
            
         ->where(function($query){
        return $query
        ->orWhere('club_name','LIKE', '%' . $this->search . '%')              
        ->orWhere('club_registation_num','LIKE', '%' . $this->search . '%')            
        ->orWhere('club_email','LIKE', '%' . $this->search . '%')
        ->orWhere('mobile','LIKE', '%' . $this->search . '%');               
               
        })->orderBy('id', 'DESC')->get();
      
        }else{

            $clubs = Club::where('is_approved',1)->orderBy('id', 'DESC')->get();
       
        }
    
  
    

        return view('clubs.club_excel', [
             'clubs' => $clubs,
            'id' => $this->id
        ]);
        
     
    }     


 public function headings(): array
        {
            return [
                'Club Name',
                'Club Reg No',
                'Club Email',
                ' Mobile',
                'No of Members',
                'EST.DATE',
            ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(14);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(11);
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