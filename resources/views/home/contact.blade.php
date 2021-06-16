@extends('master',['title'=>'Contact'])
@section('content')
    <section class="section-hero">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="font-weight-bold">
                        Vous souhaitez travailler ensemble ? Commencez !
                    </h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate odio ipsa provident ducimus tenetur quos architecto voluptatibus inventore similique, hic sunt nisi officia eaque alias magni minima recusandae nobis quia.</p>
                    <hr class="my-4 fw-25 ml-0">
                    <ul class="list-group list-group-sm list-group-minimal">
                        <li class="list-group-item d-flex align-items-center">
                            <span class="fw-25 text-muted">Email</span>
                            titantech.cd@gmail.com
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <span class="fw-25 text-muted">Phone</span>
                            +243 820 070 074
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <span class="fw-25 text-muted">Instagram</span>
                            @webuildthemes
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="equal equal-2-1 equal-lg-1-1">
                        <div class="canvas">
                            <div id="map1" class="map"></div>
                        </div>
                    </div>
                    <div class="card bg-black text-white">
                        <div class="card-body">
                            <h5>5th Avenue, New York <span class="font-weight-bold d-block">USA 10255</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="border-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6">
                    <h2 class="font-weight-bold">Faites-nous part de vos commentaires directement !</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6">
                    <form method="post" action="{{ route('sendmessage') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="yourName">Votre Nom</label>
                                    <input type="text" class="form-control" name="nom" id="yourName" placeholder="Votre Nom" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="yourCompany">Votre Université</label>
                                    <input type="text" class="form-control" name="universite" id="yourCompany" placeholder="Votre Université" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="yourEmail">Votre Email</label>
                            <input type="email" class="form-control" name="email" id="yourEmail" placeholder="Votre Email" required>
                        </div>
                        <div class="form-group">
                            <label for="yourMessage">Message</label>
                            <textarea class="form-control" id="yourMessage" name="message" rows="3" placeholder="Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-rounded btn">Envoyer<i class="lab la-telegram pl-1"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
