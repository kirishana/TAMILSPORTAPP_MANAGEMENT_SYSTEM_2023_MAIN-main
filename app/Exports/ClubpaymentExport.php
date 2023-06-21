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


class ClubpaymentExport implements  FromView,WithHeadings,WithEvents
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
        $registration=Registration::has('events','>',0)->wherehas('user',function($query) {
            $query->where('club_id',Auth::user()->club_id?Auth::user()->club_id:$this->id);
        });
        if ($this->categories) {
            foreach ($this->categories as $key => $values) {
                if ($key == "player_name") {
                    if($values!=null){
                        $registration=$registration->wherehas('user',function($query) use($values) {
                            $query->where('first_name','like', '%' . $values. '%')->orwhere('last_name','like', '%' . $values. '%');
                        });
                    }
                } 
                elseif ($key == "status") {
                    if($values!=0){
                        if($values==2){
                            $registration=$registration->where('status','=',$values); 
                        }else{
                            $registration=$registration->whereNotIn('status',[2]); 
                        }                
                    }
                }elseif ($key == "season") {
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
                }elseif ($key == "trans_id") {
                    if($values!=null){
                        $registration=$registration->where('trans_id', 'like', '%' . $values.'%');
                    }
                }
            }
        }else{
            $registration=Registration::wherehas('user',function($query) {
                $query->where('club_id',Auth::user()->club_id);
            });
        }    
        $registration=$registration->get();
   return view('admin.reports.clubpayment.clubpaymentExcel', [
    'registration'=>  $registration

]);

    }

    public function headings(): array
    {
        return [
            'Player Name',
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
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(15);
              
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
