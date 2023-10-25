<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('criterias')->insert([
            'kode' => 'c1',
            'nama' => 'Pelaksanaan Pembelajaran',
            'jenis' => 'Benefit',
            'bobot' => 0.1,
        ]);

        DB::table('criterias')->insert([
            'kode' => 'c2',
            'nama' => 'Interaksi Belajar Mengajar',
            'jenis' => 'Benefit',
            'bobot' => 0.15,
        ]);

        DB::table('criterias')->insert([
            'kode' => 'c3',
            'nama' => 'Tugas Rutin',
            'jenis' => 'Benefit',
            'bobot' => 0.05,
        ]);

        DB::table('criterias')->insert([
            'kode' => 'c4',
            'nama' => 'Kedisiplinan',
            'jenis' => 'Benefit',
            'bobot' => 0.1,
        ]);

        DB::table('criterias')->insert([
            'kode' => 'c5',
            'nama' => 'Penggunaan IT',
            'jenis' => 'Cost',
            'bobot' => 0.1,
        ]);

        DB::table('criterias')->insert([
            'kode' => 'c6',
            'nama' => 'Kepuasan Siswa',
            'jenis' => 'Cost',
            'bobot' => 0.1,
        ]);

        DB::table('criterias')->insert([
            'kode' => 'c7',
            'nama' => 'Kreativitas',
            'jenis' => 'Benefit',
            'bobot' => 0.1,
        ]);

        DB::table('criterias')->insert([
            'kode' => 'c8',
            'nama' => 'Produktivitas',
            'jenis' => 'Benefit',
            'bobot' => 0.05,
        ]);

        DB::table('criterias')->insert([
            'kode' => 'c9',
            'nama' => 'Interaksi Sosial',
            'jenis' => 'Cost',
            'bobot' => 0.05,
        ]);

        DB::table('criterias')->insert([
            'kode' => 'c10',
            'nama' => 'Tanggung Jawab',
            'jenis' => 'Benefit',
            'bobot' => 0.25,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A1',
            'c1' => 78,
            'c2' => 90,
            'c3' => 76,
            'c4' => 75,
            'c5' => 71,
            'c6' => 55,
            'c7' => 76,
            'c8' => 34,
            'c9' => 78,
            'c10' => 76,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A2',
            'c1' => 76,
            'c2' => 98,
            'c3' => 45,
            'c4' => 34,
            'c5' => 68,
            'c6' => 30,
            'c7' => 56,
            'c8' => 78,
            'c9' => 98,
            'c10' => 78,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A3',
            'c1' => 45,
            'c2' => 87,
            'c3' => 34,
            'c4' => 45,
            'c5' => 66,
            'c6' => 46,
            'c7' => 45,
            'c8' => 54,
            'c9' => 76,
            'c10' => 45,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A4',
            'c1' => 35,
            'c2' => 86,
            'c3' => 37,
            'c4' => 78,
            'c5' => 63,
            'c6' => 78,
            'c7' => 87,
            'c8' => 34,
            'c9' => 56,
            'c10' => 67,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A5',
            'c1' => 78,
            'c2' => 56,
            'c3' => 90,
            'c4' => 97,
            'c5' => 94,
            'c6' => 52,
            'c7' => 68,
            'c8' => 56,
            'c9' => 47,
            'c10' => 56,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A6',
            'c1' => 98,
            'c2' => 78,
            'c3' => 97,
            'c4' => 54,
            'c5' => 71,
            'c6' => 78,
            'c7' => 90,
            'c8' => 78,
            'c9' => 98,
            'c10' => 78,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A7',
            'c1' => 58,
            'c2' => 45,
            'c3' => 45,
            'c4' => 36,
            'c5' => 72,
            'c6' => 90,
            'c7' => 87,
            'c8' => 90,
            'c9' => 86,
            'c10' => 43,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A8',
            'c1' => 68,
            'c2' => 37,
            'c3' => 67,
            'c4' => 76,
            'c5' => 69,
            'c6' => 76,
            'c7' => 56,
            'c8' => 98,
            'c9' => 58,
            'c10' => 67,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A9',
            'c1' => 98,
            'c2' => 86,
            'c3' => 58,
            'c4' => 54,
            'c5' => 64,
            'c6' => 45,
            'c7' => 78,
            'c8' => 86,
            'c9' => 76,
            'c10' => 54,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A10',
            'c1' => 87,
            'c2' => 76,
            'c3' => 65,
            'c4' => 86,
            'c5' => 63,
            'c6' => 34,
            'c7' => 45,
            'c8' => 85,
            'c9' => 90,
            'c10' => 57,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A11',
            'c1' => 67,
            'c2' => 89,
            'c3' => 87,
            'c4' => 90,
            'c5' => 60,
            'c6' => 78,
            'c7' => 63,
            'c8' => 84,
            'c9' => 87,
            'c10' => 54,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A12',
            'c1' => 86,
            'c2' => 47,
            'c3' => 47,
            'c4' => 43,
            'c5' => 55,
            'c6' => 98,
            'c7' => 47,
            'c8' => 98,
            'c9' => 45,
            'c10' => 78,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A13',
            'c1' => 45,
            'c2' => 56,
            'c3' => 87,
            'c4' => 40,
            'c5' => 60,
            'c6' => 76,
            'c7' => 97,
            'c8' => 85,
            'c9' => 76,
            'c10' => 90,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A14',
            'c1' => 90,
            'c2' => 78,
            'c3' => 75,
            'c4' => 67,
            'c5' => 97,
            'c6' => 30,
            'c7' => 65,
            'c8' => 87,
            'c9' => 98,
            'c10' => 87,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A15',
            'c1' => 87,
            'c2' => 98,
            'c3' => 71,
            'c4' => 65,
            'c5' => 95,
            'c6' => 34,
            'c7' => 43,
            'c8' => 45,
            'c9' => 76,
            'c10' => 65,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A16',
            'c1' => 89,
            'c2' => 76,
            'c3' => 72,
            'c4' => 86,
            'c5' => 98,
            'c6' => 76,
            'c7' => 46,
            'c8' => 67,
            'c9' => 90,
            'c10' => 79,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A17',
            'c1' => 86,
            'c2' => 45,
            'c3' => 83,
            'c4' => 56,
            'c5' => 80,
            'c6' => 97,
            'c7' => 76,
            'c8' => 87,
            'c9' => 45,
            'c10' => 54,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A18',
            'c1' => 67,
            'c2' => 67,
            'c3' => 72,
            'c4' => 78,
            'c5' => 78,
            'c6' => 65,
            'c7' => 95,
            'c8' => 86,
            'c9' => 67,
            'c10' => 34,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A19',
            'c1' => 45,
            'c2' => 78,
            'c3' => 91,
            'c4' => 54,
            'c5' => 70,
            'c6' => 56,
            'c7' => 65,
            'c8' => 74,
            'c9' => 46,
            'c10' => 56,
        ]);

        DB::table('alternatives')->insert([
            'nama' => 'A20',
            'c1' => 56,
            'c2' => 97,
            'c3' => 56,
            'c4' => 57,
            'c5' => 96,
            'c6' => 79,
            'c7' => 57,
            'c8' => 52,
            'c9' => 86,
            'c10' => 33,
        ]);
    }
}
