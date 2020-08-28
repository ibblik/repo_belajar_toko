<?php

namespace App\Http\Controllers;
use App\order;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'id_barang' => 'required',
                'id_costumer' => 'required',
                'tanggal_pesan' => 'required'

            ]
        );

        if($validator->fails()){
            return Response()->json($validator->error());
        }

        $simpan = order::create([
            'id_barang' => $request->id_barang,
            'id_costumer' => $request->id_costumer,
            'tanggal_pesan'=> $request->tanggal_pesan
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
