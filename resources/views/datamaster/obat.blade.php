@include('layouts.admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Obat Untuk Pasien</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Obat</li>
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
            <i class="fas fa-plus-circle"></i>  Tambah
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
              <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Oskadon</td>
                    <td>10000</td>
                    <td>10</td>
                    <td>mei mei sakit hati</td>
                    <td>
                        <a href="" class="btn btn-link text-info" data-toggle="modal" data-target="#editpasien"><i class="fas fa-edit"></i> Edit</a>
                        <button  class="btn btn-link text-danger"><i class="fas fa-trash"></i>  Delete</button>
                    </td>
                  </tr>
              <tr>
                <td>2.</td>
                <td>Oskadon</td>
                <td>10000</td>
                <td>10</td>
                <td>mei mei sakit hati part 2</td>
                <td>
                    <a href="" class="btn btn-link text-info" data-toggle="modal" data-target="#editpasien"><i class="fas fa-edit"></i> Edit</a>
                    <button  class="btn btn-link text-danger"><i class="fas fa-trash"></i>  Delete</button>
                </td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Oskadon</td>
                <td>10000</td>
                <td>10</td>
                <td>mei mei sakit hati jahat</td>
                <td>
                    <a href="" class="btn btn-link text-info" data-toggle="modal" data-target="#editpasien"><i class="fas fa-edit"></i> Edit</a>
                    <button  class="btn btn-link text-danger"><i class="fas fa-trash"></i>  Delete</button>
                </td>
              </tr>
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


<!-- Modal Pegawai -->
  <div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Obat Untuk Pasien</h4>
          {{-- kategori,harga,unit(sirup,kaplet,kapsul,tablet,obat oles,obat tetes,inhaler,obat suntik),stok,kadaluarsa --}}
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="namaobat">Pilih Obat</label>
                <select class="custom-select">
                    <option>Nama Obat</option>
                    <option>Nama Obat we</option>
                    <option>Nama Obate sopo</option>
                  </select>
            </div>

            <div class="form-group">
                <label for="namaobat">Jumlah Obat</label>
                <input type="text" id="" class="form-control" placeholder="Masukkan Jumlah Obat...">
            </div>

            <div class="form-group">
                <label for="catatanpasien">Catatan Pasien</label>
                <textarea name="catatanpasien" id="" cols="152" rows="3"></textarea>
            </div>

        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <!-- Modal Pegawai -->
  <div class="modal fade" id="editpasien">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Obat</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">

                <div class="form-group">
                    <label for="namaobat">Pilih Obat</label>
                    <select class="custom-select">
                        <option>Nama Obat</option>
                        <option>Nama Obat we</option>
                        <option>Nama Obate sopo</option>
                      </select>
                </div>

                <div class="form-group">
                    <label for="namaobat">Jumlah Obat</label>
                    <input type="text" id="" class="form-control" placeholder="Masukkan Jumlah Obat...">
                </div>

                <div class="form-group">
                    <label for="catatanpasien">Catatan Pasien</label>
                    <textarea name="catatanpasien" id="" cols="152" rows="3"></textarea>
                </div>

        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->



  </div>
  <!-- /.col -->

  {{-- script pagination --}}
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
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
