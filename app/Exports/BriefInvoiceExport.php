<?php

namespace App\Exports;

use App\User;
use App\Models\Registration;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Spatie\Permission\Models\Role;

class BriefInvoiceExport implements FromView, WithHeadings,WithEvents
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
       $registrations=Registration::where('league_id',$this->league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$this->id)->where('is_approved',1)->wherehas('user',function($q){
        $q->where('club_id',$this->club);
       })->get();
        return view('admin.reports.brief_invoiceExcel', [
            'registrations' => $registrations,
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
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(35);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(12);
         
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

