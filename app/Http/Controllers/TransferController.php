<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardToCardRequest;

class TransferController extends Controller
{
    public function cardToCard(CardToCardRequest $request)
    {
        $validated = $request->validated();

        // TODO: implement card to card transfer functionality

        return response()->json([
            'status'  => 'success|failure',
            'message' => 'card to card transfer success|failure',
            'data'    => [
                // card to card transaction result
            ]
        ]);
    }
}
