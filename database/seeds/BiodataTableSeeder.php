<?php


use Illuminate\Database\Seeder;

class BiodataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate record
        DB::table('biodatas')->truncate();

        $biodatas = [
            ['id' => 1, 'nama' => 'Mustofa Bisri', 'nis' => '101202707', 'tanggal_lahir' => '2001-02-27', 'jk' => 'Laki-laki', 'alamat' => 'Jl.Merah kuning hijau NO 27 Pagak', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('biodatas')->insert($biodatas);
    }
}
