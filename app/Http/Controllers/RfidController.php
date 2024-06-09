<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rfid;

class RfidController extends Controller
{
    public function store(Request $request){

        $tag = new Rfid();
        $tag->encoded_id = $request->encoded_id;
        $tag->save();

        return response()->json(['message' => 'Tag saved successfully'], 201);
    }
}