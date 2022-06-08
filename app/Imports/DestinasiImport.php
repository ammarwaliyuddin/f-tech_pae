<?php

namespace App\Imports;

use App\Models\Destinasi;
use Maatwebsite\Excel\Concerns\ToModel;

class DestinasiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Destinasi([
            'id_kota_origin' => $row[1],
            'id_kota_destinasi' => $row[2],
            'id_kecamatan' => $row[3],
            'id_service' => $row[4],
            'kode_destinasi' => $row[5],
            'harga' => $row[6],
        ]);
    }
}
