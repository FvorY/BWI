<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HomefrontController extends Controller
{
    public function index() {
      return view("home_front");
    }

    public function visimisi() {
      $data = DB::table("vision_misions")
      ->join("photos", "photos.id", "=", "vision_misions.photo_id")
      ->where('vision_misions.id', 1)
      ->first();

      return view("front.visimisi.index", compact("data"));
    }
}
