<?php

namespace App\Exports;
use App\User;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class UsersSampleExport implements FromView,WithEvents

{

    // protected $id;
    /**
    * @return \Illuminate\Support\Collection
    */

    
    protected $countries;
    protected $organizations;
    protected $clubs;


    public function __construct($countries, $organizations,$clubs,$genders,$members)
    {
        
        $this->countries = $countries;
        $this->organizations = $organizations;
        $this->clubs = $clubs;
        $this->genders = $genders;
        $this->members = $members;


    }

    public function view(): View
    {


        return view('admin.users.sampleExcel', [
             'countries' => $this->countries,
            'orgs' => $this->organizations,
            'clubs'=>$this->clubs,
            'members'=>$this->members
        ]);
        
       
    }     




    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                     //silmember
                     $row_count1 =1000 + 1;
                     $column_count1 = 3;
     
                     $drop_column1 = 'J';
                     $members=array();
                     // set dropdown options
                     foreach($this->members as $gender){
                         $members[]=$gender;
                     }
                   
     
                     // set dropdown list for first data row
                     $validation = $event->sheet->getCell("{$drop_column1}2")->getDataValidation();
                     $validation->setType(DataValidation::TYPE_LIST );
                     $validation->setErrorStyle(DataValidation::STYLE_INFORMATION );
                     $validation->setAllowBlank(false);
                     $validation->setShowInputMessage(true);
                     $validation->setShowErrorMessage(true);
                     $validation->setShowDropDown(true);
                     $validation->setErrorTitle('Input error');
                     $validation->setError('Value is not in list.');
                     $validation->setPromptTitle('Pick from list');
                     $validation->setPrompt('Please pick a value from the drop-down list.');
                     $validation->setFormula1(sprintf('"%s"',implode(',',$members)));
          
                     // clone validation to remaining rows
                     for ($i = 3; $i <= $row_count1; $i++) {
                         $event->sheet->getCell("{$drop_column1}{$i}")->setDataValidation(clone $validation);
                     }
     
                     // set columns to autosize
                     for ($i = 1; $i <= $column_count1; $i++) {
                         $column = Coordinate::stringFromColumnIndex($i);
                         $event->sheet->getColumnDimension($column)->setAutoSize(true);
                     }
     
                 //end
                //genders
                    //country
                    $row_count1 =1000 + 1;
                    $column_count1 = 3;
    
                    $drop_column1 = 'F';
                    $genders=array();
                    // set dropdown options
                    foreach($this->genders as $gender){
                        $genders[]=$gender->name;
                    }
                  
    
                    // set dropdown list for first data row
                    $validation = $event->sheet->getCell("{$drop_column1}2")->getDataValidation();
                    $validation->setType(DataValidation::TYPE_LIST );
                    $validation->setErrorStyle(DataValidation::STYLE_INFORMATION );
                    $validation->setAllowBlank(false);
                    $validation->setShowInputMessage(true);
                    $validation->setShowErrorMessage(true);
                    $validation->setShowDropDown(true);
                    $validation->setErrorTitle('Input error');
                    $validation->setError('Value is not in list.');
                    $validation->setPromptTitle('Pick from list');
                    $validation->setPrompt('Please pick a value from the drop-down list.');
                    $validation->setFormula1(sprintf('"%s"',implode(',',$genders)));
         
                    // clone validation to remaining rows
                    for ($i = 3; $i <= $row_count1; $i++) {
                        $event->sheet->getCell("{$drop_column1}{$i}")->setDataValidation(clone $validation);
                    }
    
                    // set columns to autosize
                    for ($i = 1; $i <= $column_count1; $i++) {
                        $column = Coordinate::stringFromColumnIndex($i);
                        $event->sheet->getColumnDimension($column)->setAutoSize(true);
                    }
    
                //end
                //country
                $row_count =1000 + 1;
                $column_count = 3;

                $drop_column = 'G';
                $countries=array();
                // set dropdown options
                foreach($this->countries as $country){
                    $countries[]=$country->name;
                }
              

                // set dropdown list for first data row
                $validation = $event->sheet->getCell("{$drop_column}2")->getDataValidation();
                $validation->setType(DataValidation::TYPE_LIST );
                $validation->setErrorStyle(DataValidation::STYLE_INFORMATION );
                $validation->setAllowBlank(false);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setShowDropDown(true);
                $validation->setErrorTitle('Input error');
                $validation->setError('Value is not in list.');
                $validation->setPromptTitle('Pick from list');
                $validation->setPrompt('Please pick a value from the drop-down list.');
                $validation->setFormula1(sprintf('"%s"',implode(',',$countries)));
     
                // clone validation to remaining rows
                for ($i = 3; $i <= $row_count; $i++) {
                    $event->sheet->getCell("{$drop_column}{$i}")->setDataValidation(clone $validation);
                }

                // set columns to autosize
                for ($i = 1; $i <= $column_count; $i++) {
                    $column = Coordinate::stringFromColumnIndex($i);
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }


                //genders
                $row_count2 =1000 + 1;
                $column_count2 = 3;

                $drop_column2 = 'H';
                $orgs=array();
                // set dropdown options
                foreach($this->organizations as $org){
                    $orgs[]=$org->name;
                }
                // set dropdown list for first data row
                $validation = $event->sheet->getCell("{$drop_column2}2")->getDataValidation();
                $validation->setType(DataValidation::TYPE_LIST );
                $validation->setErrorStyle(DataValidation::STYLE_INFORMATION );
                $validation->setAllowBlank(false);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setShowDropDown(true);
                $validation->setErrorTitle('Input error');
                $validation->setError('Value is not in list.');
                $validation->setPromptTitle('Pick from list');
                $validation->setPrompt('Please pick a value from the drop-down list.');
                $validation->setFormula1(sprintf('"%s"',implode(',',$orgs)));
     
                // clone validation to remaining rows
                for ($i = 3; $i <= $row_count2; $i++) {
                    $event->sheet->getCell("{$drop_column2}{$i}")->setDataValidation(clone $validation);
                }

                // set columns to autosize
                for ($i = 1; $i <= $column_count2; $i++) {
                    $column = Coordinate::stringFromColumnIndex($i);
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }
             
                //end


                
                //club
                $row_count3 =1000 + 1;
                $column_count3 = 3;

                $drop_column3 = 'I';
                $clubs=array();
                // set dropdown options
                foreach($this->clubs as $club){
                    $clubs[]=$club->club_name;
                }
                // set dropdown list for first data row
                $validation = $event->sheet->getCell("{$drop_column3}2")->getDataValidation();
                $validation->setType(DataValidation::TYPE_LIST );
                $validation->setErrorStyle(DataValidation::STYLE_INFORMATION );
                $validation->setAllowBlank(false);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setShowDropDown(true);
                $validation->setErrorTitle('Input error');
                $validation->setError('Value is not in list.');
                $validation->setPromptTitle('Pick from list');
                $validation->setPrompt('Please pick a value from the drop-down list.');
                $validation->setFormula1(sprintf('"%s"',implode(',',$clubs)));
     
                // clone validation to remaining rows
                for ($i = 3; $i <= $row_count3; $i++) {
                    $event->sheet->getCell("{$drop_column3}{$i}")->setDataValidation(clone $validation);
                }

                // set columns to autosize
                for ($i = 1; $i <= $column_count3; $i++) {
                    $column = Coordinate::stringFromColumnIndex($i);
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }
             
                //end
             
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(12);
                $event->sheet->getDelegate()->freezePane('A2');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(70);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(30);

                $event->sheet->getStyle('A1:K1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);

                $event->sheet->getStyle('A1:K1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}