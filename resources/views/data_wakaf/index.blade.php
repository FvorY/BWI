@extends('front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 p-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="latest-post mb-50">
                        <div class="container">
                        <div class="widget-header position-relative mb-0 mx-8">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4 class="widget-title mb-0">Data <span>Wakaf</span></h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="search-box">
                                        <input type="text" id="searchBox" class="form-control" placeholder="Search..." style="margin-bottom: 0; width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="container">
                            <div class="table-responsive">
                                <table class="custom-table" id="wakafTable">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center">No</th>
                                            <th rowspan="2" class="sortable" data-sort="name">
                                                Kantor Kementerian Agama <i class="fas fa-sort"></i>
                                            </th>
                                            <th rowspan="2" class="text-center sortable" data-sort="jumlah">
                                                Jumlah <i class="fas fa-sort"></i>
                                            </th>
                                            <th rowspan="2" class="text-center sortable" data-sort="luas">
                                                Luas [Ha] <i class="fas fa-sort"></i>
                                            </th>
                                            <th colspan="2" class="text-center">Sudah Sertifikat</th>
                                            <th colspan="2" class="text-center">Belum Sertifikat</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center sortable" data-sort="sudah_sertifikat_jumlah">
                                                Jumlah <i class="fas fa-sort"></i>
                                            </th>
                                            <th class="text-center sortable" data-sort="sudah_sertifikat_luas">
                                                Luas [Ha] <i class="fas fa-sort"></i>
                                            </th>
                                            <th class="text-center sortable" data-sort="belum_sertifikat_jumlah">
                                                Jumlah <i class="fas fa-sort"></i>
                                            </th>
                                            <th class="text-center sortable" data-sort="belum_sertifikat_luas">
                                                Luas [Ha] <i class="fas fa-sort"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data will be loaded via AJAX -->
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
@endsection
<!-- Add Font Awesome for sort icons -->

<!-- Initialize DataTable -->
@section('extra_script')
<script>
$(document).ready(function() {
    let currentSort = '';
    let currentDirection = 'asc';
    const currentRegion = '{{$region}}';

    // Initial data load when page loads
    fetchData();

    // Search functionality with debounce
    let searchTimer;
    $('#searchBox').on('keyup', function() {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function() {
            fetchData();
        }, 500);
    });

    // Sorting functionality
    $('.sortable').click(function() {
        const column = $(this).data('sort');
        
        if (currentSort === column) {
            currentDirection = currentDirection === 'asc' ? 'desc' : 'asc';
        } else {
            currentSort = column;
            currentDirection = 'asc';
        }

        // Update sort icons
        $('.sortable i').removeClass('fa-sort-up fa-sort-down').addClass('fa-sort');
        $(this).find('i').removeClass('fa-sort')
            .addClass(currentDirection === 'asc' ? 'fa-sort-up' : 'fa-sort-down');

        fetchData();
    });

    function fetchData() {
        const tbody = $('#wakafTable tbody');
        // Show loading state with full colspan
        tbody.html(`
            <tr>
                <td colspan="8" class="text-center">
                    <div class="d-flex justify-content-center align-items-center py-4">
                        <div class="spinner-border text-primary me-2" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span>Loading data...</span>
                    </div>
                </td>
            </tr>
        `);

        $.ajax({
            url: '{{ route("data-wakaf.getData") }}',
            type: 'GET',
            data: {
                search: $('#searchBox').val(),
                sort: currentSort,
                direction: currentDirection,
                region: currentRegion
            },
            success: function(response) {
                if (response.status === 'success') {
                    updateTable(response.data);
                } else {
                    showError('An error occurred while fetching data');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
                let errorMessage = 'An error occurred while fetching data';
                
                // Handle specific HTTP status codes
                switch(xhr.status) {
                    case 404:
                        errorMessage = 'Data not found';
                        break;
                    case 500:
                        errorMessage = 'Internal server error';
                        break;
                    case 403:
                        errorMessage = 'Access forbidden';
                        break;
                    case 401:
                        errorMessage = 'Unauthorized access';
                        break;
                }
                
                showError(errorMessage);
            }
        });
    }

    function showError(message) {
        const tbody = $('#wakafTable tbody');
        tbody.html(`
            <tr>
                <td colspan="8" class="text-center">
                    <div class="alert alert-danger d-inline-block m-3" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        ${message}
                    </div>
                </td>
            </tr>
        `);
    }

    function updateTable(data) {
        const tbody = $('#wakafTable tbody');
        tbody.empty();
        
        if (!data || data.length === 0) {
            tbody.html(`
                <tr>
                    <td colspan="8" class="text-center">
                        <div class="alert alert-info d-inline-block m-3" role="alert">
                            <i class="fas fa-info-circle me-2"></i>
                            No data found
                            ${$('#searchBox').val() ? 
                                `for search term: "${$('#searchBox').val()}"
                                <br>
                                <button class="btn btn-sm btn-outline-primary mt-2" onclick="$('#searchBox').val('').trigger('keyup')">
                                    Clear Search
                                </button>` 
                                : ''}
                        </div>
                    </td>
                </tr>
            `);
            return;
        }

        try {
            data.forEach(function(item, index) {
                const nameCell = currentRegion ? 
                    item.name : 
                    `<a href="?region=${encodeURIComponent(item.name)}" class="text-decoration-none text-dark">
                        ${item.name}
                        <i class="fas fa-chevron-right ms-2 text-muted"></i>
                    </a>`;

                const certifiedHref = `{{ url('/jumlah-wakaf') }}?id=${item.id}&type=certified`;
                const uncertifiedHref = `{{ url('/jumlah-wakaf') }}?id=${item.id}&type=uncertified`;

                const jumlahCell = currentRegion ? 
                    `<td class="text-center clickable-cell text-primary fw-bolder" data-label="Jumlah" data-href="${certifiedHref}">${(item.jumlah || 0).toLocaleString()}</td>` :
                    `<td class="text-center" data-label="Jumlah">${(item.jumlah || 0).toLocaleString()}</td>`;

                const luasCell = currentRegion ?
                    `<td class="text-center clickable-cell text-primary fw-bolder" data-label="Luas [Ha]" data-href="${certifiedHref}">${(item.luas || 0).toFixed(2)}</td>` :
                    `<td class="text-center" data-label="Luas [Ha]">${(item.luas || 0).toFixed(2)}</td>`;

                const sudahSertifikatJumlahCell = currentRegion ?
                    `<td class="text-center clickable-cell text-primary fw-bolder" data-label="Sudah Sertifikat (Jumlah)" data-href="${certifiedHref}">
                        ${(item.sudah_sertifikat_jumlah || 0).toLocaleString()}
                    </td>` :
                    `<td class="text-center" data-label="Sudah Sertifikat (Jumlah)">
                        ${(item.sudah_sertifikat_jumlah || 0).toLocaleString()}
                    </td>`;

                const sudahSertifikatLuasCell = currentRegion ?
                    `<td class="text-center clickable-cell text-primary fw-bolder" data-label="Sudah Sertifikat (Luas)" data-href="${certifiedHref}">
                        ${(item.sudah_sertifikat_luas || 0).toFixed(2)}
                    </td>` :
                    `<td class="text-center" data-label="Sudah Sertifikat (Luas)">
                        ${(item.sudah_sertifikat_luas || 0).toFixed(2)}
                    </td>`;

                const belumSertifikatJumlahCell = currentRegion ?
                    `<td class="text-center clickable-cell text-primary fw-bolder" data-label="Belum Sertifikat (Jumlah)" data-href="${uncertifiedHref}">
                        ${(item.belum_sertifikat_jumlah || 0).toLocaleString()}
                    </td>` :
                    `<td class="text-center" data-label="Belum Sertifikat (Jumlah)">
                        ${(item.belum_sertifikat_jumlah || 0).toLocaleString()}
                    </td>`;

                const belumSertifikatLuasCell = currentRegion ?
                    `<td class="text-center clickable-cell text-primary fw-bolder" data-label="Belum Sertifikat (Luas)" data-href="${uncertifiedHref}">
                        ${(item.belum_sertifikat_luas || 0).toFixed(2)}
                    </td>` :
                    `<td class="text-center" data-label="Belum Sertifikat (Luas)">
                        ${(item.belum_sertifikat_luas || 0).toFixed(2)}
                    </td>`;

                tbody.append(`
                    <tr>
                        <td class="text-center no-click" data-label="No">${index + 1}</td>
                        <td class="no-click" data-label="Kantor Kementerian Agama">${nameCell}</td>
                        ${jumlahCell}
                        ${luasCell}
                        ${sudahSertifikatJumlahCell}
                        ${sudahSertifikatLuasCell}
                        ${belumSertifikatJumlahCell}
                        ${belumSertifikatLuasCell}
                    </tr>
                `);
            });

            // Calculate and add total row
            const totals = data.reduce((acc, item) => ({
                jumlah: acc.jumlah + (item.jumlah || 0),
                luas: acc.luas + (item.luas || 0),
                sudah_sertifikat_jumlah: acc.sudah_sertifikat_jumlah + (item.sudah_sertifikat_jumlah || 0),
                sudah_sertifikat_luas: acc.sudah_sertifikat_luas + (item.sudah_sertifikat_luas || 0),
                belum_sertifikat_jumlah: acc.belum_sertifikat_jumlah + (item.belum_sertifikat_jumlah || 0),
                belum_sertifikat_luas: acc.belum_sertifikat_luas + (item.belum_sertifikat_luas || 0)
            }), {
                jumlah: 0, luas: 0,
                sudah_sertifikat_jumlah: 0, sudah_sertifikat_luas: 0,
                belum_sertifikat_jumlah: 0, belum_sertifikat_luas: 0
            });

            tbody.append(`
                <tr class="total-row">
                    <td colspan="2" class="text-center" data-label=""><strong>Jumlah</strong></td>
                    <td class="text-center" data-label="Total Jumlah"><strong>${totals.jumlah.toLocaleString()}</strong></td>
                    <td class="text-center" data-label="Total Luas"><strong>${totals.luas.toFixed(2)}</strong></td>
                    <td class="text-center" data-label="Total Sudah Sertifikat (Jumlah)"><strong>${totals.sudah_sertifikat_jumlah.toLocaleString()}</strong></td>
                    <td class="text-center" data-label="Total Sudah Sertifikat (Luas)"><strong>${totals.sudah_sertifikat_luas.toFixed(2)}</strong></td>
                    <td class="text-center" data-label="Total Belum Sertifikat (Jumlah)"><strong>${totals.belum_sertifikat_jumlah.toLocaleString()}</strong></td>
                    <td class="text-center" data-label="Total Belum Sertifikat (Luas)"><strong>${totals.belum_sertifikat_luas.toFixed(2)}</strong></td>
                </tr>
            `);

            // Update click handler for clickable cells
            if (currentRegion) {
                $('.clickable-cell').on('click', function() {
                    const href = $(this).data('href');
                    if (href) {
                        window.location = href;
                    }
                });
            }
        } catch (error) {
            console.error('Error updating table:', error);
            showError('Error displaying data');
        }
    }
});
</script>
@endsection