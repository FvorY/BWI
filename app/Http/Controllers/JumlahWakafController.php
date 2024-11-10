<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JumlahWakafController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            [
                'no' => 1,
                'kelurahan' => 'MANGGARAI',
                'luas' => 1680,
                'penggunaan' => 'Masjid',
                'wakif' => 'HM.HUSIN',
                'nazhir' => 'H.SANWANI',
                'nomor_sertifikat' => '11',
                'tanggal_sertifikat' => '1991-09-19',
                'nomor_aiw' => '07/AIW/91',
                'tanggal_aiw' => '1991-05-27'
            ],
            [
                'no' => 2,
                'kelurahan' => 'BUKIT DURI',
                'luas' => 2450,
                'penggunaan' => 'Musholla',
                'wakif' => 'H.ABDULLAH',
                'nazhir' => 'AHMAD SOBARI',
                'nomor_sertifikat' => '22',
                'tanggal_sertifikat' => '1992-03-15',
                'nomor_aiw' => '12/AIW/92',
                'tanggal_aiw' => '1992-02-10'
            ],
            [
                'no' => 3,
                'kelurahan' => 'MENTENG DALAM',
                'luas' => 3200,
                'penggunaan' => 'Pesantren',
                'wakif' => 'HJ.AMINAH',
                'nazhir' => 'M.YUSUF',
                'nomor_sertifikat' => '33',
                'tanggal_sertifikat' => '1993-11-25',
                'nomor_aiw' => '15/AIW/93',
                'tanggal_aiw' => '1993-10-05'
            ],
        ];

        return view("jumlah_wakaf.index", compact('data'));
    }
}
