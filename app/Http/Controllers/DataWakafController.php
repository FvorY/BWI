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

class DataWakafController extends Controller
{
    private $wakafData;
    private $subRegionData;

    public function __construct()
    {
        $this->wakafData = collect([
            [
                'name' => 'KOTA JAKARTA SELATAN',
                'jumlah' => 1517,
                'luas' => 88.60,
                'sudah_sertifikat_jumlah' => 859,
                'sudah_sertifikat_luas' => 54.20,
                'belum_sertifikat_jumlah' => 658,
                'belum_sertifikat_luas' => 34.40
            ],
            [
                'name' => 'KOTA JAKARTA TIMUR',
                'jumlah' => 2104,
                'luas' => 75.24,
                'sudah_sertifikat_jumlah' => 1142,
                'sudah_sertifikat_luas' => 38.84,
                'belum_sertifikat_jumlah' => 962,
                'belum_sertifikat_luas' => 36.40
            ],
            [
                'name' => 'KOTA JAKARTA PUSAT',
                'jumlah' => 748,
                'luas' => 21.60,
                'sudah_sertifikat_jumlah' => 598,
                'sudah_sertifikat_luas' => 17.03,
                'belum_sertifikat_jumlah' => 150,
                'belum_sertifikat_luas' => 4.58
            ],
            [
                'name' => 'KOTA JAKARTA UTARA',
                'jumlah' => 972,
                'luas' => 40.73,
                'sudah_sertifikat_jumlah' => 540,
                'sudah_sertifikat_luas' => 18.55,
                'belum_sertifikat_jumlah' => 432,
                'belum_sertifikat_luas' => 22.17
            ],
            [
                'name' => 'KOTA JAKARTA BARAT',
                'jumlah' => 1392,
                'luas' => 45.01,
                'sudah_sertifikat_jumlah' => 952,
                'sudah_sertifikat_luas' => 31.41,
                'belum_sertifikat_jumlah' => 440,
                'belum_sertifikat_luas' => 13.60
            ],
            [
                'name' => 'KABUPATEN KEP.SERIBU',
                'jumlah' => 52,
                'luas' => 2.75,
                'sudah_sertifikat_jumlah' => 37,
                'sudah_sertifikat_luas' => 1.61,
                'belum_sertifikat_jumlah' => 15,
                'belum_sertifikat_luas' => 1.14
            ]
        ]);

        $this->subRegionData = [
            'KOTA JAKARTA SELATAN' => collect([
                [
                    'name' => 'TEBET',
                    'jumlah' => 204,
                    'luas' => 6.70,
                    'sudah_sertifikat_jumlah' => 154,
                    'sudah_sertifikat_luas' => 4.96,
                    'belum_sertifikat_jumlah' => 50,
                    'belum_sertifikat_luas' => 1.74
                ],
                [
                    'name' => 'SETIABUDI',
                    'jumlah' => 21,
                    'luas' => 0.75,
                    'sudah_sertifikat_jumlah' => 4,
                    'sudah_sertifikat_luas' => 0.11,
                    'belum_sertifikat_jumlah' => 17,
                    'belum_sertifikat_luas' => 0.64
                ],
            ])
        ];
    }

    public function index(Request $request)
    {
        $region = $request->query('region');
        return view("data_wakaf/index", ['region' => $region]);
    }

    // API endpoint for AJAX requests
    public function getData(Request $request)
    {
        try {
            $region = $request->query('region');
            $data = $region ? 
                    ($this->subRegionData[$region] ?? collect([])) : 
                    $this->wakafData;

            // Handle Search
            if ($request->search) {
                $search = strtolower($request->search);
                $data = $data->filter(function ($item) use ($search) {
                    return str_contains(strtolower($item['name']), $search);
                });
            }

            // Handle Sorting
            if ($request->sort && $request->direction) {
                $sortField = $request->sort;
                $direction = $request->direction;
                
                $data = $data->sortBy($sortField, SORT_REGULAR, $direction === 'desc');
            }

            if ($data->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No data found',
                    'data' => []
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'data' => $data->values()->all()
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while fetching data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function search(Request $request)
    {
        $data = $this->wakafData;
        $totalRecords = $data->count();

        // Handle Search
        if ($request->search) {
            $search = strtolower($request->search);
            $data = $data->filter(function ($item) use ($search) {
                return str_contains(strtolower($item['name']), $search) ||
                       str_contains(strtolower($item['job_title']), $search) ||
                       str_contains(strtolower($item['location']), $search) ||
                       str_contains(strtolower((string)$item['age']), $search);
            });
        }

        // Column specific filtering
        if ($request->name) {
            $data = $data->filter(function($item) use ($request) {
                return str_contains(strtolower($item['name']), strtolower($request->name));
            });
        }
        // Add similar filters for other columns if needed

        $filteredRecords = $data->count();

        // Handle Pagination
        $start = $request->start ?? 0;
        $length = $request->length ?? 10;
        $data = $data->slice($start, $length);

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data->values()->all()
        ]);
    }
}
