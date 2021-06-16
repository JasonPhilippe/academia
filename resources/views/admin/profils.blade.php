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
        <div class="card">
            <div class="card-header">
                <h3 >Profils</h3>
                <button class="btn btn-pill btn-primary float-right" type="button" data-toggle="modal" data-target="#defaultModalPrimary" style="margin-top: -35px">Add</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="defaultModalPrimary" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('save_profils') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">

                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">UserName</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" id="username" placeholder="UserName">
                                <input hidden class="form-control" name="add" id="add" value="add" placeholder="add">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Statuts</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="statuts">
                                    <option value="admin-univ">Admin Univ</option>
                                    <option value="admin-academia">Admin Academia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Universté</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="universite">
                                    @foreach($data as $value)
                                    <option value="{{ $value->id }}">{{ $value->nom }}</option>
                                    @endforeach
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

            <form method="post" action="{{ route('update_professeurs') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center">Modifier un Professeurs</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" id="update_nom" name="nom" class="form-control" placeholder="Nom">
                                <span style="color: red">@error('nom'){{ $message }}@enderror</span>
                                <input hidden class="form-control" name="id" id="update_id" value="id">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Adresse</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="update_adresse" placeholder="Adresse" name="adresse" rows="3"></textarea>
                                <span style="color: red">@error('adresse'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" id="update_phone" name="phone" class="form-control" placeholder="Phone">
                                <span style="color: red">@error('phone'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                            <div class="col-sm-10">
                                <input type="email" id="update_email" name="email" class="form-control" placeholder="Email">
                                <span style="color: red">@error('email'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Website</label>
                            <div class="col-sm-10">
                                <input type="text" id="update_website" name="web" class="form-control" placeholder="WebSite">
                                <span style="color: red">@error('web'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Logo</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-6">
                                        <img id="update_image" src="{{ asset('img/') }}" width="70px" height="70px">
                                    </div>
                                    <div class="col-4">
                                        <input type="file"  name="image" class="form-control" placeholder="Logo">
                                    </div>
                                </div>
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
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Resultats</h5>
                <h6 class="card-subtitle text-muted">
                    ce tableau nous donne les données de chaque profil </h6>
            </div>
            <div class="card-body">
                <div id="datatables-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="datatables-basic_length">
                                <label>Filtrer
                                    <select name="datatables-basic_length" aria-controls="datatables-basic" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="datatables-buttons_filter" class="dataTables_filter">
                                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatables-buttons"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatables-buttons" class="table table-striped dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-buttons_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 277px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">N°</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Username</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Photo</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 204px;" aria-label="Office: activate to sort column ascending">Token</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 62px;" aria-label="Age: activate to sort column ascending">Université</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 164px;" aria-label="Salary: activate to sort column ascending">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($profils as $value)
                                    <tr>
                                        <td>{{$count=1}}</td>
                                        <td style="display: none">{{$value->id_profils}}</td>
                                        <td>{{ucfirst($value->username) }}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->photo}}</td>
                                        <td>{{ucwords(str_replace('-',' ',$value->status))}}</td>
                                        <td>{{$value->token }}</td>
                                        <td>{{$value->nom}}</td>
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
                                <tfoot>
                                <tr>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 277px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">N°</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Username</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Photo</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 204px;" aria-label="Office: activate to sort column ascending">Token</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 62px;" aria-label="Age: activate to sort column ascending">Université</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 164px;" aria-label="Salary: activate to sort column ascending">Action</th>
                                </tr>
                                </tfoot>
                            </table></div></div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="datatables-buttons_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="datatables-buttons_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="datatables-buttons_previous"><a href="https://spark.bootlab.io/tables-datatables.html#" aria-controls="datatables-buttons" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="https://spark.bootlab.io/tables-datatables.html#" aria-controls="datatables-buttons" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="https://spark.bootlab.io/tables-datatables.html#" aria-controls="datatables-buttons" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="https://spark.bootlab.io/tables-datatables.html#" aria-controls="datatables-buttons" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="https://spark.bootlab.io/tables-datatables.html#" aria-controls="datatables-buttons" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="https://spark.bootlab.io/tables-datatables.html#" aria-controls="datatables-buttons" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="https://spark.bootlab.io/tables-datatables.html#" aria-controls="datatables-buttons" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="datatables-buttons_next"><a href="https://spark.bootlab.io/tables-datatables.html#" aria-controls="datatables-buttons" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <div class="dt-buttons btn-group flex-wrap">
                                <button class="btn btn-secondary btn-lg buttons-copy buttons-html5 mr-1" tabindex="0" aria-controls="datatables-buttons" type="button">
                                    <span>Copy</span>
                                </button>
                                <button class="btn btn-secondary btn-lg buttons-print " tabindex="0" aria-controls="datatables-buttons" type="button">
                                    <span>Print</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
