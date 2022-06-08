<?php

namespace App\Exports;

use App\Models\Kota;
use Maatwebsite\Excel\Concerns\FromCollection;

class KotaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kota::all();
    }
}
