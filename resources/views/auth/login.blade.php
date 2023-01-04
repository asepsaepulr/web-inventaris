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

          <div class="row">

              <div class="col-lg-12 mt-1">

                <div class="form-group">

                    <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>

                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" aria-describedby="email" required autocomplete="email" autofocus>
                
                    @error('email')

                      <span class="invalid-feedback" role="alert">

                        <strong>{{ $message }}</strong>

                      </span>
                      
                    @enderror

                  </div>

              </div>

              <div class="col-lg-12 mt-1">

                <div class="form-group">

                    <label for="password" class="form-label">{{ __('Password') }}</label>

                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" aria-describedby="password" required autocomplete="current-password">

                    @error('password')

                      <span class="invalid-feedback" role="alert">

                        <strong>{{ $message }}</strong>
                        
                      </span>

                    @enderror

                </div>

              </div>

              <div class="col-lg-12 mt-3 d-flex justify-content-between">

                <div class="form-check mb-3">

                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>

                </div>

                @if (Route::has('password.request'))

                  <a href="{{ route('password.request') }}">

                      {{ __('Forgot Your Password?') }}

                  </a>

                @endif

              </div>

              <div class="col-lg-12 d-flex justify-content-between" >

                <button type="submit" class="btn btn-primary" style="width:100%">

                  {{ __('Sign In') }}

                </button>

              </div>

          </div>

        </form>

      </div>

    </div>

    <div class="split right"></div>

  </body>

</html>
