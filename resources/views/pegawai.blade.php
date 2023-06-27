@include('layouts.admin')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>10</h3>

                <p>Data Pegawai</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="/pegawai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53</h3>

                <p>Data Obat</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/obat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Data Pasien</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>

              <a href="/pasien" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

        </div>
        <!-- /.row -->

        <div id="card">
            <h2>Pilih Tanggal:</h2>
            <input type="date" id="tanggal" onchange="updateChart()" />

            <div id="chart-container">
              <canvas id="myChart"></canvas>
            </div>
        </div>


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
                      <th>Pegawai</th>
                      <th>Total Pasien</th>
                      <th>Seberapa Cepat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>21</td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Clean database</td>
                      <td>22</td>
                      <td><span class="badge bg-warning">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Cron job running</td>
                      <td>23</td>
                      <td><span class="badge bg-primary">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Fix and squish bugs</td>
                      <td>24</td>
                      <td><span class="badge bg-success">90%</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
        <!-- /.card -->




      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

{{-- script pagination
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script> --}}


{{-- script chartjs --}}
<script>
    // Data grafik batang
    var data = {
      labels: ['Husein', 'Prama', 'Fiki', 'Tsalas' , 'Zaqy'],
      datasets: [{
        label: 'Seberapa Cepat',
        data: [10, 20, 30, 40, 50],
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      },
      {
        label: 'Data Pasien',
        data: [15, 25, 35 , 45, 55],
        backgroundColor: 'rgba(192, 75, 192, 0.2)',
        borderColor: 'rgba(192, 75, 192, 1)',
        borderWidth: 1
      },
      {
        label: 'Data Obat',
        data: [5, 15, 25, 35, 45, 55],
        backgroundColor: 'rgba(192, 192, 75, 0.2)',
        borderColor: 'rgba(192, 192, 75, 1)',
        borderWidth: 1
      }]
    };

    // Pengaturan grafik batang
    var options = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    };

    // Membuat grafik batang awal
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: options
    });

    // Fungsi untuk memperbarui grafik batang berdasarkan tanggal yang dipilih
    function updateChart() {
      var selectedDate = document.getElementById('tanggal').value;
      var newData1 = [5, 10, 15, 20, 25];  // Mengganti dengan data yang sesuai dengan tanggal yang dipilih
      var newData2 = [10, 20, 30, 40, 50];  // Mengganti dengan data yang sesuai dengan tanggal yang dipilih
      var newData3 = [15, 25, 35, 45, 55];  // Mengganti dengan data yang sesuai dengan tanggal yang dipilih

      // Memperbarui data grafik batang
      myChart.data.datasets[0].data = newData1;
      myChart.data.datasets[1].data = newData2;
      myChart.data.datasets[2].data = newData3;
      myChart.update();
    }
  </script>
