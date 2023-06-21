<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Auth;


class PlayerpaymentExport implements  FromView,WithHeadings,WithEvents
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
        $child_id=array();
        if(Auth::user()->children){
            $user_ids=Auth::user()->children;
            foreach($user_ids as $user_id){
                $child_id[]=$user_id->id;
            } 
    
        }else{
                $child_id[]=null;
        }
        array_push($child_id,Auth::user()->id);
        $registration=Registration::whereIn('user_id',$child_id)->has('events','>',0);

        if ($this->categories) {
            foreach ($this->categories as $key => $values) {
                if ($key == "amount") {
                    if($values!=null){
                        $registration=$registration->where('totalfee', 'like', '%' . $values . '%');
                    }
                } 
                elseif ($key == "status") {
                    if($values!=0){
                        if($values==2){
                            $registration=$registration->where('status','=',$values); 
                        }else{
                            $registration=$registration->whereIn('status',[3,4]); 
                        }                    
                    }
                }
    
                elseif ($key == "organization") {
                    if($values!=0){
                        $registration=$registration->where('organization_id',$values);
                    }
                } 
                elseif ($key == "league") {
                    if($values!=0){
                        $registration=$registration->where('league_id',$values);
                    }
                } 
                elseif ($key == "trans_id") {
                    if($values!=null){
                        $registration=$registration->where('trans_id', 'like', '%' . $values. '%');
                    }
                }
            }
        }else{
            $registration=Registration::whereIn('user_id',$child_id)->has('events','>',0);
    
        }
            $registration=$registration->get();


   return view('admin.reports.player.pay-filter', [
    'registration'=>  $registration

]);

    }

    public function headings(): array
    {
        return [
            'Organization',
            'League',
            'Events',
            'Transaction id',
            'Payment Method',
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
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(19);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(18);
              
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
