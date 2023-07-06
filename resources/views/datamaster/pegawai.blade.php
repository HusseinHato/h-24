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
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pegawai as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>@if($item->is_manajemen == 0)Pegawai @else Manajemen @endif</td>
                <td>{{ $item->notelp_pegawai }}</td>
                <td>{{ $item->email }}</td>
                <td>@if($item->status_pegawai == 1)Aktif @else Pasif @endif
                <td>
                    <a class="btn btn-link text-info" data-toggle="modal" data-target="#editpegawai{{ $item->id }}"><i class="fas fa-edit"></i> Edit</a>
                    <form action="{{ route('user.destroy',$item->id) }}" method="Post">
                      @csrf
                      @method('DELETE')
                      <button  class="btn btn-link text-danger"><i class="fas fa-trash"></i>  Delete</button>
                    </form>
                   
                </td>
              </tr>

              <!-- Modal Pegawai -->
              <div class="modal fade" id="editpegawai{{ $item->id }}">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data Pegawai</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/editpegawai" method="post">
                      @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="Nama">Nama</label>
                                    <input name="id" value="{{ $item->id }}" hidden>
                                    <input value="{{ $item->name }}" name="nama" type="text" class="form-control" placeholder="Masukkan Nama...">
                                </div>
                                <div class="col-6">
                                  <label for="Nama">Role</label>
                                  <select name="role" class="custom-select">
                                    <option @if($item->is_manajemen == 1)selected @endif value="1">Manajemen</option>
                                    <option @if($item->is_manajemen == 0)selected @endif value="0">Pegawai</option>
                                  </select>
                                </div>
                              </div>
                          </div>

                          <div class="form-group">
                            <label for="nomertelponpegawai">No Telp</label>
                            <input value="{{ $item->notelp_pegawai }}" name="notelp" type="number" id="" class="form-control" placeholder="Masukkan NoTelp...">
                        </div>

                        <div class="form-group">
                          <label for="nomertelponpegawai">Email</label>
                          <input value="{{ $item->email }}" name="email" type="text" id="" class="form-control" placeholder="Masukkan Email...">
                      </div>

                        <div class="form-group">
                            <label>Select Status</label>
                            <select name="status" class="custom-select">
                              <option @if ($item->status_pegawai == 1)selected @endif value="1">Aktif</option>
                              <option @if ($item->status_pegawai == 0)selected @endif value="0">Tidak aktif</option>
                            </select>
                        </div>

                      {{-- <p>One fine body&hellip;</p> --}}
                    </div>
                    <div class="modal-footer justify-content-start">
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
        <form action="/addpegawai" method="post">
          @csrf
        <div class="modal-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="Nama">Nama</label>
                        <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama...">
                    </div>
                    <div class="col-6">
                      <label for="Nama">Role</label>
                      <select name="role" class="custom-select">
                        <option value="1">Manajemen</option>
                        <option value="0">Pegawai</option>
                      </select>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label for="nomertelponpegawai">No Telp</label>
                <input name="notelp" type="number" id="" class="form-control" placeholder="Masukkan NoTelp...">
            </div>

            <div class="form-group">
              <label for="nomertelponpegawai">Email</label>
              <input name="email" type="text" id="" class="form-control" placeholder="Masukkan Email...">
          </div>

          <div class="form-group">
            <label for="nomertelponpegawai">Password</label>
            <input name="password" type="text" id="" class="form-control" placeholder="Masukkan Password...">
        </div>

            <div class="form-group">
                <label>Select Status</label>
                <select name="status" class="custom-select">
                  <option value="1">Aktif</option>
                  <option value="0">Tidak aktif</option>
                </select>
            </div>

          {{-- <p>One fine body&hellip;</p> --}}
        </div>
        <div class="modal-footer justify-content-start">
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
