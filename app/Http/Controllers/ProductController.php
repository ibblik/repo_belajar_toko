<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //entah apa yang merasuki mu 
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_barang' => 'required'

            ]
        );

        if($validator->fails()){
            return Response()->json($validator->error());
        }

        $simpan = product::create([
            'nama_barang' => $request->nama_barang
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
        return product::all();
    }
    public function destroy($id)
    {
        $hapus = product::where('id_barang',$id)->delete();
            if($hapus){
                return Response()->json(['status'=> 1]);
            } 
            else{
                return Response()->json(['status'=>0]);
            }
     
    }
}
