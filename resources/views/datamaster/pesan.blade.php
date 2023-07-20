@include('layouts.admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Histori Chat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Histori Chat</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="col-12">
        <div class="card">
            @if (auth()->user()->is_manajemen == 1)
                {{-- Filter Pegawai --}}
                <div>
                    <select id="personFilter">
                        <option value="">Semua</option>
                        @foreach ($pegawai as $peg)
                            <option value={{ $peg->notelp_pegawai }}>{{ $peg->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- End Filter Pegawai --}}
            @endif
            <!-- /.card-header -->
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" id="example1">
                        <thead>
                            {{-- kategori,harga,unit(sirup,kaplet,kapsul,tablet,obat oles,obat tetes,inhaler,obat suntik),stok,kadaluarsa --}}
                            <tr>
                                <th>Tanggal Pesan direkam</th>
                                <th>Pengirim</th>
                                <th>Diterima Oleh</th>
                                <th>Isi Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesan as $item)
                            <tr>
                                <td> {{$item->waktu_pesan_dibuat}} </td>
                                <td> {{$item->sender}} </td>
                                <td> {{$item->target}} </td>
                                <td> {{$item->isi_pesan}} </td>
                            </tr>
                            </div>
                            <!-- /.col -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-bm float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- /.card -->


            {{-- script pagination --}}
            <script>
                $(document).ready(function() {
                        var table = $("#example1").DataTable({
                            "responsive": true,
                            "lengthChange": false,
                            "autoWidth": false,
                            "dom": 'lrt',
                            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                            columnDefs: [
                                { targets: 0, type: 'date' }, // Assuming "time" column is at index 0 and it contains date values
                                { targets: [1, 2, 3] } // Assuming "sender", "target", and "status" columns are at indexes 1, 2, and 3 respectively, and they are not searchable
                            ]
                        });
                        // .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        // $('#tabelpegawai').DataTable({
                        //     "paging": true,
                        //     "lengthChange": false,
                        //     "searching": false,
                        //     "ordering": true,
                        //     "info": true,
                        //     "autoWidth": false,
                        //     "responsive": true,
                        // });

                    // $('#personFilter').on('change', function() {
                    //     var personNumber = $(this).val();

                    //     if (personNumber !== '') {
                    //         table
                    //             .columns(1) // Assuming "sender" column is at index 1
                    //             .search('^' + personNumber + '$', true, false)
                    //             .columns(2) // Assuming "target" column is at index 2
                    //             .search('^' + personNumber + '$', true, false)
                    //             .draw();
                    //     } else {
                    //         // Show all pesan data when no person is selected
                    //         table
                    //             .columns(1)
                    //             .search('')
                    //             .columns(2)
                    //             .search('')
                    //             .draw();
                    //     }
                    // });

                    $('#personFilter').on('change', function() {
                        var personNumber = $(this).val();

                        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                            if (personNumber === '') {
                                return true; // Show all rows when no person is selected
                            }

                            var senderValue = data[1]; // Assuming "sender" column is at index 1
                            var targetValue = data[2]; // Assuming "target" column is at index 2

                            return senderValue === personNumber || targetValue === personNumber;
                        });

                        table.draw();

                        $.fn.dataTable.ext.search.pop();
                    });
            });
            </script>
