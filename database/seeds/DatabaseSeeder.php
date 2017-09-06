<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipePengubahanTableSeeder::class);
    }
}

class TipePengubahanTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tipe_pengubahan_jumlah_barang')->delete();

        $date = new DateTime;
        DB::table('tipe_pengubahan_jumlah_barang')->insert([
            [
                'nama' => 'Penambahan',
                'created_at' => $date
            ],
            [
                'nama' => 'Pengurangan',
                'created_at' => $date
            ]

        ]);
    }
}