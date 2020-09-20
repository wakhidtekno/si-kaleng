<?php

use Illuminate\Database\Seeder;
use App\Models\Saldo;

class SaldoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Saldo::create([
            'total' => 0,
            'bulan' => 'agustus',
            'tahun' => '2020',
            'keterangan' => 'Saldo awal'
        ]);
    }
}
