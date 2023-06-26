@include("layouts.admin")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="assets/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tentang Saya </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Nama</strong>

                <p class="text-muted">
                 Fiki Hidayatullah
                </p>

                <hr>

                <strong><i class="fa fa-phone"></i> No Telpon</strong>

                <p class="text-muted">Malibu, California</p>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <form class="form-horizontal">

                        <div class="form-group row">
                            <label for="newpass" class="col-4 col-form-label">Nama </label>
                            <div class="col-8">
                                <input type="password" class="form-control here" name="current_password" id="current_password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpass" class="col-4 col-form-label">No Telp</label>
                            <div class="col-8">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button type="reset" class="btn btn-dark">Reset</button>
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>

                   </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">

                        <div class="form-group row">
                            <label for="newpass" class="col-4 col-form-label">Password Aktif </label>
                            <div class="col-8">
                                <input type="password" class="form-control here" name="current_password" id="current_password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpass" class="col-4 col-form-label">Password Baru</label>
                            <div class="col-8">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpass" class="col-4 col-form-label">Konfirmasi Password</label>
                            <div class="col-8">
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button type="reset" class="btn btn-dark">Reset</button>
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

