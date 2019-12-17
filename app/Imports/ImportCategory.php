<?php

namespace App\Imports;

use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportCategories implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Category([
            'name' => $row['name'],
            'email' => $row['email'],
        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }
}
