<?php

namespace App\Exports;
use App\Models\Registration;
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

class PayReqSingleExport implements FromView, WithHeadings,WithEvents

{

    // protected $id;
    /**
    * @return \Illuminate\Support\Collection
    */

    
    protected $searchPrint;
    protected $sortBypay;
    protected $sorttypepay;
    protected $id;
   

    public function __construct($searchPrint,$sortBypay,$sorttypepay,$id)
    {
        
        $this->searchPrint = $searchPrint;
        $this->sortBypay = $sortBypay;
        $this->sorttypepay = $sorttypepay;
        $this->id = $id;
    }

    public function view(): View
    {
       
// ----------------------------------------------------------------------------------

if($this->searchPrint != ''){
    if($this->sortBypay){
        if($this->sortBypay=='name_i'){
           
            if($this->sorttypepay=='asc'){
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                ->where(function($query) {
                    return $query
                    ->orWhereHas('league', function ($q)  {
                        $q->where('name', 'LIKE', '%' . $this->searchPrint . '%');  
                    })
                    ->orWhereHas('user', function ($q)  {
                        $q->wherehas('club',function($q) {
                            $q->where('club_name', 'LIKE', '%' . $this->searchPrint . '%');
                        });
                    })
                    ->orwhere('payment_method', 'LIKE', '%' . $this->searchPrint . '%')
                    ->orwhere('trans_id', 'LIKE', '%' . $this->searchPrint . '%');  
                         
                })->groupBy('trans_id')->get()->sortBy(function($query){
                    return $query->user->club->club_name;
                 })->all();
               
            }else{
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                ->where(function($query) {
                    return $query
                    ->orWhereHas('league', function ($q)  {
                        $q->where('name', 'LIKE', '%' . $this->searchPrint . '%');  
                    })
                    ->orWhereHas('user', function ($q)  {
                        $q->wherehas('club',function($q) {
                            $q->where('club_name', 'LIKE', '%' . $this->searchPrint . '%');
                        });
                    })
                    ->orwhere('payment_method', 'LIKE', '%' . $this->searchPrint . '%')
                    ->orwhere('trans_id', 'LIKE', '%' . $this->searchPrint . '%');  
                         
                })->groupBy('trans_id')->get()->sortByDesc(function($query){
                    return $query->user->club->club_name;
                 })->all();
               
            }

        }elseif($this->sortBypay=='payment_method'){
            if($this->sorttypepay=='asc'){
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                ->where(function($query) {
                    return $query
                ->orWhereHas('league', function ($q)  {
                    $q->where('name', 'LIKE', '%' . $this->searchPrint . '%');  
                })
                ->orWhereHas('user', function ($q)  {
                    $q->wherehas('club',function($q) {
                        $q->where('club_name', 'LIKE', '%' . $this->searchPrint . '%');
                    });
                })
                ->orwhere('payment_method', 'LIKE', '%' . $this->searchPrint . '%')
                ->orwhere('trans_id', 'LIKE', '%' . $this->searchPrint . '%');  

                })->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,1,3,4,2)')->get();
            }else{
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                ->where(function($query) {
                   return $query
                ->orWhereHas('league', function ($q)  {
                    $q->where('name', 'LIKE', '%' . $this->searchPrint . '%');  
                })
                ->orWhereHas('user', function ($q)  {
                    $q->wherehas('club',function($q) {
                        $q->where('club_name', 'LIKE', '%' . $this->searchPrint . '%');
                    });
                })
                ->orwhere('payment_method', 'LIKE', '%' . $this->searchPrint . '%')
                ->orwhere('trans_id', 'LIKE', '%' . $this->searchPrint . '%');  

                })->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,2,4,3,1)')->get();
            }
        }elseif($this->sortBypay=='trans_id'){
            $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                ->where(function($query) {
                    return $query
                    ->orWhereHas('league', function ($q)  {
                        $q->where('name', 'LIKE', '%' . $this->searchPrint . '%');  
                    })
                    ->orWhereHas('user', function ($q)  {
                        $q->wherehas('club',function($q) {
                            $q->where('club_name', 'LIKE', '%' . $this->searchPrint . '%');
                        });
                    })
                    ->orwhere('payment_method', 'LIKE', '%' . $this->searchPrint . '%')
                    ->orwhere('trans_id', 'LIKE', '%' . $this->searchPrint . '%');      
                })->groupBy('trans_id')->orderby($this->sortBypay,$this->sorttypepay)->get();
        
        }elseif($this->sortBypay=='total_i'){
            $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
            ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
            ->where(function($query) {
                return $query
                ->orWhereHas('league', function ($q)  {
                    $q->where('name', 'LIKE', '%' . $this->searchPrint . '%');  
                })
                ->orWhereHas('user', function ($q)  {
                    $q->wherehas('club',function($q) {
                        $q->where('club_name', 'LIKE', '%' . $this->searchPrint . '%');
                    });
                })
                ->orwhere('payment_method', 'LIKE', '%' . $this->searchPrint . '%')
                ->orwhere('trans_id', 'LIKE', '%' . $this->searchPrint . '%');      
            })->groupBy('trans_id')->orderBy(DB::raw('sum(totalfee)'),$this->sorttypepay)->get();
        
        }elseif($this->sortBypay=='league.name'){
            $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                ->where(function($query) {
                    return $query
                    ->orWhereHas('league', function ($q)  {
                        $q->where('name', 'LIKE', '%' . $this->searchPrint . '%');  
                    })
                    ->orWhereHas('user', function ($q)  {
                        $q->wherehas('club',function($q) {
                            $q->where('club_name', 'LIKE', '%' . $this->searchPrint . '%');
                        });
                    })
                    ->orwhere('payment_method', 'LIKE', '%' . $this->searchPrint . '%')
                    ->orwhere('trans_id', 'LIKE', '%' . $this->searchPrint . '%');        
                })->groupBy('trans_id')->orderBy(League::select('name')->whereColumn('leagues.id','registrations.league_id'),$this->sorttypepay)->get();
        }

    }else{
        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
        ->where(function($query) {
            return $query
            ->orWhereHas('league', function ($q)  {
                $q->where('name', 'LIKE', '%' . $this->searchPrint . '%');  
            })
            ->orWhereHas('user', function ($q)  {
                $q->wherehas('club',function($q) {
                    $q->where('club_name', 'LIKE', '%' . $this->searchPrint . '%');
                });
            })
            ->orwhere('payment_method', 'LIKE', '%' . $this->searchPrint . '%')
            ->orwhere('trans_id', 'LIKE', '%' . $this->searchPrint . '%');
        })->groupBy('trans_id')->get();
    }  
}else{
    if($this->sortBypay){
        if($this->sortBypay=='name_i'){
            if($this->sorttypepay=='asc'){
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->get();
                $regs=$regs->sortBy(function($query){
                    return $query->user->club->club_name;
                 })->all();
            }else{
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->get();
                $regs=$regs->sortByDesc(function($query){
                    return $query->user->club->club_name;
                 })->all();
            }
        }elseif($this->sortBypay=='payment_method'){
            if($this->sorttypepay=='asc'){
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,1,3,4,2)')->get();
            }else{
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,2,4,3,1)')->get();
            } 
        }elseif($this->sortBypay=='league.name'){
            $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderBy(League::select('name')->whereColumn('leagues.id','registrations.league_id'),$this->sorttypepay)->get();
        }elseif($this->sortBypay=='total_i'){
            $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
            ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderBy(DB::raw('sum(totalfee)'),$this->sorttypepay)->get();
        }elseif($this->sortBypay=='trans_id'){
            $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
            ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderBy($this->sortBypay,$this->sorttypepay)->get();
        }
    }else{
        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->get();
    }                 
    }
    
  
    

        return view('paymentRequests.Pay_req_single_export', [
             'regs' => $regs,
            'id' => $this->id
        ]);
        
     
    }     


 public function headings(): array
        {
            return [
                'Player Name',
                'Email',
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
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(35);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(14);
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