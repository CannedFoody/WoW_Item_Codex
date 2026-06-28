<?php

namespace App\Http\Controllers;
use App\Models\Spell ;
use Illuminate\Http\JsonResponse ;
use Illuminate\Http\Request;

class DataController extends Controller
{

public function get_top_spells(): JsonResponse {
    $spells = Spell::where('display', true )
    -> inRandomOrder ()
    -> take(3)
    -> get();
    return response ()->json($spells);
}

public function get_spell(Spell $spell): JsonResponse {
    $selected_spell = Spell::where ([
        'id' => $spell->id ,
        'display' => true ,
    ])
    -> firstOrFail();
    return response()->json($selected_spell);
}
public function get_related_spells(Spell $spell): JsonResponse {
    $spells = Spell::where('display', true)
    -> where('id', '<>', $spell->id)
    -> inRandomOrder()
    -> take(3)
    -> get();
    return response()->json($spells);
}
}

