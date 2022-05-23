<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/booku.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap" rel="stylesheet">

    <title>BookU {{ $title }}</title>
  </head>
  <body>
    {{-- Flash --}}
    

    <div class="global-container container-md">
        <div class="image">
            <img src="img/bookulogo.png" alt="img1" width="80%">
        </div>
        <div class="card login-form container-md">
            <div class="card-body">
                <h1 class="card-title text-center">
                    BookU
                </h1>
            
            {{-- Flask Message --}}
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismis="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismis="alert" aria-label="Close"></button>
                </div>
            @endif

        {{-- main --}}
        <main class="form-signin mt-5">
            <form action="/login" method="POST">
                @csrf

                <div class="form-floating d-flex mb-3">
                    <span class="input-group-text" id="basic-addon1"><img src="img/email.png" alt="img2" width="20px"></span>
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" @error('email') is-invalid @enderror required value="{{ old('email') }}">
                    <label for="email" style="margin-left:40px;">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating d-flex mb-3">
                    <span class="input-group-text" id="basic-addon2"><img src="img/key.png" alt="img2" width="20px"></span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" @error('password') is-invalid @enderror required >
                    <label for="password" style="margin-left: 40px">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg text-light" style="background-color: #FA784A" type="submit">Sign in</button>
              </form>
            {{-- <div class="card-text mt-5 container-md">
                <form action="/login" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><img src="img/email.png" alt="img2" width="20px"></span>

                        <div class="form-floating" style="width: 89.9%;">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required value="{{ old('username') }}">
                            <label class="label-login" for="username">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                      
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2"><img src="img/key.png" alt="img2" width="20px"></span>

                        <div class="form-floating" style="width: 89.9%;">
                            <input type="password" class="form-control" id="password" placeholder="Password" required>
                            <label class="label-login" for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                        </div>

                        <div class="">
                            <a href="">Forgot Password?</a>
                        </div>
                    </div>

                    
                    <button type="submit" class="btn login-button">Sign In</button>
                  </form>
            </div> --}}
        </main>
            </div>
        </div>
    </div>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>