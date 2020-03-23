<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\jenis_cuci;
use JWTAuth;
use DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class jeniscontroller extends Controller
{
    public function index($id)
    {
        if(Auth::user()->level=="admin"){
            $dt_jenis=jenis_cuci::get();
            return response()->json($dt_jenis);

    }else{
        return response()->json(['status'=>'anda bukan admin']);
    }
    }
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_jenis'=>'required',
            'harga_per_kg'=>'required',
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=jenis_cuci::create([
            'nama_jenis'=>$req->nama_jenis,
            'harga_per_kg'=>$req->harga_per_kg,
        ]);
        if($simpan){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Ditambahkan!"]);
        } else{
            return Response()->json(['status'=>0]);
        }
    }
    public function tampil_jenis ()
    {
        $data_jenis=jenis_cuci::count();
        $data_jenis1=jenis_cuci::all();
        return Response()->json(['count'=> $data_jenis, 'jenis'=> $data_jenis1, 'status'=>1]);
    }

    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_jenis'=>'required',
            'harga_per_kg'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=jenis_cuci::where('id',$id)->update([
            'nama_jenis'=>$req->nama_jenis,
            'harga_per_kg'=>$req->harga_per_kg,
        ]);
        if($ubah){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Diubah!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    public function destroy($id)
    {
        $hapus=jenis_cuci::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Dihapus!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
