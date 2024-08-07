<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/be_travel_website/public/css/home/layout.css">
    <title>@yield('title')</title>
    @yield('styles') 
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-3 text-left">
                    <a class="navbar-brand" href="#">travelaja</a>
                </div>
                <div class="col-7">
                    <div class="d-flex justify-content-around">
                        <div class="col-auto">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                        </div>
                        <div class="col-auto">
                            <a class="nav-link {{ request()->is('discover') ? 'active' : '' }}" href="{{ url('/discover') }}">Discover</a>
                        </div>
                        <div class="col-auto">
                            <a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="{{ url('/services') }}">Services</a>
                        </div>
                        <div class="col-auto">
                            <a class="nav-link {{ request()->is('news') ? 'active' : '' }}" href="{{ url('/news') }}">News</a>
                        </div>
                        <div class="col-auto">
                            <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About Us</a>
                        </div>
                        <div class="col-auto">
                            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="col-2 d-flex align-items-center justify-content-end">
                    <img src="assets/home/news/VietNam.png" alt="icon" style="width: 24px; height: 24px; margin-right: 8px;">
                    <span class="me-2">ID</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container group pt-5 pb-5">
            <div class="group row">
                <div class="logo col-4">
                    <a href="{{ url('/') }}" class="fs-3">travelaja</a>
                    <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel</p>
                </div>
                <div class="links col-2">
                    <h5 class="mb-4 mt-2 fw-bold">Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/discover') }}">Discover</a></li>
                        <li><a href="{{ url('/special-deals') }}">Special Deals</a></li>
                        <li><a href="{{ url('/services') }}">Services</a></li>
                        <li><a href="{{ url('/community') }}">Community</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                    </ul>
                </div>
                <div class="services col-3">
                    <h5 class="mb-4 mt-2 fw-bold">Services</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li><a href="{{ url('/blog') }}">Blog & Articles</a></li>
                        <li><a href="{{ url('/terms') }}">Term and Condition</a></li>
                        <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="contact col-3">
                    <h5 class="mb-4 mt-2 fw-bold">Contact</h5>
                    <ul class="list-unstyled">
                        <li><p>Address: Jl.Codelaras No.205A</p></li>
                        <li><p>Kediri, Pare AG17</p></li>
                        <li><p>Phone: 123 456 7890</p></li>
                        <li><p>Email: myagungperdana@gmail.com</p></li>
                        <li><p>Maps: Kediri, East java</p></li>
                    </ul>
                </div>
            </div>
            <div class="social">
                <h4>Ikuti Kami</h4>
                <img class="img" src="assets/home/news/Frame 9.svg" />
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>