<?php

namespace App\Exports;
use App\Models\League;
use App\Models\Season;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;

class LeagueExport implements FromView, WithHeadings,WithEvents

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
            
    $seasonIds = array();
    $seasons = Season::where('status', 1)->get();
    foreach ($seasons as $season) {
        $seasonIds[] = $season->id;
    }
    $leagues = League::with(['season', 'sportsCategory', 'venue'])->whereIn('season_id', $seasonIds)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('to_date', '<', Carbon::now())

    ->where(function($query){
        return $query
        ->whereHas('venue', function ($q) {
            $q->where('name', 'LIKE', '%' . $this->search . '%');  
        })
        ->orwhereHas('season', function ($q) {
            $q->where('name',$this->search);  
        })
    ->orWhere('name','LIKE', '%' . $this->search . '%');               
    })->orderBy('id', 'DESC')->get();
    }else{
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
        $leagues = League::with(['season', 'sportsCategory', 'venue'])->whereIn('season_id', $seasonIds)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $this->id)->where('to_date', '<', Carbon::now())->get();
           
    }
    
  
    

        return view('admin.leagues.leagueExcel', [
             'leagues' => $leagues,
            'id' => $this->id
        ]);
        
     
    }     


 public function headings(): array
        {
            return [
                'Name',
                'location',
                ' season',
                'Duration',
                ' Reg.End Date',
            ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(35);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(14);
                // $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(13);
                // $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(20);
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