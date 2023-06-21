<?php

namespace App\Exports;

use App\Models\GroupRegistration;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class GroupPaymentExport implements FromView,WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection


    */
    protected $categories;
    protected $id;

    public function __construct($categories,$id)
    {
        $this->id = $id;
        $this->categories = $categories;
    }

    public function view(): View
    {
        $groupregistration=GroupRegistration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id],['status','!=',0]]);

        if ($this->categories) {
            foreach ($this->categories as $key => $values) {
    
                if ($key == "club_name") {
                    if($values!=null){
                        $groupregistration=$groupregistration->whereHas('club',function($query) use($values){
                            $query->where('club_name', 'like', '%' . $values. '%');
                        });
                    }
                } 
                elseif ($key == "G-status") {
                    if($values!=0){
                        if($values=="3"){
                            $groupregistration=$groupregistration->where('status','=',4)->orwhere('status','=',3); 
                     }else{
                        $groupregistration=$groupregistration->where('status',$values);
                     }     
                    }
                }
    
                elseif ($key == "G-season") {
                    if($values!=0){
                        $groupregistration=$groupregistration->where('season_id',$values);
                    }
                } 
                elseif ($key == "G-league") {
                    if($values!=0){
                        $groupregistration=$groupregistration->where('league_id',$values);
                    }
                } 
                elseif ($key == "G-trans_id") {
                    if($values!=null){
                        $groupregistration=$groupregistration->where('trans_id', 'like', '%' . $values. '%');
                    }
                }
            }
        }else{
            $groupregistration=GroupRegistration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['status','!=',0]]);
    
        }
        $groupregistration=$groupregistration->get();

       return view('admin.reports.paymentsreqGroup', [
        'groupregistration'=>  $groupregistration
    
    ]);

    
}
       
    public function headings(): array
    {
        return [
            'Club Name',
            'Transaction ID',
            'Status',
            'Amount'
           
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(32);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(17);
                // $event->sheet->getColumnDimension('A')->setWidth(50);
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
