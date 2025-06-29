<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('template/assets')}}/img/favicon.png" rel="icon">
  <link href="{{ asset('template/assets')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('template/assets')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('template/assets')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('template/assets')}}/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('template/assets')}}/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ asset('template/assets')}}/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('template/assets')}}/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('template/assets')}}/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('template/assets')}}/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Berlin FC</span>
                </a>
              </div>

              <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Masuk ke akun Anda</h5>
                    <p class="text-center small">Masukkan E-mail dan Password untuk Masuk</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}"
                          required autofocus>
                        @error('email')
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required
                        autocomplete="new-password">
                      @error('password')
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
                    </div>


                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Masuk</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href=https://www.instagram.com/vicidiorrr/>YTTA</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/assets')}}/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('template/assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('template/assets')}}/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ asset('template/assets')}}/vendor/echarts/echarts.min.js"></script>
  <script src="{{ asset('template/assets')}}/vendor/quill/quill.js"></script>
  <script src="{{ asset('template/assets')}}/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ asset('template/assets')}}/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ asset('template/assets')}}/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('template/assets')}}/js/main.js"></script>

</body>

</html>