@extends('/admin/layout',['title'=>'Profils'])
@section('content')
@include('admin/nav')
@if(Session::get('save'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <div class="alert-icon">
                <i class="las la-save"></i>
            </div>
            <div class="alert-message">
                <strong>Profils!</strong> {{Session::get("save") }}
            </div>
        </div>
@endif
@if(Session::get('update'))
        <div class="alert alert-success alert-dismissible"  role="alert">
            <div class="alert-icon">
                <i class="las la-pen"></i>
            </div>
            <div class="alert-message">
                <strong>Profils!</strong> {{Session::get("update") }}
            </div>
        </div>
@endif
@if(Session::get('delete'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <div class="alert-icon">
                <i class="las la-trash-alt"></i>
            </div>
            <div class="alert-message">
                <strong>Profils!</strong> {{Session::get("delete") }}
            </div>
        </div>
@endif
@if(Session::get('fail'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <div class="alert-icon">
                <i class="las la-warning"></i>
            </div>
            <div class="alert-message">
                <strong>Profils!</strong> {{Session::get("fail") }}
            </div>
        </div>
@endif
<div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 >Profils</h3>
                                    <button class="btn btn-pill btn-primary float-right" type="button" data-toggle="modal" data-target="#defaultModalPrimary" style="margin-top: -35px">Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 >Jury</h3>
                                    <button class="btn btn-pill btn-secondary float-right" type="button" data-toggle="modal" data-target="#defaultModalJury" style="margin-top: -35px">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="modal fade" id="defaultModalPrimary" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="{{ route('save_profils_univ') }}" enctype="multipart/form-data">
                            @csrf
                           <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un profil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body m-3">

<!--                                    <div class="form-group row">-->
<!--                                        <label class="col-form-label col-sm-2 text-sm-right">UserName</label>-->
<!--                                        <div class="col-sm-10">-->
<!--                                            <input type="text" class="form-control" name="username" id="username" placeholder="UserName">-->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">UserName</label>
                                        <div class="col-sm-10">
                                            <select class="form-control mb-3" name="username" required>
                                                @foreach($professeur as $value)
                                                    <option value="{{ $value->id_professors."/".$value->nom_prof." ".$value->postnom_prof." ".$value->prenom_prof }}">{{ $value->nom_prof }}&blacktriangleright;{{ $value->postnom_prof }}&blacktriangleright;{{ $value->prenom_prof }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" required class="form-control" name="email" id="email" placeholder="p.ex jasonphilippe@academia.cd">
                                            <input hidden class="form-control" name="universite" id="universite" value="{{ Session::get('adminIdUniversite') }}" >
                                            <span class="alert-danger" role="alert">
                                                  @error('email'){{ $message }}@enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control" name="password" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Statuts</label>
                                    <div class="col-sm-10">
                                        <select class="form-control mb-3" name="statuts" required>
                                            <option value="professeurs">Professeur</option>
<!--                                            <option value="president-jury">President Jury</option>-->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="defaultModalJury" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ajouter un les Membres de Jury</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body m-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Professeurs</label>
                                        <div class="col-sm-10">
                                            <select class="form-control mb-3" name="professeurs">
{{--                                                <?php--}}
{{--                                                $row = $dao->getProfessorsByUniversityForAdmin(Session::get("adminIdUniversite"));--}}
{{--                                                if ($row)--}}
{{--                                                {--}}
{{--                                                    foreach ($row as $value)--}}
{{--                                                    {--}}
{{--                                                        ?>--}}
{{--                                                        <option value="<?=$value->id_prof?>"><?=$value->nom?>&blacktriangleright;<?=$value->postnom?>&blacktriangleright;<?=$value->prenom?></option>--}}
{{--                                                    <?php } }?>--}}
                                            </select>
                                        </div>
                                    </div>
<!--                                    <div class="form-group row">-->
<!--                                        <label class="col-form-label col-sm-2 text-sm-right">UserName</label>-->
<!--                                        <div class="col-sm-10">-->
<!--                                            <input type="text" class="form-control" name="username" id="username" placeholder="UserName">-->
<!--                                            -->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Promotions</label>
                                        <div class="col-sm-10">
                                            <select class="form-control mb-3" name="promotions">
{{--                                                <?php--}}
{{--                                                $row = $dao->getallPromotionForAdminByDepAndFacAndUniversity(Session::get("adminIdUniversite"));--}}
{{--                                                var_dump($row);--}}
{{--                                                if ($row)--}}
{{--                                                {--}}
{{--                                                    foreach ($row as $value)--}}
{{--                                                    {--}}
{{--                                                        ?>--}}
{{--                                                        <option value="<?=$value->id_promo?>"><?=$value->intitule_promo?>&blacktriangleright;<?=$value->nom_dep?>&blacktriangleright;<?=$value->libelle?></option>--}}
{{--                                                    <?php } }?>--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                            <input hidden class="form-control" name="add" id="add" value="add" placeholder="add">
                                            <input hidden class="form-control" name="universite" id="universite" value="" >

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Type Membres</label>
                                        <div class="col-sm-10">
                                            <select class="form-control mb-3" name="type_membre">
                                                <option value="president-jury">President Jury</option>
                                                <option value="membres">Membres</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

               <div class="modal fade" id="EditModalPrimary" tabindex="-1" aria-hidden="true" style="display: none;">
               <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('update_profils_univ') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">

                        <!--                                    <div class="form-group row">-->
                        <!--                                        <label class="col-form-label col-sm-2 text-sm-right">UserName</label>-->
                        <!--                                        <div class="col-sm-10">-->
                        <!--                                            <input type="text" class="form-control" name="username" id="username" placeholder="UserName">-->
                        <!---->
                        <!--                                        </div>-->
                        <!--                                    </div>-->
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">UserName</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="username" required>
                                    @foreach($professeur as $value)
                                        <option value="{{ $value->id_professors."/".$value->nom_prof." ".$value->postnom_prof." ".$value->prenom_prof }}">{{ $value->nom_prof }}&blacktriangleright;{{ $value->postnom_prof }}&blacktriangleright;{{ $value->prenom_prof }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                            <div class="col-sm-10">
                                <input type="email" required class="form-control" name="email" id="email" placeholder="p.ex jasonphilippe@academia.cd">
                                <input hidden class="form-control" name="universite" id="universite" value="{{ Session::get('adminIdUniversite') }}" >
                                <span class="alert-danger" role="alert">
                                                  @error('email'){{ $message }}@enderror
                                            </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Password</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Statuts</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="statuts" required>
                                    <option value="professeurs">Professeur</option>
                                    <!--                                            <option value="president-jury">President Jury</option>-->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

            </div>
<div class="row">
     <div class="col-xxl-9">
                <div class="card">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            <a href="https://spark.bootlab.io/pages-clients.html#" class="mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                            </a>
                            <div class="d-inline-block dropdown show">
                                <a href="https://spark.bootlab.io/pages-clients.html#" data-toggle="dropdown" data-display="static">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="">Action</a>
                                    <a class="dropdown-item" href="">Another action</a>
                                    <a class="dropdown-item" href="">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title mb-0">Profils</h5>
                    </div>
                    <div class="card-body">
                        <div id="datatables-clients_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatables-clients_length">
                                        <label>Show <select name="datatables-clients_length" aria-controls="datatables-clients" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6"><div id="datatables-clients_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatables-clients"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatables-clients" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-clients_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 91px;" aria-label="#: activate to sort column ascending">#</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 343px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nom complet</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 439px;" aria-label="Email: activate to sort column ascending">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 147px;" aria-label="Status: activate to sort column ascending">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 147px;" aria-label="Status: activate to sort column ascending">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($profils as $value)
                                            <tr>
                                                <td>{{$count=1}}</td>
                                                <td style="display: none">{{$value->id_profils}}</td>
                                                <td>{{ucwords($value->username) }}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{ucfirst($value->status)}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-link edit" data-toggle="modal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <a href="delete_profils/{{$value->id_profils}}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="datatables-clients_info" role="status" aria-live="polite">Showing 1 to 10 of 20 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="datatables-clients_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="datatables-clients_previous">
                                                <a href="" aria-controls="datatables-clients" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                            </li>
                                            <li class="paginate_button page-item active">
                                                <a href="" aria-controls="datatables-clients" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="" aria-controls="datatables-clients" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                            </li>
                                            <li class="paginate_button page-item next" id="datatables-clients_next">
                                                <a href="" aria-controls="datatables-clients" data-dt-idx="3" tabindex="0" class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     <div class="col-xxl-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-actions float-right">
                        <a href="https://spark.bootlab.io/pages-clients.html#" class="mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                        </a>
                        <div class="d-inline-block dropdown show">
                            <a href="https://spark.bootlab.io/pages-clients.html#" data-toggle="dropdown" data-display="static">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="https://spark.bootlab.io/pages-clients.html#">Action</a>
                                <a class="dropdown-item" href="https://spark.bootlab.io/pages-clients.html#">Another action</a>
                                <a class="dropdown-item" href="https://spark.bootlab.io/pages-clients.html#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Angelica Ramos</h5>
                </div>
                <div class="card-body">
                    <div class="row no-gutters">
                        <div class="col-sm-3 col-xl-12 col-xxl-4 text-center">
                            <img src="./Spark - Responsive Admin &amp; Dashboard Template clients_files/avatar-3.jpg" width="64" height="64" class="rounded-circle mt-2" alt="Angelica Ramos">
                        </div>
                        <div class="col-sm-9 col-xl-12 col-xxl-8">
                            <strong>About me</strong>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum
                                sociis
                                natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        </div>
                    </div>

                    <table class="table table-sm my-2">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td>Charissa Hilt</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>Matrix Interior Design</td>
                        </tr>
                        <tr>
                            <th>Occupation</th>
                            <td>Desktop publisher</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>charissahilt@rhyta.com</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>+1234123123123</td>
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td>hispanomarketer.com</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><span class="badge badge-success">Active</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection
