<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registrasi Akun</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('Auth/registrasi') ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Nama Anda ...." name="nama" value="<?= set_value('nama') ?>">
                  <div class="text-danger small ml-3"><?= form_error('nama') ?></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Username Anda ...." name="username" value="<?= set_value('username') ?>">
                  <div class="text-danger small ml-3"><?= form_error('username') ?></div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    <div class="text-danger small ml-3"><?= form_error('password') ?></div>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulangi Password" name="password2">
                    <div class="text-danger small ml-3"><?= form_error('password2') ?></div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Buat Akun!
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('Auth/login') ?>">Sudah Punya Akun? Silahkan Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>