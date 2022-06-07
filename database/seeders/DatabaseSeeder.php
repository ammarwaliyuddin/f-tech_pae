<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Kota;
use \App\Models\Kecamatan;
// use \App\Models\Destinasi;
use \App\Models\Barang;
use \App\Models\Service;
use \App\Models\Packing;
use \App\Models\Asuransi;
// use \App\Models\Disposisi;
use \App\Models\Status;
use \App\Models\Level;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        // Data Kota Seeder
        Kota::create([
            'nama_kota' => 'Atambua',
            'kode_kota' => 'ABU',
            'keterangan' => 'Base Untuk Kota Atambua'
        ]);
        Kota::create([
            'nama_kota' => 'Kupang',
            'kode_kota' => 'KOE',
            'keterangan' => 'Base Untuk Kota Kupang'
        ]);
        Kota::create([
            'nama_kota' => 'Maumere',
            'kode_kota' => 'MOF',
            'keterangan' => 'Base Untuk Kota Maumere'
        ]);
        Kota::create([
            'nama_kota' => 'Bajawa',
            'kode_kota' => 'BJW',
            'keterangan' => 'Base Untuk Kota Bajawa'
        ]);
        Kota::create([
            'nama_kota' => 'Waikabubak',
            'kode_kota' => 'WKB',
            'keterangan' => 'Base Untuk Kota Waikabubak'
        ]);
        
        // // Data Kecamatan Seeder
        Kecamatan::create([
            'id_kota' => '1',
            'nama_kecamatan' => 'Atambua Selatan',
            'keterangan' => 'Kecamatan di Atambua'
        ]);
        Kecamatan::create([
            'id_kota' => '2',
            'nama_kecamatan' => 'Alak',
            'keterangan' => 'Kecamatan di Kota Kupang'
        ]);
        Kecamatan::create([
            'id_kota' => '2',
            'nama_kecamatan' => 'Kelapa Lima',
            'keterangan' => 'Kecamatan di Kota Kupang'
        ]);
        Kecamatan::create([
            'id_kota' => '3',
            'nama_kecamatan' => 'Magepanda',
            'keterangan' => 'Kecamatan di Maumere'
        ]);
        Kecamatan::create([
            'id_kota' => '4',
            'nama_kecamatan' => 'Golewa',
            'keterangan' => 'Kecamatan di Bajawa'
        ]);
        Kecamatan::create([
            'id_kota' => '5',
            'nama_kecamatan' => 'Kota Waikabubak',
            'keterangan' => 'Kecamatan di Waikabubak'
        ]);
        
        // // Data Destinasi Seeder
        // Destinasi::create([
        //     'id_kota_origin' => '',
        //     'id_kota_destinasi' => '',
        //     'id_kecamatan' => '',
        //     'id_service' => '',
        //     'kode_destinasi' => '',
        //     'harga' => ''
        
        // ]);
        
        // Data Barang Seeder
        Barang::create([
            'jenis_barang' => 'Dokumen',
            'harga' => '10000',
            'keterangan' => 'Buku Skripsi'
        ]);
        Barang::create([
            'jenis_barang' => 'Non Dokumen',
            'harga' => '25000',
            'keterangan' => 'Speaker Aktif Polytron'
        ]);

        // Data Service Seeder
        Service::create([
            'nama_service' => 'Reguler',
            'keterangan' => 'Pengiriman Reguler'
        ]);
        Service::create([
            'nama_service' => 'IntraCity',
            'keterangan' => 'Pengiriman IntraCity'
        ]);
        Service::create([
            'nama_service' => 'Trucking',
            'keterangan' => 'Pengiriman Trucking'
        ]);
        
        // Data Packing Seeder
        Packing::create([
            'nama_packing' => 'Packing Kayu',
            'pengali' => '1',
            'keterangan' => 'Packing Kayu'
        ]);
        Packing::create([
            'nama_packing' => 'Bubble Wrap',
            'pengali' => '1',
            'keterangan' => 'Packing Bubble Wrap'
        ]);
        
        // Data Asuransi Seeder
        Asuransi::create([
            'nama_asuransi' => 'Asuransi Barang',
            'harga' => '0,5',
            'keterangan' => 'Asuransi Barang'
        ]);
        
        // Data Disposisi Seeder
        // Disposisi::create([
        //     'nama_disposisi' => 'Kantor Pengirim',
        //     'keterangan' => 'Kantor Pengirim'
        // ]);
        // Disposisi::create([
        //     'nama_disposisi' => 'Gudang Pengirim',
        //     'keterangan' => 'Gudang Pengirim'
        // ]);
        // Disposisi::create([
        //     'nama_disposisi' => 'Kendaraan Pengirim',
        //     'keterangan' => 'Kendaraan Pengirim'
        // ]);
        // Disposisi::create([
        //     'nama_disposisi' => 'Kendaraan Destinasi',
        //     'keterangan' => 'Kendaraan Destinasi'
        // ]);
        // Disposisi::create([
        //     'nama_disposisi' => 'Gudang Destinasi',
        //     'keterangan' => 'Gudang Destinasi'
        // ]);
        
        // Data Status Pengiriman Seeder
        Status::create([
            'kode_status' => 'U01',
            'nama_status' => 'Undelivery',
            'keterangan' => 'Alamat Tidak Lengkap/Tidak Dikenal'
        ]);
        Status::create([
            'kode_status' => 'U03',
            'nama_status' => 'Undelivery',
            'keterangan' => 'Penerima Pindah Alamat'
        ]);
        Status::create([
            'kode_status' => 'U05',
            'nama_status' => 'Undelivery',
            'keterangan' => 'Rumah Tutup'
        ]);
        Status::create([
            'kode_status' => 'D02',
            'nama_status' => 'Delivery',
            'keterangan' => 'Receptionist'
        ]);
        Status::create([
            'kode_status' => 'D04',
            'nama_status' => 'Delivery',
            'keterangan' => 'Security'
        ]);
        
        // Data Level Seeder
        Level::create([
            'nama_level' => 'Kepala',
            'keterangan' => 'Kepala'
        ]);
        Level::create([
            'nama_level' => 'Admin',
            'keterangan' => 'Admin'
        ]);
        Level::create([
            'nama_level' => 'Kurir',
            'keterangan' => 'Kurir'
        ]);
        Level::create([
            'nama_level' => 'Anggota Koperasi',
            'keterangan' => 'Anggota Koperasi'
        ]);
        Level::create([
            'nama_level' => 'Mitra',
            'keterangan' => 'Mitra'
        ]);
        
        // Data User Seeder
        User::create([
            'nama_user' => 'Anton',
            'email' => 'Antonesia@example.com',
            'password' => 'Antonesia',
            'id_level' => '2',
            'alamat' => 'Jl. Nangka',
            'hp' => '0819838973884',
            'id_kota' => '2',
            'id_kecamatan' => '2'
        ]);
        User::create([
            'nama_user' => 'Brazer',
            'email' => 'Brazerboss@example.com',
            'password' => 'Brazerboss',
            'id_level' => '1',
            'alamat' => 'Jl. Bumi III',
            'hp' => '086376529213',
            'id_kota' => '1',
            'id_kecamatan' => '1'
        ]);
        
    }
}
