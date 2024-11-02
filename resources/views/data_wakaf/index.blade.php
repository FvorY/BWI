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

                tbody.append(`
                    <tr>
                        <td class="text-center">${index + 1}</td>
                        <td>${nameCell}</td>
                        <td class="text-center">${(item.jumlah || 0).toLocaleString()}</td>
                        <td class="text-center">${(item.luas || 0).toFixed(2)}</td>
                        <td class="text-center">${(item.sudah_sertifikat_jumlah || 0).toLocaleString()}</td>
                        <td class="text-center">${(item.sudah_sertifikat_luas || 0).toFixed(2)}</td>
                        <td class="text-center">${(item.belum_sertifikat_jumlah || 0).toLocaleString()}</td>
                        <td class="text-center">${(item.belum_sertifikat_luas || 0).toFixed(2)}</td>
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
                    <td colspan="2" class="text-center"><strong>Jumlah</strong></td>
                    <td class="text-center"><strong>${totals.jumlah.toLocaleString()}</strong></td>
                    <td class="text-center"><strong>${totals.luas.toFixed(2)}</strong></td>
                    <td class="text-center"><strong>${totals.sudah_sertifikat_jumlah.toLocaleString()}</strong></td>
                    <td class="text-center"><strong>${totals.sudah_sertifikat_luas.toFixed(2)}</strong></td>
                    <td class="text-center"><strong>${totals.belum_sertifikat_jumlah.toLocaleString()}</strong></td>
                    <td class="text-center"><strong>${totals.belum_sertifikat_luas.toFixed(2)}</strong></td>
                </tr>
            `);
        } catch (error) {
            console.error('Error updating table:', error);
            showError('Error displaying data');
        }
    }
});
</script>
@endsection

<!-- Optional: Add custom CSS for more minimalist look -->
<style>
  .table {
    --bs-table-hover-bg: rgba(0, 0, 0, 0.02);
  }
  
  .table th {
    border-top: none;
    font-weight: 500;
    color: #6c757d;
    text-transform: uppercase;
    font-size: 0.85rem;
  }
  
  .table td {
    vertical-align: middle;
    color: #495057;
  }
  
  .dataTables_filter input {
    border-radius: 20px;
    border: 1px solid #dee2e6;
    padding: 8px 16px;
    margin-left: 8px;
  }
  
  .dataTables_length select {
    border-radius: 20px;
    border: 1px solid #dee2e6;
    padding: 8px 16px;
  }
  
  .page-link {
    border: none;
    color: #6c757d;
  }
  
  .page-item.active .page-link {
    background-color: #8BC34A;
    border-color: #8BC34A;
  }

  .custom-table {
    width: 100%;
    background: white;
    border-radius: 15px;
    overflow: hidden;
  }

  .custom-table thead {
    background-color: #8BC34A;
    color: white;
  }

  .custom-table th {
    padding: 15px 20px;
    font-weight: 500;
    text-align: left;
  }

  .custom-table td {
    padding: 15px 20px;
    color: #666;
  }

  .custom-table tbody tr {
    border-bottom: 1px solid #f5f5f5;
  }

  .custom-table tbody tr:nth-child(even) {
    background-color: #f8f9ff;
  }

  .custom-table tbody tr:hover {
    background-color: #f1f8e9;
    cursor: pointer;
  }

  .search-box {
    margin-bottom: 20px;
  }

  .search-box input {
    border-radius: 20px;
    border: 1px solid #dee2e6;
    padding: 8px 16px;
    width: 250px;
    background-color: white;
  }

  .sortable {
    cursor: pointer;
    position: relative;
    padding-right: 20px !important;
  }

  .sortable i {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    color: #fff;
    opacity: 0.5;
  }

  .sortable:hover i {
    opacity: 1;
  }

  .sort-active {
    background-color: #7cb342;
  }

  .sort-active i {
    opacity: 1;
  }

  .custom-table th {
    text-align: center;
    vertical-align: middle;
  }

  .custom-table td {
    vertical-align: middle;
  }

  .total-row {
    background-color: #f1f8e9 !important;
    font-weight: bold;
  }

  .custom-table thead tr:first-child th {
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
  }

  .custom-table thead th[rowspan="2"] {
    vertical-align: middle;
  }

  .alert {
    margin-bottom: 0;
    border: none;
    border-radius: 8px;
  }

  .alert-danger {
    background-color: #ffe8e8;
    color: #dc3545;
  }

  .alert-info {
    background-color: #f1f8e9;
    color: #8BC34A;
  }

  .spinner-border {
    width: 1.5rem;
    height: 1.5rem;
  }

  /* Ensure consistent height for empty states */
  #wakafTable tbody tr td[colspan="8"] {
    padding: 2rem;
  }

  /* Style for the clear search button */
  .btn-outline-primary {
    border-color: #8BC34A;
    color: #8BC34A;
  }

  .btn-outline-primary:hover {
    background-color: #8BC34A;
    color: white;
  }

  #wakafTable tbody tr td a:hover {
    color: #8BC34A !important;
  }

  .breadcrumb {
    background: none;
    padding: 0;
    margin-bottom: 1rem;
  }

  .breadcrumb-item + .breadcrumb-item::before {
    content: ">";
  }
</style>
