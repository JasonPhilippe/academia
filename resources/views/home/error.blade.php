@extends('master',['title'=>'About'])
@section('content')
    <!-- hero -->
    <section class="cover text-white">
        <div class="container foreground">
            <div class="row align-items-center vh-100">
                <div class="col">
                    <div class="row align-items-center justify-content-center justify-content-lg-between">
                        <div class="col-lg-6 order-lg-2">
                            <img src="{{ asset('img/figure-3.svg') }}" alt="Figure">
                        </div>
                        <div class="col-md-8 col-lg-5 order-lg-1 text-center text-lg-left">
                            <h1 class="display-2 font-weight-bold">Sorry, page not found.</h1>
                            <a href="{{ route('home') }}" class="btn btn-rounded btn-outline-white">Go back to homepage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
