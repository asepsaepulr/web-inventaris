<!doctype html>

<html lang="en" dir="ltr">

   <head>
      
      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title> ROOMZIO </title>

      <!-- Favicon -->
      <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon.ico') }}"/>

      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="{{ asset('css/core/libs.min.css') }}" />


      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="{{ asset('css/hope-ui.min.css?v=1.2.0') }}" />

      <!-- Custom Css -->
      <link rel="stylesheet" href="{{ asset('css/custom.min.css?v=1.2.0') }}" />

      <!-- Dark Css -->
      <link rel="stylesheet" href="{{ asset('css/dark.min.css') }}"/>

      <!-- Customizer Css -->
      <link rel="stylesheet" href="{{ asset('css/customizer.min.css') }}" />

      <!-- RTL Css -->
      <link rel="stylesheet" href="{{ asset('css/rtl.min.css') }}"/>

   </head>

   <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
      <!-- loader Start -->
      <div id="loading">
      <div class="loader simple-loader">
            <div class="loader-body"></div>
      </div>    </div>
      <!-- loader END -->

      <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white vh-100">
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="{{ asset('images/auth/02.png') }}" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div>
            <div class="col-md-6 p-0">
               <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                  <div class="card-body">
                     <h2 class="mb-2">Reset Password</h2>
                     <p>Enter your email address and we'll send you an email with instructions to reset your password.</p>
                     <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                        </div>
                     @endif
                           <div class="col-lg-12">
                              <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-6">
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                        </div>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Reset</button>
                     </form>
                  </div>
               </div>
               <div class="sign-bg sign-bg-right">
                  <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g opacity="0.05">
                     <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
                     <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
                     <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
                     <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
                     </g>
                  </svg>
               </div>
            </div>
         </div>
      </section>
      </div>

      <!-- Library Bundle Script -->
      <script src="{{ asset('js/core/libs.min.js') }}"></script>

      <!-- External Library Bundle Script -->
      <script src="{{ asset('js/core/external.min.js') }}"></script>

      <!-- Widgetchart Script -->
      <script src="{{ asset('js/charts/widgetcharts.js') }}"></script>

      <!-- mapchart Script -->
      <script src="{{ asset('js/charts/vectore-chart.js') }}"></script>
      <script src="{{ asset('js/charts/dashboard.js') }}" ></script>

      <!-- fslightbox Script -->
      <script src="{{ asset('js/plugins/fslightbox.js') }}"></script>

      <!-- Settings Script -->
      <script src="{{ asset('js/plugins/setting.js') }}"></script>

      <!-- Slider-tab Script -->
      <script src="{{ asset('js/plugins/slider-tabs.js') }}"></script>

      <!-- Form Wizard Script -->
      <script src="{{ asset('js/plugins/form-wizard.js') }}"></script>

      <!-- AOS Animation Plugin-->

      <!-- App Script -->
      <script src="{{ asset('js/hope-ui.js') }}" defer></script>
   </body>

</html>
