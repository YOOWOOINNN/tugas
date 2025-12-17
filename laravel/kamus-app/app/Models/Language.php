<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
    ];

    // Relasi: 1 bahasa banyak kata
    public function dictionaryWords()
    {
        return $this->hasMany(DictionaryWord::class, 'language_code', 'code');
    }
}
