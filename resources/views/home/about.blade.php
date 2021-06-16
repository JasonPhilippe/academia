@extends('master',['title'=>'About'])
@section('content')
 <!-- hero -->
    <section class="cover overflow-hidden bg-primary text-white">
        <div class="container foreground">
            <div class="row align-items-center vh-lg-100">
                <div class="col-md-8 col-lg-6">
                    <h1 class="display-2 font-weight-bold">Passion Combined With Experience.</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid background" data-aos="fade-in" data-aos-delay="500">
            <div class="row justify-content-end">
                <div class="col-lg-6 vh-100 px-0">
                    <div class="row gutter-2 gutter-lg-4">
                        <div class="col-6" data-center-top="transform: translateY(0%);" data-top-bottom="transform: translateY(-10%);">
                            <img class="mb-2 mb-lg-4 floating" src="{{ asset('img/small-1.jpg') }}" alt="">
                            <img class="mb-2 mb-lg-4 floating" src="{{ asset('img/small-2.jpg') }}" alt="">
                            <img class="mb-2 mb-lg-4 floating" src="{{ asset('img/small-4.jpg') }}" alt="">
                            <img class="mb-2 mb-lg-4 floating" src="{{ asset('img/small-5.jpg') }}" alt="">
                        </div>
                        <div class="col-6" data-center-top="transform: translateY(-10%);" data-top-bottom="transform: translateY(10%);">
                            <img class="mb-2 mb-lg-4 floating" src="{{ asset('img/small-11.jpg') }}" alt="">
                            <img class="mb-2 mb-lg-4 floating" src="{{ asset('img/small-6.jpg') }}" alt="">
                            <img class="mb-2 mb-lg-4 floating" src="{{ asset('img/small-7.jpg') }}" alt="">
                            <img class="mb-2 mb-lg-4 floating" src="{{ asset('img/small-8.jpg') }}" alt="">
                            <img class="mb-2 mb-lg-4 floating" src="{{ asset('img/small-9.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- text -->
    <section class="border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="font-weight-bold">Brands, Products and Businesses for the digital age.</h2>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-8 mb-6 mb-lg-0">
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p class="lead text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi obcaecati dolores vel enim, quia minima error, est cumque nihil voluptas id voluptatibus exercitationem labore, qui nam amet tempore? Dolor, accusantium.</p>
                </div>
                <div class="col-md-8 col-lg-4">
                    <blockquote class="blockquote">
                        <p>“A new template inspired by the world’s best design practices.”</p>
                        <footer class="blockquote-footer">
                            <div class="d-flex align-items-center">
                                <img src="assets/images/demo/avatar-1.jpg" alt="Avatar" class="avatar">
                                <div class="ml-2">
                                    <p class="text-black mb-0 lh-1">Valerie Doe</p>
                                    <small>Creative Lead</small>
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>


    <!-- team -->
    <section class="bg-black text-white border-bottom overflow-hidden">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-8 mb-2 mb-lg-0">
                    <h4 class="font-weight-bold">Le secret de notre réussite réside dans les personnes qui se trouvent derrière l'écran.</h4>
                </div>
                <div class="col-lg-4 text-lg-right">
                    <a href="" class="action underline text-primary">View all 28 members<i class="icon-arrow-up-right"></i></a>
                </div>
            </div>
            <div class="row gutter-4 gutter-lg-6">
                <div class="col">
                    <div class="carousel-container carousel-container-visible">
                        <div class="carousel" data-carousel='{"controls": false, "responsive": {"0": {"items": 1, "gutter": 24}, "768": {"items": 2}, "1200": {"items": 3, "gutter": 48}}}'>
                            <div>
                                <a href="" class="card equal equal-3-4 hover-gradient hover-arrow text-white">
                                    <figure class="image" style="background-image: url('{{asset('img/team-1.jpg')}}')"></figure>
                                    <div class="card-footer text-shadow">
                                        <div>
                                            <h5 class="mb-0">Michael Doe</h5>
                                            <span class="text-muted">Creative Director</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="" class="card equal equal-3-4 hover-gradient hover-arrow text-white">
                                    <figure class="image" style="background-image: url('{{ asset('img/team-2.jpg') }}')"></figure>
                                    <div class="card-footer text-shadow">
                                        <div>
                                            <h5 class="mb-0">Michael Doe</h5>
                                            <span class="text-muted">Creative Director</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="" class="card equal equal-3-4 hover-gradient hover-arrow text-white">
                                    <figure class="image" style="background-image: url('{{ asset('img/team-3.jpg') }}')"></figure>
                                    <div class="card-footer text-shadow">
                                        <div>
                                            <h5 class="mb-0">Michael Doe</h5>
                                            <span class="text-muted">Creative Director</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="" class="card equal equal-3-4 hover-gradient hover-arrow text-white">
                                    <figure class="image" style="background-image: url('{{ asset('img/team-4.jpg') }}')"></figure>
                                    <div class="card-footer text-shadow">
                                        <div>
                                            <h5 class="mb-0">Michael Doe</h5>
                                            <span class="text-muted">Creative Director</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="" class="card equal equal-3-4 hover-gradient hover-arrow text-white">
                                    <figure class="image" style="background-image: url('{{ asset('img/team-5.jpg') }}')"></figure>
                                    <div class="card-footer text-shadow">
                                        <div>
                                            <h5 class="mb-0">Michael Doe</h5>
                                            <span class="text-muted">Creative Director</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- logo list -->
    <section class="pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-left mb-10 mb-lg-0">
                    <span class="eyebrow text-secondary">Awards</span>
                    <h2 class="font-weight-bold mt-1 mb-2">We were awarded by The FWA, Cannes Lions and 20+ local awards</h2>
                    <a href="" class="action underline">View all awards <i class="icon-arrow-up-right"></i></a>
                </div>
                <div class="col-lg-6">
                    <div class="row align-items-center gutter-6">
                        <div class="col"><div class="logo logo-sm"><img src="assets/images/logo/logo-1.svg" alt="Logo"></div></div>
                        <div class="col"><div class="logo logo-sm"><img src="assets/images/logo/logo-2.svg" alt="Logo"></div></div>
                        <div class="col"><div class="logo logo-sm"><img src="assets/images/logo/logo-3.svg" alt="Logo"></div></div>
                    </div>
                    <div class="row align-items-center gutter-6">
                        <div class="col"><div class="logo logo-sm"><img src="assets/images/logo/logo-4.svg" alt="Logo"></div></div>
                        <div class="col"><div class="logo logo-sm"><img src="assets/images/logo/logo-5.svg" alt="Logo"></div></div>
                        <div class="col"><div class="logo logo-sm"><img src="assets/images/logo/logo-1.svg" alt="Logo"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- instagram -->
    <section>
        <div class="container">
            <div class="row gutter-0 gallery">
                <div class="col-lg-3">
                    <a href="" class="card equal equal-2-1 equal-lg-1-1 text-white bg-primary hover-arrow">
                        <div class="card-header">
                            <i class="icon-instagram fs-32"></i>
                        </div>
                        <div class="card-footer">
                            <h5 class="eyebrow">@webuildthemes</h5>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <figure class="figure equal hover-opacity">
                        <a href="assets/images/insta-1.jpg" class="image" title="Image caption" style="background-image: url('assets/images/insta-1.jpg')">
                        </a>
                    </figure>
                </div>
                <div class="col-6 col-md-3">
                    <figure class="figure equal hover-opacity">
                        <a href="assets/images/insta-2.jpg" class="image" title="Image caption" style="background-image: url('assets/images/insta-2.jpg')">
                        </a>
                    </figure>
                </div>
                <div class="col-4 col-md-3">
                    <figure class="figure equal hover-opacity">
                        <a href="assets/images/insta-3.jpg" class="image" title="Image caption" style="background-image: url('assets/images/insta-3.jpg')">
                        </a>
                    </figure>
                </div>
                <div class="col-4 col-md-3">
                    <figure class="figure equal hover-opacity">
                        <a href="assets/images/insta-4.jpg" class="image" title="Image caption" style="background-image: url('assets/images/insta-4.jpg')">
                        </a>
                    </figure>
                </div>
                <div class="col-4 col-md-3">
                    <figure class="figure equal hover-opacity">
                        <a href="assets/images/insta-5.jpg" class="image" title="Image caption" style="background-image: url('assets/images/insta-5.jpg')">
                        </a>
                    </figure>
                </div>
                <div class="col-4 col-md-3">
                    <figure class="figure equal hover-opacity">
                        <a href="assets/images/insta-6.jpg" class="image" title="Image caption" style="background-image: url('assets/images/insta-6.jpg')">
                        </a>
                    </figure>
                </div>
                <div class="col-4 col-md-3">
                    <figure class="figure equal hover-opacity">
                        <a href="assets/images/insta-7.jpg" class="image" title="Image caption" style="background-image: url('assets/images/insta-7.jpg')">
                        </a>
                    </figure>
                </div>
                <div class="col-4 col-md-3 d-lg-none">
                    <figure class="figure equal hover-opacity">
                        <a href="assets/images/insta-8.jpg" class="image" title="Image caption" style="background-image: url('assets/images/insta-8.jpg')">
                        </a>
                    </figure>
                </div>
            </div>
        </div>
    </section>
@endsection
