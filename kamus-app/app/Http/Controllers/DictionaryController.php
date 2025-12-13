<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Dictionary;

class DictionaryController extends Controller
{
    public function index(Request $request)
    {
        $languages = Language::all();

        $query = $request->q;
        $lang  = $request->lang;

        $result = null;

        if ($query && $lang) {
            $result = Dictionary::where('word', $query)
                ->where('language_id', $lang)
                ->first();
        }

        return view('home', compact('languages', 'result'));
    }
}
