<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\mMember;

use App\Authentication;

use Auth;

use Carbon\Carbon;

use Session;

use DB;

use File;

use Yajra\Datatables\Datatables;

class WakaflandController extends Controller
{
    public function index() {
      $city = DB::table('cities')
        ->get();

      $sub = DB::table('subdistricts')
      ->get();

      $village = DB::table('villages')
      ->get();

      $wakif = DB::table('wakifs')
      ->get();
      
      $nadzir = DB::table('nadzirs')
      ->get();

      return view('wakafland.index', compact('city', 'sub', 'village', 'nadzir', 'wakif'));
    }

    public function datatable() {
      $data = DB::table('wakaf_lands')
        ->get();


        // return $data;
        // $xyzab = collect($data);
        // return $xyzab;
        // return $xyzab->i_price;
        return Datatables::of($data)
          ->addColumn('aksi', function ($data) {
            return  '<div class="btn-group">'.
                     '<button type="button" onclick="edit('.$data->id.')" class="btn btn-info btn-lg" title="edit">'.
                     '<label class="fa fa-pencil-alt"></label></button>'.
                     '<button type="button" onclick="hapus('.$data->id.')" class="btn btn-danger btn-lg" title="hapus">'.
                     '<label class="fa fa-trash"></label></button>'.
                  '</div>';
          })
          ->rawColumns(['aksi'])
          ->addIndexColumn()
          ->make(true);
    }

    public function simpan(Request $req) {
      // dd(;
      if ($req->id == null) {
        DB::beginTransaction();
        try {

          DB::table("wakaf_lands")
              ->insert([
              "register_no" => $req->register_no,
              "city_id" => $req->city_id,
              "subdistrict_id" => $req->subdistrict_id,
              "village_id" => $req->village_id,
              "area_size" => $req->area_size,
              "used" => $req->used,
              "object_name" => $req->object_name,
              "address" => $req->address,
              "status" => $req->status,
              "certificate_no" => $req->certificate_no,
              "certificate_date" => Carbon::parse($req->certificate_date)->format('Y-m-d'),
              "aiw_no" => $req->aiw_no,
              "aiw_date" => Carbon::parse($req->aiw_date)->format('Y-m-d'),
              "latitude" => $req->latitude,
              "longitude" => $req->longitude,
              "wakif_id" => $req->wakif_id,
              "nadzir_id" => $req->nadzir_id,
              "created_at" => Carbon::now('Asia/Jakarta'),
            ]);

          DB::commit();
          return response()->json(["status" => 1]);
        } catch (\Exception $e) {
          DB::rollback();
          return response()->json(["status" => 2]);
        }
      } else {
        DB::beginTransaction();
        try {

          DB::table("wakaf_lands")
              ->where('id', $req->id)
              ->update([
                "register_no" => $req->register_no,
                "city_id" => $req->city_id,
                "subdistrict_id" => $req->subdistrict_id,
                "village_id" => $req->village_id,
                "area_size" => $req->area_size,
                "used" => $req->used,
                "object_name" => $req->object_name,
                "address" => $req->address,
                "status" => $req->status,
                "certificate_no" => $req->certificate_no,
                "certificate_date" => Carbon::parse($req->certificate_date)->format('Y-m-d'),
                "aiw_no" => $req->aiw_no,
                "aiw_date" => Carbon::parse($req->aiw_date)->format('Y-m-d'),
                "latitude" => $req->latitude,
                "longitude" => $req->longitude,
                "wakif_id" => $req->wakif_id,
                "nadzir_id" => $req->nadzir_id,
                "updated_at" => Carbon::now('Asia/Jakarta'),
            ]);

          DB::commit();
          return response()->json(["status" => 3]);
        } catch (\Exception $e) {
          DB::rollback();
          return response()->json(["status" => 4]);
        }
      }
    }

    public function hapus(Request $req) {
      DB::beginTransaction();
      try {

        DB::table("wakaf_lands")
        ->where('id', $req->id)
        ->update([
          "deleted_at" => Carbon::now('Asia/Jakarta'),
      ]);

        DB::table("wakaf_lands")
            ->where("id", $req->id)
            ->delete();

        DB::commit();
        return response()->json(["status" => 3]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json(["status" => 4]);
      }

    }

    public function edit(Request $req) {
      $data = DB::table("wakaf_lands")
              ->where("id", $req->id)
              ->first();

      return response()->json($data);
    }
}
