<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DictionaryController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required',
            'source' => 'required',
            'target' => 'required'
        ]);

        $result = DB::table('dictionaries')
            ->where('source_language', $request->source)
            ->where('target_language', $request->target)
            ->where('word', 'LIKE', '%' . $request->query . '%')
            ->first();

        if (!$result) {
            return response()->json([
                'status' => false,
                'message' => 'Tidak ditemukan dalam database.'
            ]);
        }

        return response()->json([
            'status' => true,
            'word' => $result->word,
            'translation' => $result->translation,
            'pronunciation' => $result->pronunciation,
        ]);
    }
}
