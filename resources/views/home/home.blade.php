@extends('master',['title'=>'Home'])
@section('content')
    <!-- hero -->
    <section class="cover">
        <div class="container foreground">
            <div class="row align-items-center justify-content-center justify-content-lg-between vh-100">
                <div class="col-md-8 col-lg-6 order-lg-2 mb-5 mb-lg-0">
                    <img src="{{ asset('img/figure-12.svg') }}" alt="Illustration">
                </div>
                <div class="col-md-10 col-lg-6 pr-lg-6 text-center text-lg-left">
                    <h1 class="font-weight-bold">Un meilleur flux de travail pour votre université</h1>
                    <p class="lead text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum dolore provident corrupti consectetur a quis modi illum corporis deserunt</p>
                    <a href="" class="btn btn-primary  btn-rounded">Download App <i class="las la-download"></i></a>
                    <div class="d-flex align-items-center mt-10">
                        <span class="display-3 font-weight-bold text-primary pr-3 mr-3 border-right">10%</span><p class="text-secondary text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
                    </div>
                </div>
            </div>
        </div>
        <figure class="canvas">
            <svg width="100%" height="100%" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle data-aos="fade-up" data-aos-delay="200" cx="120%" cy="-40%" r="50%" stroke="#dddddd" stroke-opacity="1"
                        data-center-top="@r: 50%;"
                        data-top-bottom="@r: 70%;"/>
                <circle data-aos="fade-up" data-aos-delay="400" cx="85%" cy="125%" r="75%" stroke="#dddddd" stroke-opacity="1"
                        data-center-top="@r: 75%;"
                        data-top-bottom="@r: 95%;"/>
                <circle data-aos="fade-up" data-aos-delay="600" cx="-25%" cy="125%" r="50%" stroke="#dddddd" stroke-opacity="1"
                        data-center-top="@cx: -25%;"
                        data-top-bottom="@cx: 45%;"/>
            </svg>
        </figure>
    </section>
    @if(Session::get('fail'))
        <div class="modal show" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content bg-secondary text-white">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                    {{ Session::get('fail') }}

                </div>
            </div>

        </div>
    @endif

    <!-- logo list -->
    <section class="section-sm border-bottom bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 mb-3 mb-lg-0 text-center text-lg-left">
                    <span class="eyebrow text-muted">Featured in</span>
                </div>
                <div class="col-lg-10 text-center">
                    <div class="carousel carousel-align" data-carousel='{"loop": false, "nav": false, "controls": false, "responsive": {"0": {"items": 2}, "768": {"items": 3}, "1200": {"items": 5}}}'>
                        <div>
                            <div class="logo logo-sm"><img src="assets/images/logo/logo-1.svg" alt="Logo"></div>
                        </div>
                        <div>
                            <div class="logo logo-sm"><img src="assets/images/logo/logo-2.svg" alt="Logo"></div>
                        </div>
                        <div>
                            <div class="logo logo-sm"><img src="assets/images/logo/logo-3.svg" alt="Logo"></div>
                        </div>
                        <div>
                            <div class="logo logo-sm"><img src="assets/images/logo/logo-4.svg" alt="Logo"></div>
                        </div>
                        <div>
                            <div class="logo logo-sm"><img src="assets/images/logo/logo-5.svg" alt="Logo"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- features -->
    <section class="bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-center justify-content-lg-between">
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <img src="{{ asset('img/figure-14.svg') }}" alt="Illustration">
                </div>
                <div class="col-lg-6 text-center text-lg-left">
                    <h2 class="font-weight-bold">Commencez à obtenir votre résultats de déliberation dès aujourd'hui</h2>
                    <ul class="list-group list-group-lg">
                        <li class="list-group-item">
                            <p class="text-muted lead"><span class="text-black">Professional relocation</span> package to help you move to Amsterdam.</p>
                        </li>
                        <li class="list-group-item">
                            <p class="text-muted lead"><span class="text-black">We know how</span> to manage distributed teams, so working from home is an option for most of our vacancies.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- video -->
    <section class="cover overflow-hidden">
        <div class="container foreground">
            <div class="row align-items-center vh-75">
                <div class="col text-center">
                    <a class="btn btn-xl btn-rounded btn-black btn-icon popup-youtube" href="https://www.youtube.com/watch?v=uxpDa-c-4Mc">
                        <i class="las la-play"></i>
                    </a>
                </div>
            </div>
        </div>
        <figure class="image image-scroll" style="background-image: url('{{ asset('img/saas-1.jpg') }}')"
                data-bottom-top="transform: translateY(-20%);"
                data-top-bottom="transform: translateY(0%);"
        ></figure>
    </section>


    <!-- features -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="font-weight-bold"><span class="d-lg-block">Don't trust us.</span> Trust our numbers.</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row separated">
                        <div class="col-lg-7 p-5">
                            <div class="d-flex align-items-end">
                                <h5 class="h1 mb-0 mr-2 lh-1 text-primary font-weight-bold">18.5%</h5>
                                <p class="text-secondary">guaranteed revenue growth</p>
                            </div>
                        </div>
                        <div class="col-lg-5 p-5">
                            <div class="d-flex align-items-end">
                                <h5 class="h1 mb-0 mr-2 lh-1 text-primary font-weight-bold">224</h5>
                                <p class="text-secondary">curently active clients</p>
                            </div>
                        </div>
                        <div class="col-lg-5 p-5">
                            <div class="d-flex align-items-end">
                                <h5 class="h1 mb-0 mr-2 lh-1 text-primary font-weight-bold">10</h5>
                                <p class="text-secondary">finished projects</p>
                            </div>
                        </div>
                        <div class="col-lg-7 p-5">
                            <div class="d-flex align-items-end">
                                <h5 class="h1 mb-0 mr-2 lh-1 text-primary font-weight-bold">99.9%</h5>
                                <p class="text-secondary">of our clients are returning</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact -->
    <section>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <form method="post" action="{{ route('sendmessage') }}">
                        @csrf
                        <h2 class="font-weight-bold">Faisons quelque chose de grand. Ensemble.</h2>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label for="yourName">Votre Nom</label>
                                <input type="text" class="form-control" name="nom" id="yourName" placeholder="Votre Nom" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="yourCompany">Votre Université</label>
                                <input type="text" class="form-control" id="yourCompany" name="universite" placeholder="Votre Université" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label for="yourMessage">Message</label>
                                <textarea class="form-control" id="yourMessage" name="message" rows="3" placeholder="Message" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-8">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label small text-muted" for="customCheck1">J'accepte les <a href="{{ route('terms') }}">Conditions générales</a> et je reconnais que mes informations seront utilisées conformément à la politique de confidentialité..</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-5">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-rounded btn">Envoyer<i class="lab la-telegram pl-1"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('img/figure-9.svg') }}" alt="Illustration">
                </div>
            </div>
        </div>
    </section>
@endsection
