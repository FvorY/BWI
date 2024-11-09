@extends('front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 p-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="latest-post mb-50">
                        <div class="container">
                            <div class="widget-header position-relative mb-4">
                                <h4 class="widget-title">Daftar Tanah Wakaf<br>
                                    <span class="d-block text-sm">KUA T E B E T - Kota Jakarta Selatan - D K I Jakarta</span>
                                </h4>
                            </div>
                            
                            <div class="table-responsive">
                                <div class="table-wrapper">
                                    <table class="custom-table" id="wakafTable">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">No</th>
                                                <th data-priority="2">Kelurahan</th>
                                                <th data-priority="3">Luas</th>
                                                <th data-priority="4">Penggunaan</th>
                                                <th>Wakif</th>
                                                <th>Nazhir</th>
                                                <th>Nomor Sertifikat</th>
                                                <th>Tanggal Sertifikat</th>
                                                <th>Nomor AIW</th>
                                                <th>Tanggal AIW</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-label="No">1.</td>
                                                <td data-label="Kelurahan">MANGGARAI</td>
                                                <td data-label="Luas">1680</td>
                                                <td data-label="Penggunaan">Masjid</td>
                                                <td data-label="Wakif" class="text-success">HM.HUSIN</td>
                                                <td data-label="Nazhir">H.SANWANI</td>
                                                <td data-label="Nomor Sertifikat">11</td>
                                                <td data-label="Tanggal Sertifikat">1991-09-19</td>
                                                <td data-label="Nomor AIW">07/AIW/91</td>
                                                <td data-label="Tanggal AIW">1991-05-27</td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media screen and (max-width: 767px) {
    .custom-table thead {
        display: none;
    }
    
    .custom-table tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #ddd;
    }
    
    .custom-table td {
        display: block;
        text-align: right;
        padding: .5rem;
        border: none;
        border-bottom: 1px solid #eee;
    }
    
    .custom-table td:before {
        content: attr(data-label);
        float: left;
        font-weight: bold;
    }
    
    .custom-table td:last-child {
        border-bottom: none;
    }
}

.table-wrapper {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
</style>
@endsection
