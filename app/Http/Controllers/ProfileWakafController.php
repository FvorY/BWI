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

class ProfileWakafController extends Controller
{
    public function index(Request $request)
    {
        // Dummy data structure
        $data = [
            'wakaf_info' => [
                'peruntukan' => 'Masjid',
                'provinsi' => 'D K I JAKARTA',
                'kabupaten' => 'KOTA JAKARTA SELATAN',
                'kecamatan' => 'T E B E T',
                'kelurahan' => 'MANGGARAI',
                'alamat' => 'RT.004/010 KEL. MANGGARAI',
                'luas_tanah' => '1.680,00',
                'luas_bangunan' => '0,00',
            ],
            'wakif_info' => [
                'nama_wakif' => 'HM.HUSIN',
                'nama_nazhir' => 'H.SANWANI',
                'status' => 'Sudah Sertifikat',
                'no_sertifikat' => '11',
                'tanggal_sertifikat' => '1991-09-19',
                'no_aiw' => '07/AIW/91',
                'tanggal_aiw' => '1991-05-27',
            ],
            // Add location data for OSM
            'location' => [
                'latitude' => -6.2088,  // Jakarta coordinates
                'longitude' => 106.8456,
                'zoom' => 15,
            ],
            // Add gallery photos
            'gallery' => [
                [
                    'id' => 1,
                    'url' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f',
                    'caption' => 'Tampak Depan Masjid',
                    'date' => '2023-01-15',
                ],
                [
                    'id' => 2,
                    'url' => 'https://images.unsplash.com/photo-1523731407965-2430cd12f5e4',
                    'caption' => 'Area Parkir',
                    'date' => '2023-01-15',
                ],
                [
                    'id' => 3,
                    'url' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523',
                    'caption' => 'Halaman Masjid', 
                    'date' => '2023-01-15',
                ],
            ]
        ];

        return view("profile_wakaf.index", compact('data'));
    }
}
