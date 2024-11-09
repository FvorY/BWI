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

class JumlahWakafController extends Controller
{

    public function index(Request $request)
    {
        // $id = $request->query('id');
        // $type = $request->query('type'); // 'certified' or 'uncertified'

        // // Fetch the appropriate data based on id and type
        // $data = WakafData::where('id', $id)
        //     ->where('type', $type === 'certified' ? 1 : 0)
        //     ->get();
        $data = [];
        return view("jumlah_wakaf/index", compact('data'));
    }

}
