@extends('front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-radius-10 bg-white mb-30 mt-30">
                <div class="card-header bg-primary">
                    <h4 class="widget-title text-white mb-0">Profile <span class="text-white">Wakaf</span></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Main Profile Info -->
                            <div class="profile-details p-20">
                                <div class="detail-item mb-15 d-flex justify-content-between border-bottom pb-15">
                                    <span class="text-muted">Peruntukan Tanah Wakaf Sesuai AIW</span>
                                    <strong class="text-primary">Masjid</strong>
                                </div>

                                <div class="detail-item mb-15 d-flex justify-content-between border-bottom pb-15">
                                    <span class="text-muted">Provinsi</span>
                                    <strong class="text-primary">D K I JAKARTA</strong>
                                </div>

                                <div class="detail-item mb-15 d-flex justify-content-between border-bottom pb-15">
                                    <span class="text-muted">Kabupaten/Kota</span>
                                    <strong class="text-primary">KOTA JAKARTA SELATAN</strong>
                                </div>

                                <div class="detail-item mb-15 d-flex justify-content-between border-bottom pb-15">
                                    <span class="text-muted">Kecamatan</span>
                                    <strong class="text-primary">T E B E T</strong>
                                </div>

                                <div class="detail-item mb-15 d-flex justify-content-between border-bottom pb-15">
                                    <span class="text-muted">Kelurahan</span>
                                    <strong class="text-primary">MANGGARAI</strong>
                                </div>

                                <div class="detail-item mb-15 d-flex justify-content-between border-bottom pb-15">
                                    <span class="text-muted">Alamat</span>
                                    <strong class="text-primary">RT.004/010 KEL. MANGGARAI</strong>
                                </div>

                                <div class="detail-item mb-15 d-flex justify-content-between border-bottom pb-15">
                                    <span class="text-muted">Luas Tanah</span>
                                    <strong class="text-primary">1.680,00 M<sup>2</sup></strong>
                                </div>

                                <div class="detail-item mb-15 d-flex justify-content-between border-bottom pb-15">
                                    <span class="text-muted">Luas Bangunan</span>
                                    <strong class="text-primary">0,00 M<sup>2</sup></strong>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <!-- Additional Info Card -->
                            <div class="card border-radius-10 border-primary mb-30">
                                <div class="card-body">
                                    <h5 class="mb-20 text-primary">Informasi Wakaf</h5>
                                    
                                    <div class="info-item mb-15">
                                        <label class="text-muted d-block mb-2">Nama Wakif</label>
                                        <strong class="text-primary">HM.HUSIN</strong>
                                    </div>

                                    <div class="info-item mb-15">
                                        <label class="text-muted d-block mb-2">Nama Nazhir</label>
                                        <strong class="text-primary">H.SANWANI</strong>
                                    </div>

                                    <div class="info-item mb-15">
                                        <label class="text-muted d-block mb-2">Status</label>
                                        <span class="badge badge-primary">Sudah Sertifikat</span>
                                    </div>

                                    <div class="info-item mb-15">
                                        <label class="text-muted d-block mb-2">No. Sertifikat</label>
                                        <strong class="text-primary">11</strong>
                                    </div>

                                    <div class="info-item mb-15">
                                        <label class="text-muted d-block mb-2">Tanggal Sertifikat</label>
                                        <strong class="text-primary">1991-09-19</strong>
                                    </div>

                                    <div class="info-item mb-15">
                                        <label class="text-muted d-block mb-2">No. AIW</label>
                                        <strong class="text-primary">07/AIW/91</strong>
                                    </div>

                                    <div class="info-item mb-15">
                                        <label class="text-muted d-block mb-2">Tanggal AIW</label>
                                        <strong class="text-primary">1991-05-27</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Section -->
        <div class="col-lg-6">
            <div class="card border-radius-10 bg-white mb-30">
                <div class="card-header bg-primary">
                    <h4 class="widget-title text-white mb-0">Galeri Foto</h4>
                </div>
                <div class="card-body">
                    @if(isset($data['gallery']) && count($data['gallery']) > 0)
                        <div class="row gallery-container">
                            @foreach($data['gallery'] as $photo)
                                <div class="col-md-4 mb-3">
                                    <div class="gallery-item">
                                        <a href="{{ $photo['url'] }}" 
                                           data-fancybox="gallery">
                                            <img src="{{ $photo['url'] }}" 
                                                 class="img-fluid border-radius-10" 
                                                 alt="Foto Wakaf">
                                        </a>
                                        <small class="text-primary d-block mt-2 text-center">
                                            {{ \Carbon\Carbon::parse($photo['date'])->format('d M Y') }}
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="mdi mdi-image-multiple text-muted" style="font-size: 48px;"></i>
                            <p class="text-muted mt-2">Tidak ada foto tersedia</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="col-lg-6">
            <div class="card border-radius-10 bg-white mb-30">
                <div class="card-header bg-primary">
                    <h4 class="widget-title text-white mb-0">Lokasi Wakaf</h4>
                </div>
                <div class="card-body p-0">
                    @if(isset($data['location']))
                        <div id="map" class="border-radius-10" style="height: 400px; width: 100%;"></div>
                        <div class="p-3">
                            <small class="text-muted">
                                <i class="mdi mdi-map-marker text-primary"></i> 
                                {{ $data['wakaf_info']['alamat'] }}
                            </small>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="mdi mdi-map-marker-off text-muted" style="font-size: 48px;"></i>
                            <p class="text-muted mt-2">Lokasi tidak tersedia</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    :root {
        --primary-color: #2196F3;
    }

    .bg-primary {
        background-color: var(--primary-color) !important;
    }

    .text-primary {
        color: var(--primary-color) !important;
    }

    .border-primary {
        border: 2px solid var(--primary-color) !important;
    }

    .badge-primary {
        background-color: var(--primary-color);
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .profile-details .detail-item:last-child {
        border-bottom: none !important;
    }

    .detail-item {
        transition: all 0.3s ease;
    }

    .detail-item:hover {
        background-color: rgba(33, 150, 243, 0.05);
    }

    .card {
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .border-radius-10 {
        border-radius: 10px;
    }

    .widget-title span {
        font-weight: 300;
    }

    /* Gallery Styles */
    .gallery-item {
        transition: all 0.3s ease;
        position: relative;
        aspect-ratio: 1;
        overflow: hidden;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.3s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.05);
    }

    .gallery-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(33, 150, 243, 0.1);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover::after {
        opacity: 1;
    }

    #map {
        height: 400px;
        width: 100%;
        z-index: 1;
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(isset($data['location']))
        // Initialize the map with default view
        var map = L.map('map');
        
        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors',
            subdomains: ['a', 'b', 'c'],
            minZoom: 1,
            maxZoom: 19
        }).addTo(map);

        // Set view to wakaf location
        const lat = {{ $data['location']['latitude'] }};
        const lng = {{ $data['location']['longitude'] }};
        map.setView([lat, lng], {{ $data['location']['zoom'] ?? 15 }});

        // Add marker
        const marker = L.marker([lat, lng]).addTo(map);
        
        // Add popup
        marker.bindPopup(`
            <div class="text-center">
                <strong class="d-block mb-1">{{ $data['wakaf_info']['peruntukan'] }}</strong>
                <small>{{ $data['wakaf_info']['alamat'] }}</small>
            </div>
        `).openPopup();

        // Fix map display issues by reinitializing after load
        setTimeout(function() {
            map.invalidateSize();
        }, 100);
    @endif

    // Initialize Fancybox for gallery
    Fancybox.bind("[data-fancybox]", {
        // Custom options
        Toolbar: {
            display: [
                { id: "prev", position: "center" },
                { id: "counter", position: "center" },
                { id: "next", position: "center" },
                "zoom",
                "slideshow",
                "fullscreen",
                "close",
            ],
        },
        // Add animation
        Image: {
            transition: "slide",
        },
    });
});
</script>
@endpush