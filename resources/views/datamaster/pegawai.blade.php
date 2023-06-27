@include('layouts.admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
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
          <h3 class="card-title">Pegawai</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Role</th>
                <th>No Telp</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td>Update software</td>
                <td>080</td>
                <td>21-1-21</td>
                <td><span class="badge bg-danger">Pasif</span></td>
                <td>
                    <a href="" class="btn btn-link text-info" data-toggle="modal" data-target="#editpegawai"><i class="fas fa-edit"></i> Edit</a>
                    <button  class="btn btn-link text-danger"><i class="fas fa-trash"></i>  Delete</button>
                </td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Clean database</td>
                <td>22</td>
                <td>080</td>
                <td><span class="badge bg-warning">70%</span></td>
                <td>
                    <a href="" class="btn btn-link text-info"><i class="fas fa-edit"></i></a>
                    <button  class="btn btn-link text-danger"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Cron job running</td>
                <td>23</td>
                <td>080</td>
                <td><span class="badge bg-primary">30%</span></td>
                <td>
                    <a href="" class="btn btn-link text-info"><i class="fas fa-edit"></i></a>
                    <button  class="btn btn-link text-danger"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Fix and squish bugs</td>
                <td>24</td>
                <td>080</td>
                <td><span class="badge bg-success">90%</span></td>
                <td>
                    <a href="" class="btn btn-link text-info"><i class="fas fa-edit"></i></a>
                    <button  class="btn btn-link text-danger"><i class="fas fa-trash"></i></button>
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
          <h4 class="modal-title">Tambah Data Pegawai</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">

                <div class="row">
                    <div class="col-6">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama...">
                    </div>
                    <div class="col-6">
                      <label for="Nama">Role</label>
                      <select class="custom-select">
                        <option>Manajemen</option>
                        <option>Pegawai</option>
                      </select>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label for="nomertelponpegawai">No Telp</label>
                <input type="number" id="" class="form-control" placeholder="Masukkan NoTelp...">
            </div>

              {{-- <div class="form-group">
                <div class="row">
                    <div class="col-6">
                      <label for="date">Tanggal Lahir</label>
                      <input type="date" class="form-control" placeholder="Tanggal Lahir...">
                    </div>
                    <div class="col-6">
                        <label for="Nama">No Telp</label>
                        <input type="text" class="form-control" placeholder="Masukkan No Telp..">
                      </div>
                  </div>
              </div> --}}

            <div class="form-group">
                <label>Select Status</label>
                <select class="custom-select">
                  <option>Aktif</option>
                  <option>Tidak aktif</option>
                </select>
            </div>

          {{-- <p>One fine body&hellip;</p> --}}
        </div>
        <div class="modal-footer justify-content-between">
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
  <div class="modal fade" id="editpegawai">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Pegawai</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">

                <div class="row">
                    <div class="col-6">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama...">
                    </div>
                    <div class="col-6">
                      <label for="Nama">Role</label>
                      <select class="custom-select">
                        <option>Manajemen</option>
                        <option>Pegawai</option>
                      </select>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label for="nomertelponpegawai">No Telp</label>
                <input type="number" id="" class="form-control" placeholder="Masukkan NoTelp...">
            </div>

              {{-- <div class="form-group">
                <div class="row">
                    <div class="col-6">
                      <label for="date">Tanggal Lahir</label>
                      <input type="date" class="form-control" placeholder="Tanggal Lahir...">
                    </div>
                    <div class="col-6">
                        <label for="Nama">No Telp</label>
                        <input type="text" class="form-control" placeholder="Masukkan No Telp..">
                      </div>
                  </div>
              </div> --}}

              <div class="form-group">
                <label>Select Status</label>
                <select class="custom-select">
                  <option>Aktif</option>
                  <option>Tidak aktif</option>
                </select>
            </div>

          {{-- <p>One fine body&hellip;</p> --}}
        </div>
        <div class="modal-footer justify-content-between">
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
