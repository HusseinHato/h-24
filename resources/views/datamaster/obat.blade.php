@include('layouts.admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Penjualan Obat</h1>
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
                <th>ID Pembelian</th>
                <th>Tanggal Pembelian</th>
                <th>Pasien</th>
                <th>Obat</th>
                <th>Total Harga</th>
                <th>Catatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pembelian as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tgl_pembelian }}</td>
                    <td>{{ $item->pasien->nama_pasien }}</td>
                    <td>@foreach($item->obats as $detail)
                      - {{ $detail->nama_obat }} x {{ $detail->pivot->jumlah_pembelian }} = Rp{{ $detail->pivot->subtotal_pembelian }}<br>
                      Estimasi Habis : {{ $detail->pivot->estimasi_obat_habis }} <br>
                      @endforeach
                    </td>
                    {{-- <td>{{ $item->catatan }}</td> --}}
                    <td>Rp{{ $item->total_harga_pembelian }}</td>
                    <td>{{ $item->catatan }}</td>
                    <td>
                      <a href="" class="btn btn-link text-info" data-toggle="modal"
                      data-target="#edit{{$item->id}}"><i class="fas fa-edit"></i>Edit</a>
                    </td>
                </tr>
                  <!-- Modal edit pembelian -->
                  <div class="modal fade" id="edit{{ $item->id }}">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Data Obat Untuk Pasien</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="/updatepembelian" method="post">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="idpembelian">
                            <div class="form-group">
                              <label for="namaobat">Pilih Pasien</label>
                              <select name="pasien" class="custom-select">
                                @foreach($pasien as $items)
                                  <option @if($item->pasien_id === $items->id)selected @endif value="{{ $items->id }}">{{ $items->nama_pasien }}</option>
                                @endforeach
                                </select>
                          </div>

                          @foreach($item->obats as $detail)
                          <div class="d-flex">
                            <div class="form-group-md-2 p-1">
                              <label for="namaobat">Pilih Obat</label>
                              <select name="obat[]" class="custom-select obat" id="obat">
                                <option>Pilih Obat</option>
                                @foreach($obat as $items)
                                  <option @if($detail->id == $items->id)selected @endif value="{{ $items->id }}" data-stok="{{ $items->stok_obat }}">{{ $items->nama_obat }}</option>
                                @endforeach
                              </select>
                              <span class="form-group p-1 mt-1 stok">Stok:</span>
                            </div>

                            <div class="form-group-md-2 p-1">
                              <label for="jumlah">Jumlah</label>
                              <input type="text" value="{{ $detail->pivot->jumlah_pembelian }}" class="form-control" name="jumlah[]" id="jumlah">
                            </div>

                            <div class="form-group-md-2 p-1">
                              <label for="jumlah">Estimasi Habis</label>
                              <input type="date" value="{{ $detail->pivot->estimasi_obat_habis }}" class="form-control" name="est[]">
                            </div>
                          </div>
                          @endforeach

                          <div class="form-group">
                            <label for="catatanpasien">Catatan Pasien</label>
                            <input class="form-control" name="catatan" value="{{ $item->catatan }}">
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


<!-- Modal tambah data pembelian -->
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
          <form action="/addpembelian" method="post">
            @csrf
            <div class="form-group">
              <label for="namaobat">Pilih Pasien</label>
              <select name="pasien" class="custom-select">
                @foreach($pasien->where('status_pasien', 1) as $item)
                  <option value="{{ $item->id }}" >{{ $item->nama_pasien }}</option>
                @endforeach
                </select>
          </div>

          <div class="d-flex">
            <div class="form-group-md-2 p-1">
              <label for="namaobat">Pilih Obat</label>
              <select name="obat[]" class="custom-select obat" id="obat">
                <option>Pilih Obat</option>
                @foreach($obat as $item)
                  <option value="{{ $item->id }}" data-stok="{{ $item->stok_obat }}">{{ $item->nama_obat }}</option>
                @endforeach
              </select>
              <span class="form-group p-1 mt-1 stok">Stok: </span>
            </div>

            <div class="form-group-md-2 p-1">
              <label for="jumlah">Jumlah</label>
              <input type="number"  class="form-control" name="jumlah[]" id="jumlah" max={{ $item->stok_obat }} required>
            </div>

            <div class="form-group-md-2 p-1">
              <label for="estim">Estimasi Habis</label>
              <input type="date" class="form-control" name="est[]" id="estim" required>
            </div>
          </div>

          <div id="tambah-obat"></div>

          <button type="button" class="btn btn-primary" id="btn-tambah-obat">Tambah Obat</button>

          <div class="form-group">
            <label for="catatanpasien">Catatan Pasien</label>
            <textarea name="catatan" id="" cols="152" rows="3" required></textarea>
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
<script>
  $(document).ready(function() {
  $(document).on('change', '.obat', function() {
  var selectedOption = $(this).find('option:selected');
  var stok = selectedOption.attr('data-stok');
  $(this).closest('.d-flex').find('.stok').text('Stok: ' + stok);
  });

  $(document).on('click', '.hapus-baris', function() {
  $(this).closest('.d-flex').remove();
});



  // Menambahkan baris tambahan saat tombol "Tambah Obat" ditekan
  $('#btn-tambah-obat').click(function() {
    var tambahObat = `
      <div class="d-flex">
        <div class="form-group-md-2 p-1">
          <label for="namaobat">Pilih Obat</label>
          <select name="obat[]" class="custom-select obat" id="obat">
            <option>Pilih Obat</option>
            @foreach($obat as $item)
              <option value="{{ $item->id }}" data-stok="{{ $item->stok_obat }}">{{ $item->nama_obat }}</option>
            @endforeach
          </select>
          <span class="form-group p-1 mt-1 stok">Stok: </span>
        </div>

        <div class="form-group-md-2 p-1">
          <label for="jumlah">Jumlah</label>
          <input type="text" class="form-control" name="jumlah[]" id="jumlah">
        </div>

        <div class="form-group-md-2 p-1">
              <label for="jumlah">Estimasi Habis</label>
              <input type="date" class="form-control" name="est[]">
            </div>

        <button type="button" style="height: fit-content;" class="btn btn-sm btn-danger hapus-baris">
          <i class="fas fa-times"></i>
        </button>
      </div>
    `;

    $('#tambah-obat').append(tambahObat);
  });
});

</script>
