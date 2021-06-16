@extends('/admin/layout',['title'=>'Cours'])
@section('content')
@include('admin/nav')
@if(Session::get('save'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-save"></i>
        </div>
        <div class="alert-message">
            <strong>Cours!</strong> {{Session::get("save") }}
        </div>
    </div>
@endif
@if(Session::get('update'))
    <div class="alert alert-success alert-dismissible"  role="alert">
        <div class="alert-icon">
            <i class="las la-pen"></i>
        </div>
        <div class="alert-message">
            <strong>Cours!</strong> {{Session::get("update") }}
        </div>
    </div>
@endif
@if(Session::get('delete'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-trash-alt"></i>
        </div>
        <div class="alert-message">
            <strong>Cours!</strong> {{Session::get("delete") }}
        </div>
    </div>
@endif
@if(Session::get('fail'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-warning"></i>
        </div>
        <div class="alert-message">
            <strong>Cours!</strong> {{Session::get("fail") }}
        </div>
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 >Cours</h3>
                @if(Session::get('adminStatut')!="professeurs")
                    <button class="btn btn-pill btn-primary float-right" type="button" data-toggle="modal" data-target="#defaultModalPrimary" style="margin-top: -35px">Add</button>
                @endif
                </div>
        </div>
    </div>
    <div class="modal fade" id="defaultModalPrimary" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">

            <form method="post" action="{{ route('save_cours') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center">Ajouter un Cours</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">

                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Nom du Cours</label>
                            <div class="col-sm-10">
                                <input type="text" id="intitule" name="intitule" class="form-control" placeholder="Nom du Cours" required>
                                <span style="color: red">@error('matricule'){{ $message }}@enderror</span>
                                <input hidden class="form-control" name="university"  value="{{ Session::get('adminIdUniversite') }}" placeholder="add">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Ponderation du Cours</label>
                            <div class="col-sm-10">
                                <input type="text" id="ponderation" name="ponderation" class="form-control" placeholder="Ponderation du Cours" required>
                                <span style="color: red">@error('nom'){{ $message }}@enderror</span>
                                <input hidden class="form-control" name="status" id="add" value="add" placeholder="add">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Volume d'heure</label>
                            <div class="col-sm-10">
                                <input type="text" id="volume_heure" name="volume_heure" class="form-control" placeholder="Volume d'heure" required>
                                <span style="color: red">@error('nom'){{ $message }}@enderror</span>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Nom du Professeurs</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="professeur">
                                    @foreach($professeurs as $item)
                                        <option value="{{ $item->id_professors }}">{{ $item->nom_prof }}&blacktriangleright;{{$item->postnom_prof}}&blacktriangleright;{{$item->prenom_prof}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Promotions</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="promotion">
                                    @foreach($promotion as $item)
                                        <option value="{{ $item->id_promotion }}">{{ $item->intitule_promo }}&blacktriangleright;{{ $item->nom_departement }}&blacktriangleright;{{ $item->libelle }}</option>
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

    <div class="modal fade" id="EditModalPrimaryProfessors" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">

            <form method="post" action="{{ route('update_cours') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center">Modifier un Cours</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">

                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Nom du Cours</label>
                            <div class="col-sm-10">
                                <input type="text" id="intitule" name="intitule" class="form-control" placeholder="Nom du Cours" required>
                                <span style="color: red">@error('matricule'){{ $message }}@enderror</span>
                                <input hidden class="form-control" name="university"  value="{{ Session::get('adminIdUniversite') }}" placeholder="add">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Ponderation du Cours</label>
                            <div class="col-sm-10">
                                <input type="text" id="ponderation" name="ponderation" class="form-control" placeholder="Ponderation du Cours" required>
                                <span style="color: red">@error('nom'){{ $message }}@enderror</span>
                                <input hidden class="form-control" name="status" id="add" value="add" placeholder="add">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Volume d'heure</label>
                            <div class="col-sm-10">
                                <input type="text" id="volume_heure" name="volume_heure" class="form-control" placeholder="Volume d'heure" required>
                                <span style="color: red">@error('nom'){{ $message }}@enderror</span>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Nom du Professeurs</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="professeur">
                                    @foreach($professeurs as $item)
                                        <option value="{{ $item->id_professors }}">{{ $item->nom_prof }}&blacktriangleright;{{$item->postnom_prof}}&blacktriangleright;{{$item->prenom_prof}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Promotions</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="promotion">
                                    @foreach($promotion as $item)
                                        <option value="{{ $item->id_promotion }}">{{ $item->intitule_promo }}&blacktriangleright;{{ $item->nom_departement }}&blacktriangleright;{{ $item->libelle }}</option>
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
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Resultats</h5>
                <h6 class="card-subtitle text-muted">
                    ce tableau nous donne les données de chaque cours </h6>
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
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Cours</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Ponderation</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Volume d'Heure</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Promotions</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 204px;" aria-label="Office: activate to sort column ascending">Departements</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 204px;" aria-label="Office: activate to sort column ascending">Facultés</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 62px;" aria-label="Age: activate to sort column ascending">Professeurs</th>
                                    @if(Session::get('adminStatut')!="professeurs")
                                        <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 164px;" aria-label="Salary: activate to sort column ascending">Action</th>
                                    @endif

                                </tr>
                                </thead>
                                <tbody>
                                @if(Session::get('adminStatut')!="professeurs")
                                    @foreach($cours as $value)
                                        <tr>
                                            <td>{{$count=1}}</td>
                                            <td style="display: none">{{$value->id_cours}}</td>
                                            <td>{{$value->intitule_cours }}</td>
                                            <td>{{$value->ponderation}}</td>
                                            <td>{{$value->volume_heure}}</td>
                                            <td>{{$value->intitule_promo}}</td>
                                            <td>{{$value->nom_departement }}</td>
                                            <td>{{$value->libelle}}</td>
                                            <td>{{$value->prenom_prof ." ".$value->nom_prof}}</td>
                                            @if(Session::get('adminStatut')!="professeurs")
                                                <td>
                                                    <button type="button" class="btn btn-link edit_professors" data-toggle="modal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <a href="delete_cours/{{$value->id_cours}}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>

                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                 @endif
                                @foreach($coursbyprofesseur as $value)
                                    <tr>
                                        <td>{{$count=1}}</td>
                                        <td style="display: none">{{$value->id_cours}}</td>
                                        <td>{{$value->intitule_cours }}</td>
                                        <td>{{$value->ponderation}}</td>
                                        <td>{{$value->volume_heure}}</td>
                                        <td>{{$value->intitule_promo}}</td>
                                        <td>{{$value->nom_departement }}</td>
                                        <td>{{$value->libelle}}</td>
                                        <td>{{$value->prenom_prof ." ".$value->nom_prof}}</td>
                                        @if(Session::get('adminStatut')!="professeurs")
                                            <td>
                                                <button type="button" class="btn btn-link edit_professors" data-toggle="modal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="delete_cours/{{$value->id_cours}}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 277px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">N°</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Cours</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Ponderation</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Volume d'Heure</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Promotions</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 204px;" aria-label="Office: activate to sort column ascending">Departements</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 204px;" aria-label="Office: activate to sort column ascending">Facultés</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 62px;" aria-label="Age: activate to sort column ascending">Professeurs</th>
                                    @if(Session::get('adminStatut')!="professeurs")
                                        <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 164px;" aria-label="Salary: activate to sort column ascending">Action</th>
                                    @endif
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
