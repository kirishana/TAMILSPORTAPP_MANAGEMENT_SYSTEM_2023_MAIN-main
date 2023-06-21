<?php

namespace App\Exports;

use App\Models\GroupRegistration;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Auth;


class ClubGroupEventpaymentExport implements  FromView,WithHeadings,WithEvents
{

   protected $categories;
    protected $id;
   

    public function __construct($categories,$id)
    {

        $this->categories = $categories;
        $this->id = $id;
       
    }
    public function view(): View
    {
        $groupregistration=GroupRegistration::has('event','>',0)->where('club_id', Auth::user()->club_id?Auth::user()->club_id:$this->id);

        if ($this->categories) {
            foreach ($this->categories as $key => $values) {
                if ($key == "G-trans_id") {
                    if($values!=0){
                        $groupregistration=$groupregistration->where('trans_id', 'like', '%' . $values. '%');
                    }
                }else if ($key == "G-status") {
                if($values!=0){
                    if($values==2){
                        $groupregistration=$groupregistration->where('status','=',$values); 
                    }else{
                        $groupregistration=$groupregistration->whereNotIn('status',[2]); 
                    } 
                }
            } elseif ($key == "G-league") {
                    if($values!=0){
                        $groupregistration=$groupregistration->where('league_id',$values);
                    }
                }
            }
        }
        else{
            $groupregistration=GroupRegistration::has('event','>',0)->where('club_id', Auth::user()->club_id?Auth::user()->club_id:$id);
        }
        $groupregistration=$groupregistration->get();


   return view('admin.reports.clubpayment.groupPayment', [
    'groupregistration'=>  $groupregistration

]);

    }

    public function headings(): array
    {
        return [
            'Events',
            'Transaction id',
            'Status',
            'Paid Amount'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(15);
              
                // $event->sheet->getColumnDimension('A')->setWidth(50);
                $event->sheet->getStyle('A1:E1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
