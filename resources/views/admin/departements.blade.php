@extends('/admin/layout',['title'=>'Departements'])
@section('content')
@include('admin/nav')
@if(Session::get('save'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-save"></i>
        </div>
        <div class="alert-message">
            <strong>Departements!</strong> {{Session::get("save") }}
        </div>
    </div>
@endif
@if(Session::get('update'))
    <div class="alert alert-success alert-dismissible"  role="alert">
        <div class="alert-icon">
            <i class="las la-pen"></i>
        </div>
        <div class="alert-message">
            <strong>Departements!</strong> {{Session::get("update") }}
        </div>
    </div>
@endif
@if(Session::get('delete'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-trash-alt"></i>
        </div>
        <div class="alert-message">
            <strong>Departements!</strong> {{Session::get("delete") }}
        </div>
    </div>
@endif
@if(Session::get('fail'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-warning"></i>
        </div>
        <div class="alert-message">
            <strong>Departements!</strong> {{Session::get("fail") }}
        </div>
    </div>
@endif

<div class="row" id="display">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 >Departements</h3>
                <button class="btn btn-pill btn-primary float-right" type="button" data-toggle="modal" data-target="#defaultModalPrimary" style="margin-top: -35px">Add</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="defaultModalPrimary" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">

            <form method="post" action="{{ route('save_departements') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center">Ajouter les Departements</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Nom de Facultés</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="university">
                                    @foreach($data as $item)
                                       <option value="{{ $item->id_facultes }}">{{ $item->libelle }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Nom des Departements</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="nom" name="nom" rows="2" placeholder="Noms des Departements" required></textarea>
                                <span>Veuillez saisir le nom de tous les departements en les seperant avec virgule</span>
                                <span style="color: red">@error('nom'){{ $message }}@enderror</span>

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

            <form method="post" action="{{ route('update_departements') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center">Modifier un Departement</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Nom du Departement</label>
                            <div class="col-sm-10">
                                <input type="text" id="update_nom" name="nom" class="form-control" placeholder="Nom">
                                <span style="color: red">@error('nom'){{ $message }}@enderror</span>
                                <input hidden class="form-control" name="id" id="update_id" value="id">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Nom de la Faculté</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="faculte">
                                    @foreach($data as $item)
                                        <option value="{{ $item->id_facultes }}">{{ $item->libelle }}</option>
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
                    ce tableau nous donne les données de chaque Departement </h6>
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
                    <div class="row" >
                        <div class="col-sm-12">
                            <table class="table table-striped dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-buttons_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 277px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">N°</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 164px;" aria-label="Salary: activate to sort column ascending">Nom Departement</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 164px;" aria-label="Salary: activate to sort column ascending">Nom Facultes</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 164px;" aria-label="Salary: activate to sort column ascending">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departements as $value)
                                    <tr>
                                        <td>{{$count=1}}</td>
                                        <td style="display: none">{{$value->id_departement}}</td>
                                        <td>{{$value->nom_departement }}</td>
                                        <td>{{$value->libelle}}</td>
                                        <td>
                                            <button type="button" class="btn btn-link edit" data-toggle="modal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="delete_departements/{{$value->id_departement}}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">N°</th>
                                    <th rowspan="1" colspan="1">Nom Departement</th>
                                    <th rowspan="1" colspan="1">Nom Facultes</th>
                                    <th rowspan="1" colspan="1">Action</th>
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
                                <button id="print" class="btn btn-secondary btn-lg buttons-print " tabindex="0" aria-controls="datatables-buttons" type="button">
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
