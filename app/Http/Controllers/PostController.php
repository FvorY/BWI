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

class PostController extends Controller
{
    public function index() {
      return view('posts.index');
    }

    public function datatable() {
      $data = DB::table('posts')
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
          ->addColumn('body', function ($data) {
            return mb_strimwidth($data->body, 0, 255, "!!");
          })
          ->rawColumns(['aksi', 'body'])
          ->addIndexColumn()
          ->make(true);
    }

    public function tambah() {
      return view('posts.tambah');
    }

    public function simpan(Request $req) {
      if ($req->id == null) {
        DB::beginTransaction();
        try {

          $max = DB::table("posts")->max('id') + 1;

          DB::table("posts")
              ->insert([
              "id" => $max,
              "user_id" => Auth::user()->id,
              "title" => $req->title,
              "body" => $req->body,
              "created_at" => Carbon::now('Asia/Jakarta'),
            ]);

          $file = $req->file('file');
          if (isset($file)) {
          foreach ($file as $key => $value) {

            $imgPath = null;
            $tgl = Carbon::now('Asia/Jakarta');
            $folder = $tgl->year . $tgl->month . $tgl->timestamp;
            $dir = 'image/uploads/Posts/' . $max . '/' . ($key + 1) ;
            $childPath = $dir . '/';
            $path = $childPath;

            $name = null;
            if ($value != null) {
                $this->deleteDir($dir);
                $name = $folder . '.' . $value->getClientOriginalExtension();
                if (!File::exists($path)) {
                    if (File::makeDirectory($path, 0777, true)) {
                        $value->move($path, $name);
                        $imgPath = $childPath . $name;
                        compressImage($value->getClientOriginalExtension(),$imgPath,$imgPath,60); 

                        DB::table("post_photos")
                            ->insert([
                              'post_id' => $max,
                              'photo_url' => $imgPath,
                        ]);

                    } else
                        $imgPath = null;
                } else {
                    return 'already exist';
                }
            }
          }
          }

          DB::commit();
          return response()->json(["status" => 1]);
        } catch (\Exception $e) {
          DB::rollback();
          return response()->json(["status" => 2]);
        }
      } else {
        DB::beginTransaction();
        try {

          $max = DB::table("posts")->where("id", $req->id)->max('id');

          DB::table("posts")
              ->where("id", $req->id)
              ->update([
              "user_id" => Auth::user()->id,
              "title" => $req->title,
              "body" => $req->body,
              "updated_at" => Carbon::now('Asia/Jakarta'),
            ]);

          $file = $req->file('file');
          if (isset($file)) {
            foreach ($file as $key => $value) {
              // dd($file);
              $imgPath = null;
              $tgl = Carbon::now('Asia/Jakarta');
              $folder = $tgl->year . $tgl->month . $tgl->timestamp;

              $dir = 'image/uploads/Posts/' . $req->id . '/' . ($max + ($key + 1)) ;

              $childPath = $dir . '/';
              $path = $childPath;

              $name = null;
              if ($value != null) {
                  $this->deleteDir($dir);
                  $name = $folder . '.' . $value->getClientOriginalExtension();
                  if (!File::exists($path)) {
                      if (File::makeDirectory($path, 0777, true)) {
                          $value->move($path, $name);
                          $imgPath = $childPath . $name;
                          compressImage($value->getClientOriginalExtension(),$imgPath,$imgPath,60);

                        DB::table("post_photos")
                            ->insert([
                              'post_id' => $max,
                              'photo_url' => $imgPath,
                        ]);

                      } else
                          $imgPath = null;
                  } else {
                      return 'already exist';
                  }
              }
            }
          }

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

        DB::table("posts")
            ->where("id", $req->id)
            ->delete();

        DB::table("post_photos")
          ->where("post_id", $req->id)
          ->delete();

        $dir = 'image/uploads/Posts/' . $req->id;
        $childPath = $dir . '/';

        $this->deleteDir($dir);

        DB::commit();
        return response()->json(["status" => 3]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json(["status" => 4]);
      }

    }

    public function edit($id) {
      return view('posts.edit', compact('id'));
    }

    public function doedit(Request $req) {
      $id = $req->id;

      $dataposts = DB::table("posts")->where("id", $id)->first();

      $dataimage = DB::table("post_photos")->where("post_id", $id)->get();

      return response()->json([
        'posts' => $dataposts,
        'image' => $dataimage
      ]);
    }

    public function removeimage(Request $req) {
      DB::table("post_photos")->where("id", $req->id)->delete();

      $dir = 'image/uploads/Posts/' . $cek->id;
      $childPath = $dir . '/';

      $this->deleteDir($dir);

    }

    public function deleteDir($dirPath)
    {
       if (!is_dir($dirPath)) {
           return false;
       }
       if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
           $dirPath .= '/';
       }
       $files = glob($dirPath . '*', GLOB_MARK);
       foreach ($files as $file) {
           if (is_dir($file)) {
               self::deleteDir($file);
           } else {
               unlink($file);
           }
       }
       rmdir($dirPath);
   }
}
