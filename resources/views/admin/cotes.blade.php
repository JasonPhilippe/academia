@extends('/admin/layout',['title'=>'Cotes'])
@section('content')
@include('admin/nav')
@if(Session::get('save'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-save"></i>
        </div>
        <div class="alert-message">
            <strong>Cotes!</strong> {{Session::get("save") }}
        </div>
    </div>
@endif
@if(Session::get('update'))
    <div class="alert alert-success alert-dismissible"  role="alert">
        <div class="alert-icon">
            <i class="las la-pen"></i>
        </div>
        <div class="alert-message">
            <strong>Cotes!</strong> {{Session::get("update") }}
        </div>
    </div>
@endif
@if(Session::get('delete'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-trash-alt"></i>
        </div>
        <div class="alert-message">
            <strong>Cotes!</strong> {{Session::get("delete") }}
        </div>
    </div>
@endif
@if(Session::get('fail'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-warning"></i>
        </div>
        <div class="alert-message">
            <strong>Cotes!</strong> {{Session::get("fail") }}
        </div>
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 >Cotes</h3>
{{--                {{ $promotionbyprofessor }}--}}

{{--                    <ul>--}}
{{--                        <li style="display: inline">--}}
{{--                            <button  class="btn btn-pill btn-primary float-right"  style="margin-top: -35px" id="button_cotes" >--}}
{{--                                --}}
{{--                            </button>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                    <div class="input-group mb-3 col-4 float-right" style="margin-top: -35px">
                        <select class="custom-select flex-grow-1" id="select_cotes">
                            <option value="">Selectioner une Promotion</option>
                            @foreach($promotionbyprofessor as $value)
                               <option value="{{ $value->id_promotion }}">{{ $value->intitule_promo }} &blacktriangleright;{{ $value->nom_departement }}</option>
                            @endforeach
                        </select>
{{--                        <input hidden type="text" value="{{csrf_token()}}" id="_token">--}}
{{--                        <span class="input-group-append"><button class="btn btn-secondary" type="button">Go!</button></span>--}}
                    </div>


            </div>
        </div>
    </div>

    <div class="modal fade" id="defaultModalPrimary" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">

            <form method="post" action="{{ route('save_cotes') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center">Ajouter un Cotes</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">

                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Cotes</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="mention" id="intitule" placeholder="Cotes">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Cours</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="id_cours" id="course_by_promotion">
{{--                                    @foreach($cours as $item)--}}
{{--                                        <option value="{{ $item->id_cours }}">{{ $item->intitule_cours }}&blacktriangleright;{{$item->intitule_promo }}</option>--}}
{{--                                    @endforeach--}}
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Etudiants</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="id_etudiant" id="id_etudiant">

{{--                                    @foreach($etudiants as $item)--}}
{{--                                        <option value="{{ $item->id_et }}">{{ $item->nom_et }}&blacktriangleright;{{ $item->postnom_et }}&blacktriangleright;{{ $item->prenom_et }}</option>--}}
{{--                                    @endforeach--}}
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">Session</label>
                            <div class="col-sm-10">
                                <select class="form-control mb-3" name="delib_session">
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
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
                        <h3 class="text-center">Modifier un Cotes</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
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
                    ce tableau nous donne les données de chaque Cotes </h6>
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
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Nom Etudiants</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Cours</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Cotes</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Sessions</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 164px;" aria-label="Salary: activate to sort column ascending">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cotes as $value)
                                    <tr>
                                        <td>{{$count=1}}</td>
                                        <td style="display: none">{{$value->id_cote}}</td>
                                        <td>{{$value->nom_et ." ".$value->postnom_et." ".$value->prenom_et }}</td>
                                        <td>{{$value->intitule_cours}}</td>
                                        <td>{{$value->mention}}</td>
                                        <td>{{$value->delib_session}}</td>
                                        <td>
                                            <button type="button" class="btn btn-link edit_professors" data-toggle="modal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="delete_cotes/{{$value->id_cote}}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 277px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">N°</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Nom Etudiants</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Cours</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Cotes</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-buttons" rowspan="1" colspan="1" style="width: 435px;" aria-label="Position: activate to sort column ascending">Sessions</th>
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
