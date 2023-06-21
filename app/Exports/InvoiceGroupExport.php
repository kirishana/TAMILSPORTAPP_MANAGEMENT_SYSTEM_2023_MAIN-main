<?php

namespace App\Exports;

use App\User;
use App\Models\GroupRegistration;
use App\Models\MainEvent;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Spatie\Permission\Models\Role;

class InvoiceGroupExport implements FromView, WithHeadings,WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $club;
    protected $league;
    protected $id;

    public function __construct($club,$league,$id)
    {

        $this->club = $club;
        $this->league = $league;
        $this->id = $id;
    }

    public function view(): View
    {

        $iso = Auth::user()->country->currency->currency_iso_code;
        $GroupRegistrations=GroupRegistration::where('league_id',$this->league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$this->id)->wherehas('teams',function($q){
            $q->wherehas('club',function($q){
                        $q->where('id',$this->club);
            });
                    })->get();
           $grandtotal=GroupRegistration::where('league_id',$this->league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$this->id)->where('status','!=',3)->wherehas('club',function($q) {
            $q->where('id',$this->club);
        })->sum('totalfee');
        $paid1=GroupRegistration::where('league_id',$this->league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$this->id)->whereIn('status',[1,2])->wherehas('club',function($q) {
            $q->where('id',$this->club);
        })->sum('totalfee');
        $payableG=GroupRegistration::where('league_id',$this->league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$this->id)->whereNotIn('status',[1,2,3])->wherehas('club',function($q) {
            $q->where('id',$this->club);
        })->sum('totalfee');
        return view('admin.reports.brief_invoice_Group_Excel', [
            'GroupRegistrations' => $GroupRegistrations,
            'grandtotal' => $grandtotal,
            'payableG' => $payableG,
            'paid1' => $paid1,
            'iso' => $iso,
            'club' => $this->club,
            'league' => $this->league,
        ]);
    }

    public function headings(): array
    {
        return [
            'User Name',
            'Email',
            'DOB',
            'Role',
           
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(32);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(22);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(12);
         
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

