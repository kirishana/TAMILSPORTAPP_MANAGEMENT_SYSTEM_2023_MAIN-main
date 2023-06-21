<?php

namespace App\Exports;

use App\Models\Registration;
use App\Models\MainEvent;
use App\Models\Event;
use App\User;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;



class ParticipantPlayerExport implements FromView,WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection


    */
    protected $categories;
    protected $id;

    public function __construct($categories,$id)
    {
        $this->categories = $categories;
        $this->id = $id;
        $this->filter =null;

    }
    public function view(): View
    {
        $userregistrations = Registration::where('user_id', Auth::user()->id );
       
            if ($this->categories) {
                foreach ($this->categories as $key => $values) {
                    if ($key == "organization") {
                        if($values!=0){
                            $userregistrations=$userregistrations->whereHas('organization',function($qu) use($values){
                                $qu->where('id',$values);
                         });
                        }
                    }
                    elseif ($key == "league") {
                        if($values!=0){
                            $userregistrations=$userregistrations->where('league_id', $values); 
    
                        }
                    }
                    elseif ($key == "event") {
                        if($values!=0){
                                    $this->filter=$values;
                        }else{
                                    $this->filter=null;
                        }
                    }
                }
            }
            else {
                $userregistrations = Registration::where('user_id', Auth::user()->id );
            }  
        $userregistrations=$userregistrations->get();
   
       return view('admin.leagues.participantsForPlayer', [
        'userregistrations'=>  $userregistrations,
        'filter'=>  $this->filter
    
    ]);

    
}
       
    public function headings(): array
    {
        return [
            'Name',
            'Organization Name',
            'League Name',
            'Event Name',
           
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(32);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(25);
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