<?php

namespace App\Exports;
use App\Models\GroupRegistration;
use App\Models\Club;
use App\Models\League;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;
use DB;

class PayReqGroupExport implements FromView, WithHeadings,WithEvents

{

    // protected $id;
    /**
    * @return \Illuminate\Support\Collection
    */

    
    protected $search3;
    protected $sortbyGpay;
    protected $sorttypeGpay;
    protected $id;
   

    public function __construct($search3,$sortbyGpay,$sorttypeGpay,$id)
    {
        
        $this->search3 = $search3;
        $this->sortbyGpay = $sortbyGpay;
        $this->sorttypeGpay = $sorttypeGpay;
        $this->id = $id;
    }

    public function view(): View
    {
        if($this->search3!=''){
            if($this->sortbyGpay){
                if($this->sortbyGpay=='club_name'){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])
                    ->where(function($query)       {
                        return $query
                        ->orWhereHas('league', function ($q) {
                            $q->where('name', 'LIKE', '%' . $this->search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) {
                            $q->where('club_name', 'LIKE', '%' . $this->search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) {
                            $q->where('club_email', 'LIKE', '%' . $this->search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $this->search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->orderBy(Club::select('club_name')->whereColumn('clubs.id','group_registrations.club_id'),$this->sorttypeGpay)->get(); 
                }
                elseif($this->sortbyGpay=="totalfee"){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])
                    ->where(function($query) {
                        return $query
                        ->orWhereHas('league', function ($q)  {
                            $q->where('name', 'LIKE', '%' . $this->search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q)  {
                            $q->where('club_name', 'LIKE', '%' . $this->search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q)  {
                            $q->where('club_email', 'LIKE', '%' . $this->search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $this->search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->orderBy(DB::raw('sum(totalfee)'),$this->sorttypeGpay)->get();
                }elseif($this->sortbyGpay=="league"){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])
                ->where(function($query) {
                    return $query
                    ->orWhereHas('league', function ($q)  {
                        $q->where('name', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q)  {
                        $q->where('club_name', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q)  {
                        $q->where('club_email', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $this->search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderBy(League::select('name')->whereColumn('leagues.id','group_registrations.league_id'),$this->sorttypeGpay)->get();

                }
                elseif($this->sortbyGpay=="Payment"){
                    if($this->sorttypeGpay=='asc'){
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])
                ->where(function($query) {
                    return $query
                    ->orWhereHas('league', function ($q)  {
                        $q->where('name', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q)  {
                        $q->where('club_name', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q){
                        $q->where('club_email', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $this->search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderbyRaw('FIELD(payment_method,1,3,4,2)')->get();
                    }else{
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])
                ->where(function($query) {
                    return $query
                    ->orWhereHas('league', function ($q)  {
                        $q->where('name', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q)  {
                        $q->where('club_name', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q)  {
                        $q->where('club_email', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $this->search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderbyRaw('FIELD(payment_method,2,4,3,1)')->get();
                    }
                }
                else{
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])
                ->where(function($query) {
                    return $query
                    ->orWhereHas('league', function ($q)  {
                        $q->where('name', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q)  {
                        $q->where('club_name', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q)  {
                        $q->where('club_email', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $this->search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderBy($this->sortbyGpay,$this->sorttypeGpay)->get(); 
                }
                

            }else{
                $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])
                ->where(function($query) {
                    return $query
                    ->orWhereHas('league', function ($q)  {
                        $q->where('name', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q)  {
                        $q->where('club_name', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q)  {
                        $q->where('club_email', 'LIKE', '%' . $this->search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $this->search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->get();
            }
           


        }else{
            if($this->sortbyGpay){
                if($this->sortbyGpay=='club_name'){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(Club::select('club_name')->whereColumn('clubs.id','group_registrations.club_id'),$this->sorttypeGpay)->get();
                }
                elseif($this->sortbyGpay=='league'){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(League::select('name')->whereColumn('leagues.id','group_registrations.league_id'),$this->sorttypeGpay)->get();
                }
                elseif($this->sortbyGpay=='totalfee'){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(DB::raw('sum(totalfee)'),$this->sorttypeGpay)->get();
                }
                elseif($this->sortbyGpay=='Payment'){
                    if($this->sorttypeGpay=='asc'){
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderByRaw('FIELD(payment_method,1,3,4,2)')->get();
                    }else{
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                        ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderByRaw('FIELD(payment_method,2,4,3,1)')->get();
                    }
                    
                }
                else{
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy($this->sortbyGpay,$this->sorttypeGpay)->get();
                }
               
            }else{
                $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$this->id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->get();
            }
            
        }

        return view('paymentRequests.Pay_req_Group_export', [
             'groupRegs' => $groupRegs,
            'id' => $this->id
        ]);
        
     
    }     


 public function headings(): array
        {
            return [
                'Club Name',
                ' League',
                'Trans_id',
                'Paid Amount',
            ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(15);
                // $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(14);
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