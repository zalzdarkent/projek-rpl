<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Login | {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/ujayyy.png') }}">
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="css/app.css" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        .modal-dialog-custom {
            max-width: 380px;
            margin: auto;
        }

        .modal-content-custom {
            text-align: center;
            border-radius: 10px;
        }

        .modal-header-custom {
            display: flex;
            justify-content: center;
            background-color: white;
            border-bottom: none;
        }

        .modal-body-custom {
            padding: 2rem;
        }

        .modal-footer-custom {
            justify-content: center;
            border-top: none;
        }

        .modal-footer-custom .btn-primary {
            background-color: #0000FF;
            border-color: #0000FF;
            padding: 0.5rem 2rem;
            border-radius: 10px;
        }

        .modal-footer-custom .btn-primary:hover {
            background-color: #0000AA;
            border-color: #0000AA;
        }

        .modal-icon {
            width: 50px;
            height: 50px;
        }

        .modal-close {
            position: absolute;
            right: 1rem;
            top: 1rem;
            font-size: 1.5rem;
            color: #000;
        }
    </style>
</head>

<body class="c-app flex-row align-items-center">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-center">
                <img width="200" src="{{ asset('images/ujaylogin.png') }}" alt="Logo">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card p-4 border-0 shadow-sm">
                    <div class="card-body">
                        <form id="login" method="post" action="{{ route('masuk') }}">
                            @csrf
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>
                                </div>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                </div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                    name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember"
                                    style="width: 20px; height: 20px;">
                                <label class="form-check-label" name="remember" for="remember"
                                    style="margin-left: 5px;">Remember Me</label>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button id="submit" class="btn btn-primary px-4 d-flex align-items-center"
                                        type="submit">
                                        Login
                                        <div id="spinner" class="spinner-border text-info" role="status"
                                            style="height: 20px;width: 20px;margin-left: 5px;display: none;">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Alert Login Gagal --}}
    <div class="modal fade" id="loginErrorModal" tabindex="-1" role="dialog" aria-labelledby="loginErrorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-custom" role="document">
            <div class="modal-content modal-content-custom">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title" id="loginErrorModalLabel">Login gagal, silahkan ulangi!</h5>
                    <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-body-custom">
                    <img src="images/tandasilang.png" alt="Error Icon" class="modal-icon">
                </div>
                <div class="modal-footer modal-footer-custom">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    @if (session('error'))
        <script>
            $(document).ready(function() {
                $('#loginErrorModal').modal('show');
            });
        </script>
    @endif

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- CoreUI -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script>
        let login = document.getElementById('login');
        let submit = document.getElementById('submit');
        let email = document.getElementById('email');
        let password = document.getElementById('password');
        let spinner = document.getElementById('spinner')

        login.addEventListener('submit', (e) => {
            submit.disabled = true;
            email.readOnly = true;
            password.readOnly = true;

            spinner.style.display = 'block';

            login.submit();
        });

        setTimeout(() => {
            submit.disabled = false;
            email.readOnly = false;
            password.readOnly = false;

            spinner.style.display = 'none';
        }, 3000);
    </script>

</body>

</html>
