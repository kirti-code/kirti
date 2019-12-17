<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;



class ExportCategories implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    public function collection()
    {
        return $data = Category::all('category_id', 'name', 'desription', 'status');
        /* foreach ($data as $k => $values) {

            $newArray['No'] = ++$k;
            $newArray['name'] = $values['name'];
            $newArray['desription'] = $values['desription'];
            if ($values['status'] == "1") {
                $newArray['status'] = "Active";
            } else {
                $newArray['status'] = "Inactive";
            }
            $array[] = $newArray;
        }
        return $array; */
    }
    public function headings(): array
    {
        return [
            'Sr. No',
            'Name of Category',
            'Description',
            'Status',
        ];
    }

    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            BeforeExport::class => function (BeforeExport $event) {
                $event->writer->getProperties()->setTitle('Patrick');
            },
        ];
    }


    public function title(): string
    {
        return 'Some Text';
    }
}
