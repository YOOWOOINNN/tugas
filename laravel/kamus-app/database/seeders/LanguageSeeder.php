<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        Language::insert([
            ['name' => 'Indonesian', 'code' => 'id', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'English', 'code' => 'en', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dutch', 'code' => 'nl', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Japanese', 'code' => 'ja', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sunda', 'code' => 'su', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
