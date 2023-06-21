<?php

namespace App\Exports;

use App\Models\Registration;
use App\User;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;



class PaymentsExport implements FromView,WithHeadings, WithEvents
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
$registration=Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->whereIn('status',[1,2,3])->wherehas('user',function($q){
            $q->where('is_approved',1);
        });

        if ($this->categories) {
            foreach ($this->categories as $key => $values) {
                if ($key == "player_name") {
                    if($values!=null){
                        $registration=$registration->whereHas('user',function($query) use($values){
                            $query->where('first_name', 'like', '%' . $values. '%')
                            ->orwhere('last_name', 'like', '%' . $values. '%');
    
                        });
                    }
                } 
                elseif ($key == "status") {
                    if($values!=0){
                        $registration=$registration->where('status','=',$values); 
                    }
                }
    
                elseif ($key == "season") {
                    if($values!=0){
                        $registration=$registration->where('season_id',$values);
                    }
                } 
                elseif ($key == "league") {
                    if($values!=0){
                        $registration=$registration->where('league_id',$values);
                    }
                } 
                elseif ($key == "membership") {
                    if($values!=5){
                        $registration=$registration->wherehas('user',function($q) use($values){
                            $q->where('member_or_not',$values);
                        });
                    }
                } 
                elseif ($key == "trans_id") {
                    if($values!=null){
                        $registration=$registration->where('trans_id', 'like', '%' . $values. '%');
                    }
                }
            }
        }else{
    $registration=Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('status',[1,2,3]);
    
        }
        $registration=$registration->get();

       return view('admin.reports.paymentsfilter', [
        'registration'=>  $registration
    
    ]);

    
}
       
    public function headings(): array
    {
        return [
            'Player Name',
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
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(18);
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