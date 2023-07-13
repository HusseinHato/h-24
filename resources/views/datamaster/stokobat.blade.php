@include('layouts.admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Stok Obat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Stok Obat</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title">DataTable Pegawai</h3> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                    <i class="fas fa-plus-circle"></i> Tambah
                </button>
                {{-- <a href = "" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a> --}}
            </div>
            <!-- /.card-header -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Obat</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            {{-- kategori,harga,unit(sirup,kaplet,kapsul,tablet,obat oles,obat tetes,inhaler,obat suntik),stok,kadaluarsa --}}
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok Obat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($obat as $item)
                            <tr>
                                <td> {{$item->id}} </td>
                                <td> {{$item->nama_obat}} </td>
                                <td> {{$item->kategori_obat}} </td>
                                <td> {{$item->harga_obat}} </td>
                                <td> {{$item->stok_obat}} </td>
                                <td>
                                    <a href="" class="btn btn-link text-info" data-toggle="modal"
                                        data-target="#editpasien{{$item->id}}"><i class="fas fa-edit"></i>Edit</a>
                                    @if($item->stok_obat>0)
                                    <button type="button" class="btn btn-success">Tersedia <span
                                            class="badge"></span></button>
                                    @else
                                    <button type="button" class="btn btn-danger">Habis <span
                                        class="badge"></span></button>
                                    @endif
                                </td>
                            </tr>
                            <!-- Modal Edit Obat -->
                            <div class="modal fade" id="editpasien{{$item->id}}">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Data Stok Obat</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/editobat" method="post">
                                                @csrf
                                            <div class="form-group">
                                                <label for="namaobat">Nama Obat</label>
                                                <input type="text" name="id" value="{{$item->id}}" hidden>
                                                <input type="text" name="nama" value="{{$item->nama_obat}}" id="" class="form-control"
                                                    placeholder="Masukkan Nama Obat..." required>
                                            </div>

                                            <div class="form-group">
                                                <label>Kategori Obat</label>
                                                <select name="kategori" class="custom-select"required>
                                                    <option @if($item->kategori_obat == 'Sirup')selected @endif value="Sirup">Sirup</option>
                                                    <option @if($item->kategori_obat == 'Kaplet')selected @endif value="Kaplet">Kaplet</option>
                                                    <option @if($item->kategori_obat == 'Kapsul')selected @endif value="Kapsul">Kapsul</option>
                                                    <option @if($item->kategori_obat == 'Tablet')selected @endif value="Tablet">Tablet</option>
                                                    <option @if($item->kategori_obat == 'Obat Oles')selected @endif value="Obat Oles">Obat Oles</option>
                                                    <option @if($item->kategori_obat == 'Obat Tetes')selected @endif value="Obat Tetes">Obat Tetes</option>
                                                    <option @if($item->kategori_obat == 'Obat Inhaler')selected @endif value="Obat Inhaler">Obat Inhaler</option>
                                                    <option @if($item->kategori_obat == 'Obat Suntik')selected @endif value="Obat Suntik">Obat Suntik</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="hargaobat">Harga Obat</label>
                                                <input type="number" value="{{$item->harga_obat}}" name="harga" id="" class="form-control"
                                                    placeholder="Masukkan Harga Obat..."required>
                                            </div>

                                            <div class="form-group">
                                                <label for="stokobat">Stok</label>
                                                <input type="number" value="{{$item->stok_obat}}" name="stok" id="" class="form-control"
                                                    placeholder="Masukkan Stok Obat..."required>
                                            </div>

                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
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
            <!-- /.card -->


            <!-- Modal Tambah Pegawai -->
            <div class="modal fade" id="modal-xl">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Stok Obat</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/addobat" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="namaobat">Nama Obat</label>
                                <input type="text" name="nama" id="" class="form-control"
                                    placeholder="Masukkan Nama Obat..."required>
                            </div>

                            <div class="form-group">
                                <label>Kategori Obat</label>
                                <select name="kategori" class="custom-select"required>
                                    <option value="Sirup">Sirup</option>
                                    <option value="Kaplet">Kaplet</option>
                                    <option value="Kapsul">Kapsul</option>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Obat Oles">Obat Oles</option>
                                    <option value="Obat Tetes">Obat Tetes</option>
                                    <option value="Obat Inhaler">Obat Inhaler</option>
                                    <option value="Obat Suntik">Obat Suntik</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="hargaobat">Harga Obat</label>
                                <input type="number" name="harga" id="" class="form-control"
                                    placeholder="Masukkan Harga Obat..."required>
                            </div>

                            <div class="form-group">
                                <label for="stokobat">Stok</label>
                                <input type="number" name="stok" id="" class="form-control"
                                    placeholder="Masukkan Stok Obat..."required>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


            {{-- script pagination --}}
            <script>
                $(function() {
                    $("#example1").DataTable({
                        "responsive": true,
                        "lengthChange": false,
                        "autoWidth": false,
                        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    $('#tabelpegawai').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                    });
                });
            </script>
