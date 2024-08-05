<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
    <link rel="stylesheet" href="css/auth/layout.css">
    @yield('styles') 
</head>
<body>
    <div class="account">
        <div class="container-fluid">
            <div class="row w-100 vh-100">
                <div class="col-md-7 col-lg-6 d-flex align-items-center justify-content-center login-form">
                    @yield('content')
                </div>
                <div class="d-none d-md-block col-md-5 col-lg-6 image-container">
                    <img src="assets/auth/image1.png" alt="Leaf Image">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
