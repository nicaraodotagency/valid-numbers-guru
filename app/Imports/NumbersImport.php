<?php

namespace App\Imports;

use App\Models\Number;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class NumbersImport extends DefaultValueBinder implements ToModel, WithHeadingRow, WithCustomValueBinder
{
    protected $number_list_id = null;

    public function __construct(  $number_list_id) {
        $this->number_list_id = $number_list_id;
    }

    public function bindValue(Cell $cell, $value)
    {
        $cell->setValueExplicit($value, DataType::TYPE_STRING);
        return true;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Number([
            "number_list_id" => $this->number_list_id,
            "number" => (string) $row["number"],
        ]);
    }
}
