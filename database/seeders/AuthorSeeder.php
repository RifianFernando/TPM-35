<?php

namespace Database\Seeders;

use App\Models\author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('authors')->insert([
            'author_name'=> 'Joshua',
            'tempat_lahir'=> 'Kalimantan Barat'
        ]);

        DB::table('authors')->insert([
            'author_name'=> 'Michelle',
            'tempat_lahir'=> 'Kalimantan Utara'
        ]);
        // author::factory()->count(3)->make();
    }
}
