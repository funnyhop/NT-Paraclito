<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    <!-- Bootstrap css 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background-image: url('{{ asset('images/bg-login.jpg') }}'); background-size: 38cm 16.18cm;">
<div class="d-block pt-5">
    <div>
        <img src="{{ asset('images/logo-nha-hang.png') }}" alt="logo"
        class="" style="width: 70px; height: 70px; border-radius:50%;margin-left: 47%;">
    </div>
    <div class="d-flex justify-content-center text-info" style="padding-top:2rem">
        <div class="card bg-light mb-3" style="width: 40%;">
            <div class="card-body" style="background-color: #ECE4D9">
                <h5 class="text-center"><b class="card-title" style="font-family:Figtree; color:brown">Đăng nhập</b></h5>
                <form action="{{ route('login') }}" method="POST">
                    {{-- @csrf --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="">
                        <div class="form-group">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4"
                                placeholder="Email">
                        </div>
                        <div class="form-group pb-2">
                            <label for="inputPassword4">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword4"
                                placeholder="Password">
                        </div>
                        @if (isset($errors))
                            <p style="color: #D7261E">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br />
                                @endforeach
                            </p>
                        @endif
                        @if (isset($message))
                            <p style="color: #D7261E">
                                {{ $message }}
                            </p>
                        @endif
                    </div>
                    <button style="font-family: scandia-web; font-size:17px; width: 100%;" type="submit" class="btn btn-primary">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html>
