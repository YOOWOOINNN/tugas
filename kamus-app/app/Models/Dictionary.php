<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_language',
        'target_language',
        'word',
        'translation',
        'pronunciation',
    ];

    public function sourceLang()
    {
        return $this->belongsTo(Language::class, 'source_language', 'code');
    }

    public function targetLang()
    {
        return $this->belongsTo(Language::class, 'target_language', 'code');
    }
}
