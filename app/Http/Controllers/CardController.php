<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function createCard(Request $request)
    {
        return Card::create([
            "user_id" => $request->user_id,
            "membership" => $request->membership,
        ]);
    }

    public function showCard($id)
    {
        return Card::findOrFail($id);
    }
}
