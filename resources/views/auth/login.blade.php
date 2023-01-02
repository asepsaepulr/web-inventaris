<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> ROOMZIO </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Favicon -->

    <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon.ico') }}"/>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <style>
      
        /* Split the screen in half */
        .split {
          height: 100%;
          width: 50%;
          position: fixed;
          z-index: 1;
          top: 0;
          overflow-x: hidden;
          padding-top: 20px;
        }

        /* Control the left side */
        .left {
          left: 0;
          background-color: white;
        }

        /* Control the right side */
        .right {
          right: 0;
          background: url("/images/login.svg");
          background-size:cover;
        }

        /* If you want the content centered horizontally and vertically */
        .centered {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align: left;
        }

        /* Style the image inside the centered container, if needed */
        .centered img {
          width: 3000px;
          border-radius: 50%;
        }

    </style>

  </head>

  <body>

    <div class="split left">

      <div class="centered">

        <h1 align="center">Sign In</h1>

        <form method="POST" action="{{ route('login') }}">

          @csrf

          <div class="form-group row">

            <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="">

              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')

                <span class="invalid-feedback" role="alert">

                  <strong>{{ $message }}</strong>

                </span>
                
              @enderror

            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
            </div>

            <div class="form-group row mt-3">

              <div class="col-lg-12 d-flex justify-content-between">

                <div class="form-check">

                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">

                    {{ __('Remember Me') }}

                  </label>

                </div>

                @if (Route::has('password.request'))

                  <a class="float-right" href="{{ route('password.request') }}">

                      {{ __('Forgot Your Password?') }}

                  </a>

                @endif

              </div>

            </div>

            <div class="form-group row mt-4 mb-0">

              <div class="col-md-8 offset-md-4">

                <button type="submit" class="btn btn-primary">

                  {{ __('Sign In') }}

                </button>

              </div>

            </div>

          </div>

        </form>

      </div>

    </div>

    <div class="split right"></div>

  </body>

</html>
