<?php

namespace App\Exports;

use App\Lapor;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lapor::all();
    }
}
