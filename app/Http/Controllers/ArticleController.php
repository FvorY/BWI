<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\mMember;
use App\Authentication;
use Auth;
use Carbon\Carbon;
use Session;
use DB;
use Illuminate\Support\Collection;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $id = $request->query('id');
        return view("article/index", ['id' => $id]);
    }

}
