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
    public function show()
        {
            
            $data_order = order::join('costumer','order.id_costumer','costumer.id_costumer')
                                ->join('product','order.id_barang','product.id_barang')
                                ->select('order.id_order',
                                         'order.tanggal_pesan',
                                         'costumer.nama_costumer',
                                         'costumer.alamat',
                                         'costumer.no_hp',
                                         'product.nama_barang')
                                ->get();
            return Response()->json($data_order);
        }
        public function detail($id)
        {

            if(order::where('id_order',$id)->exists()){
                $data_order = order::join('costumer','order.id_costumer','costumer.id_costumer')
                                ->join('product','order.id_barang','product.id_barang')
                                ->where('id_order', '=' , $id)
                                ->select('order.id_order',
                                         'order.tanggal_pesan',
                                         'costumer.nama_costumer',
                                         'costumer.alamat',
                                         'costumer.no_hp',
                                         'product.nama_barang')
                                ->get();
                return Response()->json($data_order);
            }
            else{
                return Response()->json(['message' => 'ora ketemu']);
            }
        }
    
}
