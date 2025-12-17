<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DictionarySeeder extends Seeder
{
    public function run()
    {
        DB::table('dictionaries')->insert([
            // INDONESIA → ENGLISH
            [
                'source_language' => 'id',
                'target_language' => 'en',
                'word' => 'aku',
                'translation' => 'I / me',
                'pronunciation' => 'a-ku',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'source_language' => 'id',
                'target_language' => 'en',
                'word' => 'makan',
                'translation' => 'eat',
                'pronunciation' => 'ma-kan',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // INDONESIA → DUTCH
            [
                'source_language' => 'id',
                'target_language' => 'nl',
                'word' => 'aku',
                'translation' => 'ik',
                'pronunciation' => 'ik',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // INDONESIA → SUNDA
            [
                'source_language' => 'id',
                'target_language' => 'su',
                'word' => 'aku',
                'translation' => 'abdi / aing* (tergantung formalitas)',
                'pronunciation' => 'ab-di',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ENGLISH → INDONESIA
            [
                'source_language' => 'en',
                'target_language' => 'id',
                'word' => 'car',
                'translation' => 'mobil',
                'pronunciation' => 'kar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
