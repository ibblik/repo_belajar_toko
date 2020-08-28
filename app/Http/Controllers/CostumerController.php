<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\costumer;
use Illuminate\Support\Facades\Validator;

class CostumerController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_costumer' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required'

            ]
        );

        if($validator->fails()){
            return Response()->json($validator->error());
        }

        $simpan = costumer::create([
            'nama_costumer' => $request->nama_costumer,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        if($simpan)
        {
            return Response()->json(['status' => 1]);
        }
        else
        {
            return Response()->json(['status' => 0]);
        }
    }
}
