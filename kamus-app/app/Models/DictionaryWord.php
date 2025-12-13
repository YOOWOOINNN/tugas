<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DictionaryWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_code',
        'word',
        'pronunciation',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_code', 'code');
    }
}
