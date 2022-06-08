<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Kota;
use \App\Models\Kecamatan;
use \App\Models\Destinasi;
use \App\Models\Barang;
use \App\Models\Service;
use \App\Models\Packing;
use \App\Models\Asuransi;
use \App\Models\Disposisi;
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
        
        // Data KOTA Seeder
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
        Kota::create([
            'nama_kota' => 'Ende',
            'kode_kota' => 'END',
            'keterangan' => 'Base Untuk Kota Ende'
        ]);
        Kota::create([
            'nama_kota' => 'Labuan Bajo',
            'kode_kota' => 'LBJ',
            'keterangan' => 'Base Untuk Kota Labuan Bajo'
        ]);
        Kota::create([
            'nama_kota' => 'Tambolaka',
            'kode_kota' => 'TBL',
            'keterangan' => 'Base Untuk Kota Tambolaka'
        ]);
        Kota::create([
            'nama_kota' => 'Kalabahi',
            'kode_kota' => 'ALR',
            'keterangan' => 'Base Untuk Kota Kalabahi'
        ]);
        Kota::create([
            'nama_kota' => 'Larantuka',
            'kode_kota' => 'LTK',
            'keterangan' => 'Base Untuk Kota Larantuka'
        ]);
        
        // // Data Kecamatan Seeder
        Kecamatan::create([
            'id_kota' => '1',
            'nama_kecamatan' => 'Atambua Selatan',
            'keterangan' => 'Kecamatan di Atambua'
        ]);
        Kecamatan::create([
            'id_kota' => '1',
            'nama_kecamatan' => 'Atambua Barat',
            'keterangan' => 'Kecamatan di Atambua'
        ]);
        Kecamatan::create([
            'id_kota' => '1',
            'nama_kecamatan' => 'Kakuluk',
            'keterangan' => 'Kecamatan di Atambua'
        ]);
        Kecamatan::create([
            'id_kota' => '1',
            'nama_kecamatan' => 'Laelmanen',
            'keterangan' => 'Kecamatan di Atambua'
        ]);
        Kecamatan::create([
            'id_kota' => '1',
            'nama_kecamatan' => 'Lasiolat',
            'keterangan' => 'Kecamatan di Atambua'
        ]);
        ///////
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
            'id_kota' => '2',
            'nama_kecamatan' => 'Alak',
            'keterangan' => 'Kecamatan di Kota Kupang'
        ]);
        Kecamatan::create([
            'id_kota' => '2',
            'nama_kecamatan' => 'Oebobo',
            'keterangan' => 'Kecamatan di Kota Kupang'
        ]);
        Kecamatan::create([
            'id_kota' => '2',
            'nama_kecamatan' => 'Kota Lama',
            'keterangan' => 'Kecamatan di Kota Kupang'
        ]);
        Kecamatan::create([
            'id_kota' => '2',
            'nama_kecamatan' => 'Naikoten',
            'keterangan' => 'Kecamatan di Kota Kupang'
        ]);
        ///////
        Kecamatan::create([
            'id_kota' => '3',
            'nama_kecamatan' => 'Magepanda',
            'keterangan' => 'Kecamatan di Maumere'
        ]);
        Kecamatan::create([
            'id_kota' => '3',
            'nama_kecamatan' => 'Paga',
            'keterangan' => 'Kecamatan di Maumere'
        ]);
        Kecamatan::create([
            'id_kota' => '3',
            'nama_kecamatan' => 'Nita',
            'keterangan' => 'Kecamatan di Maumere'
        ]);
        Kecamatan::create([
            'id_kota' => '3',
            'nama_kecamatan' => 'Lela',
            'keterangan' => 'Kecamatan di Maumere'
        ]);
        Kecamatan::create([
            'id_kota' => '3',
            'nama_kecamatan' => 'Kewapante',
            'keterangan' => 'Kecamatan di Maumere'
        ]);
        ///////
        Kecamatan::create([
            'id_kota' => '4',
            'nama_kecamatan' => 'Golewa',
            'keterangan' => 'Kecamatan di Bajawa'
        ]);
        Kecamatan::create([
            'id_kota' => '4',
            'nama_kecamatan' => 'Bajawa',
            'keterangan' => 'Kecamatan di Bajawa'
        ]);
        Kecamatan::create([
            'id_kota' => '4',
            'nama_kecamatan' => 'Bajawa Utara',
            'keterangan' => 'Kecamatan di Bajawa'
        ]);
        Kecamatan::create([
            'id_kota' => '4',
            'nama_kecamatan' => 'Aimere',
            'keterangan' => 'Kecamatan di Bajawa'
        ]);
        Kecamatan::create([
            'id_kota' => '4',
            'nama_kecamatan' => 'Inerie',
            'keterangan' => 'Kecamatan di Bajawa'
        ]);
        ///////
        Kecamatan::create([
            'id_kota' => '5',
            'nama_kecamatan' => 'Kota Waikabubak',
            'keterangan' => 'Kecamatan di Waikabubak'
        ]);
        Kecamatan::create([
            'id_kota' => '5',
            'nama_kecamatan' => 'Kota Kota Waikabubak',
            'keterangan' => 'Kecamatan di Waikabubak'
        ]);
        Kecamatan::create([
            'id_kota' => '5',
            'nama_kecamatan' => 'Lamboya',
            'keterangan' => 'Kecamatan di Waikabubak'
        ]);
        Kecamatan::create([
            'id_kota' => '5',
            'nama_kecamatan' => 'Loli',
            'keterangan' => 'Kecamatan di Waikabubak'
        ]);
        Kecamatan::create([
            'id_kota' => '5',
            'nama_kecamatan' => 'Wanokaka',
            'keterangan' => 'Kecamatan di Waikabubak'
        ]);
        Kecamatan::create([
            'id_kota' => '5',
            'nama_kecamatan' => 'Wewaria',
            'keterangan' => 'Kecamatan di Ende'
        ]);
        ///////
        Kecamatan::create([
            'id_kota' => '6',
            'nama_kecamatan' => 'Wolojita',
            'keterangan' => 'Kecamatan di Ende'
        ]);
        Kecamatan::create([
            'id_kota' => '6',
            'nama_kecamatan' => 'Ende',
            'keterangan' => 'Kecamatan di Ende'
        ]);
        Kecamatan::create([
            'id_kota' => '6',
            'nama_kecamatan' => 'Ende Selatan',
            'keterangan' => 'Kecamatan di Ende'
        ]);
        Kecamatan::create([
            'id_kota' => '6',
            'nama_kecamatan' => 'Ende Timur',
            'keterangan' => 'Kecamatan di Ende'
        ]);
        Kecamatan::create([
            'id_kota' => '6',
            'nama_kecamatan' => 'Ende Timur',
            'keterangan' => 'Kecamatan di Ende'
        ]);
        ///////
        Kecamatan::create([
            'id_kota' => '7',
            'nama_kecamatan' => 'Boleng',
            'keterangan' => 'Kecamatan di Labuan Bajo'
        ]);
        Kecamatan::create([
            'id_kota' => '7',
            'nama_kecamatan' => 'Komodo',
            'keterangan' => 'Kecamatan di Labuan Bajo'
        ]);
        Kecamatan::create([
            'id_kota' => '7',
            'nama_kecamatan' => 'Kuwus',
            'keterangan' => 'Kecamatan di Labuan Bajo'
        ]);
        Kecamatan::create([
            'id_kota' => '7',
            'nama_kecamatan' => 'Lembor',
            'keterangan' => 'Kecamatan di Labuan Bajo'
        ]);
        Kecamatan::create([
            'id_kota' => '7',
            'nama_kecamatan' => 'Macang Pacar',
            'keterangan' => 'Kecamatan di Labuan Bajo'
        ]);
        ///////
        Kecamatan::create([
            'id_kota' => '8',
            'nama_kecamatan' => 'Kodi',
            'keterangan' => 'Kecamatan di Tambolaka'
        ]);
        Kecamatan::create([
            'id_kota' => '8',
            'nama_kecamatan' => 'Kota Tambolaka',
            'keterangan' => 'Kecamatan di Tambolaka'
        ]);
        Kecamatan::create([
            'id_kota' => '8',
            'nama_kecamatan' => 'Loura',
            'keterangan' => 'Kecamatan di Tambolaka'
        ]);
        Kecamatan::create([
            'id_kota' => '8',
            'nama_kecamatan' => 'Wewewa Barat',
            'keterangan' => 'Kecamatan di Tambolaka'
        ]);
        Kecamatan::create([
            'id_kota' => '8',
            'nama_kecamatan' => 'Wewewa Timur',
            'keterangan' => 'Kecamatan di Tambolaka'
        ]);
        //////
        Kecamatan::create([
            'id_kota' => '9',
            'nama_kecamatan' => 'Lembur',
            'keterangan' => 'Kecamatan di Kalabahi'
        ]);
        Kecamatan::create([
            'id_kota' => '9',
            'nama_kecamatan' => 'Alor Barat Daya',
            'keterangan' => 'Kecamatan di Kalabahi'
        ]);
        Kecamatan::create([
            'id_kota' => '9',
            'nama_kecamatan' => 'Kabola',
            'keterangan' => 'Kecamatan di Kalabahi'
        ]);
        Kecamatan::create([
            'id_kota' => '9',
            'nama_kecamatan' => 'Mataru',
            'keterangan' => 'Kecamatan di Kalabahi'
        ]);
        Kecamatan::create([
            'id_kota' => '9',
            'nama_kecamatan' => 'Pantar',
            'keterangan' => 'Kecamatan di Kalabahi'
        ]);
        //////
        Kecamatan::create([
            'id_kota' => '10',
            'nama_kecamatan' => 'Adonara',
            'keterangan' => 'Kecamatan di Larantuka'
        ]);
        Kecamatan::create([
            'id_kota' => '10',
            'nama_kecamatan' => 'Demon Pagong',
            'keterangan' => 'Kecamatan di Larantuka'
        ]);
        Kecamatan::create([
            'id_kota' => '10',
            'nama_kecamatan' => 'Ile Boleng',
            'keterangan' => 'Kecamatan di Larantuka'
        ]);
        Kecamatan::create([
            'id_kota' => '10',
            'nama_kecamatan' => 'Ile Bura',
            'keterangan' => 'Kecamatan di Larantuka'
        ]);
        Kecamatan::create([
            'id_kota' => '10',
            'nama_kecamatan' => 'Kelu Bagolit',
            'keterangan' => 'Kecamatan di Larantuka'
        ]);
        
        // Data Destinasi Seeder
        Destinasi::create([
            'id_kota_origin' => 1,
            'id_kota_destinasi' => 2,
            'id_kecamatan' => 2,
            'id_service' => 1,
            'kode_destinasi' => 'ABU - KOE - ALK',
            'harga' => '9000'
        
<<<<<<< HEAD
        // ]);

=======
        ]);
        // Data Destinasi Seeder
        Destinasi::create([
            'id_kota_origin' => 1,
            'id_kota_destinasi' => 3,
            'id_kecamatan' => 3,
            'id_service' => 1,
            'kode_destinasi' => 'ABU - MOF - ALK',
            'harga' => '5000'
        
        ]);
>>>>>>> b92c6b5c1ee24df3aa65be90cce575f007c00bc7
        
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
        Disposisi::create([
            'nama_disposisi' => 'Kantor Pengirim',
            'keterangan' => 'Kantor Pengirim'
        ]);
        Disposisi::create([
            'nama_disposisi' => 'Gudang Pengirim',
            'keterangan' => 'Gudang Pengirim'
        ]);
        Disposisi::create([
            'nama_disposisi' => 'Kendaraan Pengirim',
            'keterangan' => 'Kendaraan Pengirim'
        ]);
        Disposisi::create([
            'nama_disposisi' => 'Kendaraan Destinasi',
            'keterangan' => 'Kendaraan Destinasi'
        ]);
        Disposisi::create([
            'nama_disposisi' => 'Gudang Destinasi',
            'keterangan' => 'Gudang Destinasi'
        ]);
        
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
        Status::create([
            'kode_status' => 'U21',
            'nama_status' => 'Undelivery',
            'keterangan' => 'Penerima Menolak Bayar Kiriman COD'
        ]);
        Status::create([
            'kode_status' => 'D01',
            'nama_status' => 'Delivery',
            'keterangan' => 'Yang Bersangkutan'
        ]);
        Status::create([
            'kode_status' => 'U09',
            'nama_status' => 'Undelivery',
            'keterangan' => 'Hari Libur'
        ]);
        Status::create([
            'kode_status' => 'D12',
            'nama_status' => 'Delivery',
            'keterangan' => 'Office Boy'
        ]);
        Status::create([
            'kode_status' => 'D06',
            'nama_status' => 'Delivery',
            'keterangan' => 'Suami'
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
            'nama_level' => 'Admin2',
            'keterangan' => 'Admin2'
        ]);
        Level::create([
            'nama_level' => 'Admin3',
            'keterangan' => 'Admin3'
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
        User::create([
            'nama_user' => 'Bimasakti',
            'email' => 'Bimasakti@example.com',
            'password' => 'Bimsak',
            'id_level' => '3',
            'alamat' => 'Jl. Pluto No.09',
            'hp' => '09873873478',
            'id_kota' => '4',
            'id_kecamatan' => '2'
        ]);
        User::create([
            'nama_user' => 'Desta',
            'email' => 'desta01@example.com',
            'password' => 'Destainaja',
            'id_level' => '1',
            'alamat' => 'Jl. kakatua',
            'hp' => '09383837383',
            'id_kota' => '1',
            'id_kecamatan' => '4'
        ]);
        User::create([
            'nama_user' => 'Desta',
            'email' => 'desta01@example.com',
            'password' => 'Destainaja',
            'id_level' => '1',
            'alamat' => 'Jl. kakatua',
            'hp' => '09383837383',
            'id_kota' => '1',
            'id_kecamatan' => '4'
        ]);
        User::create([
            'nama_user' => 'Andi',
            'email' => 'Andilaw@example.com',
            'password' => 'andiL',
            'id_level' => '3',
            'alamat' => 'Jl. Kenari',
            'hp' => '08585832738',
            'id_kota' => '6',
            'id_kecamatan' => '2'
        ]);
        User::create([
            'nama_user' => 'Supri',
            'email' => 'suprigan@example.com',
            'password' => 'supriyasdi',
            'id_level' => '2',
            'alamat' => 'Jl. Danger',
            'hp' => '09828736484',
            'id_kota' => '10',
            'id_kecamatan' => '3'
        ]);
        User::create([
            'nama_user' => 'Pedro',
            'email' => 'pedrosa@example.com',
            'password' => 'peendro',
            'id_level' => '1',
            'alamat' => 'Jl. Ujung Kulon',
            'hp' => '0918273834',
            'id_kota' => '7',
            'id_kecamatan' => '8'
        ]);
        User::create([
            'nama_user' => 'Sugar',
            'email' => 'dedysugar@example.com',
            'password' => 'dedgar',
            'id_level' => '1',
            'alamat' => 'Jl. Belimbing',
            'hp' => '082182736812',
            'id_kota' => '3',
            'id_kecamatan' => '7'
        ]);
        
    }
}
