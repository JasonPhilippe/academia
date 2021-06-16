<div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content bg-secondary text-white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
            <div class="modal-body text-center">
                <h2 class="font-weight-bold">Connexion</h2>
            </div>
            <hr>
            <form action="{{ route('login') }}" method="post">
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address :</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required value="{{ old('email') }}">
                    <span class="alert-danger" role="alert">
                          @error('email'){{ $message }}@enderror
                    </span>
{{--                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password :</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password" required value="{{ old('password') }}">
                    <span class="alert-danger" role="alert">
                        @error('password'){{ $message }}@enderror
                    </span>
{{--                    <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>--}}
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="reset" class="btn btn-danger btn-rounded btn-sm" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary btn-rounded btn-sm">Connexion</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- footer -->
<footer class="border-top">
    <div class="container">
        <div class="row justify-content-between gutter-2 gutter-lg-6">
            <div class="col-lg-4">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <img src="{{ asset('img/logo-black.svg') }}" alt="Logo"></a>
                <p class="mt-2 text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="col-lg-7">
                <div class="row gutter-4">
                    <div class="col-md-4">
                        <span class="eyebrow text-muted mb-2 d-flex">Menu</span>
                        <ul class="nav nav-minimal nav-minimal-sm flex-md-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('faq') }}">Faq</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <span class="eyebrow text-muted mb-2 d-flex">Suivez-nous</span>
                        <ul class="nav nav-minimal nav-minimal-sm flex-md-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Instagram</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Facebook</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Twitter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Linkedin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Youtube</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <span class="eyebrow text-muted mb-2 d-flex">Docs</span>
                        <ul class="nav nav-minimal nav-minimal-sm flex-md-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Get started</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Components</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Changelog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between gutter-1 gutter-lg-6">
            <div class="col-md-6 col-lg-4 order-md-2 text-md-right">
                <span class="small text-muted">5th Avenue, New York USA 10255</span>
            </div>
            <div class="col-md-6 col-lg-3 order-md-1">
                <p class="small text-muted">Copyrights © 2021</p>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/app-home.js') }}"></script>
</body>
</html>

