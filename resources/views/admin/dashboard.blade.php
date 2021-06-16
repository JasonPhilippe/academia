@extends('/admin/layout',['title'=>'Dashboard'])
@section('title','Academia | Dashboard')
@section('content')
@include('admin/nav')
<div class="row">
    <div class="col-xl-6 col-xxl-7">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <div class="card-actions float-right">
                    <a href="https://spark.bootlab.io/dashboard-default.html#" class="mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                    </a>
                    <div class="d-inline-block dropdown show">
                        <a href="https://spark.bootlab.io/dashboard-default.html#" data-toggle="dropdown" data-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-default.html#">Action</a>
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-default.html#">Another action</a>
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-default.html#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">Recent Movement</h5>
            </div>
            <div class="card-body py-3">
                <div class="chart chart-sm"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="chartjs-dashboard-line" style="display: block; width: 462px; height: 250px;" width="462" height="250" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-xxl-5 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Sales Today</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck align-middle"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">2.562</h1>
                            <div class="mb-0">
                                <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.65% </span>
                                Less sales than usual
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Visitors Today</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">17.212</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.50% </span>
                                More visitors than usual
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Earnings</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign align-middle"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">$24.300</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 8.35% </span>
                                More earnings than usual
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Pending Orders</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart align-middle"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">43</h1>
                            <div class="mb-0">
                                <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -4.25% </span>
                                Less orders than usual
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-xxl-4 d-flex">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <div class="card-actions float-right">
                    <a href="https://spark.bootlab.io/dashboard-analytics.html#" class="mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                    </a>
                    <div class="d-inline-block dropdown show">
                        <a href="https://spark.bootlab.io/dashboard-analytics.html#" data-toggle="dropdown" data-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-analytics.html#">Action</a>
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-analytics.html#">Another action</a>
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-analytics.html#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">Languages</h5>
            </div>
            <table class="table table-striped my-0">
                <thead>
                <tr>
                    <th>Language</th>
                    <th class="text-right">Users</th>
                    <th class="d-none d-xl-table-cell w-75">% Users</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>en-us</td>
                    <td class="text-right">735</td>
                    <td class="d-none d-xl-table-cell">
                        <div class="progress">
                            <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 43%;" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100">43%</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>en-gb</td>
                    <td class="text-right">223</td>
                    <td class="d-none d-xl-table-cell">
                        <div class="progress">
                            <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 27%;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100">27%</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>fr-fr</td>
                    <td class="text-right">181</td>
                    <td class="d-none d-xl-table-cell">
                        <div class="progress">
                            <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 22%;" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100">22%</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>es-es</td>
                    <td class="text-right">132</td>
                    <td class="d-none d-xl-table-cell">
                        <div class="progress">
                            <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 16%;" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100">16%</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>de-de</td>
                    <td class="text-right">118</td>
                    <td class="d-none d-xl-table-cell">
                        <div class="progress">
                            <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>ru-ru</td>
                    <td class="text-right">98</td>
                    <td class="d-none d-xl-table-cell">
                        <div class="progress">
                            <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 13%;" aria-valuenow="13" aria-valuemin="0" aria-valuemax="100">13%</div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xxl-4 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <div class="card-actions float-right">
                    <a href="https://spark.bootlab.io/dashboard-analytics.html#" class="mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                    </a>
                    <div class="d-inline-block dropdown show">
                        <a href="https://spark.bootlab.io/dashboard-analytics.html#" data-toggle="dropdown" data-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-analytics.html#">Action</a>
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-analytics.html#">Another action</a>
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-analytics.html#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">Interests</h5>
            </div>
            <div class="card-body">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="chartjs-dashboard-radar" width="462" height="300" class="chartjs-render-monitor" style="display: block; width: 462px; height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xxl-4 d-flex">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <div class="card-actions float-right">
                    <a href="https://spark.bootlab.io/dashboard-analytics.html#" class="mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                    </a>
                    <div class="d-inline-block dropdown show">
                        <a href="https://spark.bootlab.io/dashboard-analytics.html#" data-toggle="dropdown" data-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-analytics.html#">Action</a>
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-analytics.html#">Another action</a>
                            <a class="dropdown-item" href="https://spark.bootlab.io/dashboard-analytics.html#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">Mobile / Desktop</h5>
            </div>
            <div class="card-body d-flex w-100">
                <div class="align-self-center chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="chartjs-dashboard-bar-alt" width="462" height="300" class="chartjs-render-monitor" style="display: block; width: 462px; height: 300px;"></canvas>
                </div>
            </div>
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
                            <a class="dropdown-item" href="https://spark.bootlab.io/pages-clients.html#">Action</a>
                            <a class="dropdown-item" href="https://spark.bootlab.io/pages-clients.html#">Another action</a>
                            <a class="dropdown-item" href="https://spark.bootlab.io/pages-clients.html#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">Clients</h5>
            </div>
            <div class="card-body">
                <div id="datatables-clients_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatables-clients_length"><label>Show <select name="datatables-clients_length" aria-controls="datatables-clients" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatables-clients_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatables-clients"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatables-clients" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-clients_info">
                                <thead>
                                <tr role="row"><th class="sorting" tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 91px;" aria-label="#: activate to sort column ascending">#</th><th class="sorting_asc" tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 343px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th><th class="sorting" tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 291px;" aria-label="Company: activate to sort column ascending">Company</th><th class="sorting" tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 439px;" aria-label="Email: activate to sort column ascending">Email</th><th class="sorting" tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 147px;" aria-label="Status: activate to sort column ascending">Status</th></tr>
                                </thead>
                                <tbody>
                                <tr role="row" class="odd">
                                    <td class="dtr-control"><img src="./Spark - Responsive Admin &amp; Dashboard Template clients_files/avatar-3.jpg" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                    <td class="sorting_1">Angelica Ramos</td>
                                    <td>The Wiz</td>
                                    <td>angelica@ramos.com</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                </tr><tr role="row" class="even">
                                    <td class="dtr-control"><img src="./Spark - Responsive Admin &amp; Dashboard Template clients_files/avatar.jpg" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                    <td class="sorting_1">Ashton Cox</td>
                                    <td>Levitz Furniture</td>
                                    <td>ashton@cox.com</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                </tr><tr role="row" class="odd">
                                    <td class="dtr-control"><img src="./Spark - Responsive Admin &amp; Dashboard Template clients_files/avatar-4.jpg" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                    <td class="sorting_1">Brenden Wagner</td>
                                    <td>The Wiz</td>
                                    <td>brenden@wagner.com</td>
                                    <td><span class="badge badge-warning">Inactive</span></td>
                                </tr><tr role="row" class="even">
                                    <td class="dtr-control"><img src="./Spark - Responsive Admin &amp; Dashboard Template clients_files/avatar-2.jpg" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                    <td class="sorting_1">Charde Marshall</td>
                                    <td>Price Savers</td>
                                    <td>charde@marshall.com</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                </tr><tr role="row" class="odd">
                                    <td class="dtr-control"><img src="./Spark - Responsive Admin &amp; Dashboard Template clients_files/avatar-3.jpg" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                    <td class="sorting_1">Doris Wilder</td>
                                    <td>Red Robin Stores</td>
                                    <td>doris@wilder.com</td>
                                    <td><span class="badge badge-warning">Inactive</span></td>
                                </tr><tr role="row" class="even">
                                    <td class="dtr-control"><img src="./Spark - Responsive Admin &amp; Dashboard Template clients_files/avatar-4.jpg" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                    <td class="sorting_1">Fiona Green</td>
                                    <td>The Sample</td>
                                    <td>fiona@green.com</td>
                                    <td><span class="badge badge-warning">Inactive</span></td>
                                </tr><tr role="row" class="odd">
                                    <td class="dtr-control"><img src="./Spark - Responsive Admin &amp; Dashboard Template clients_files/avatar.jpg" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                    <td class="sorting_1">Garrett Winters</td>
                                    <td>Good Guys</td>
                                    <td>garrett@winters.com</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                </tr><tr role="row" class="even">
                                    <td class="dtr-control"><img src="./Spark - Responsive Admin &amp; Dashboard Template clients_files/avatar-5.jpg" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                    <td class="sorting_1">Gavin Cortez</td>
                                    <td>Red Robin Stores</td>
                                    <td>gavin@cortez.com</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                </tr><tr role="row" class="odd">
                                    <td class="dtr-control"><img src="./Spark - Responsive Admin &amp; Dashboard Template clients_files/avatar-2.jpg" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                    <td class="sorting_1">Haley Kennedy</td>
                                    <td>Helping Hand</td>
                                    <td>haley@kennedy.com</td>
                                    <td><span class="badge badge-danger">Deleted</span></td>
                                </tr><tr role="row" class="even">
                                    <td class="dtr-control"><img src="./Spark - Responsive Admin &amp; Dashboard Template clients_files/avatar-5.jpg" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                    <td class="sorting_1">Howard Hatfield</td>
                                    <td>Price Savers</td>
                                    <td>howard@hatfield.com</td>
                                    <td><span class="badge badge-warning">Inactive</span></td>
                                </tr></tbody>
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatables-clients_info" role="status" aria-live="polite">Showing 1 to 10 of 20 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatables-clients_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="datatables-clients_previous"><a href="https://spark.bootlab.io/pages-clients.html#" aria-controls="datatables-clients" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="https://spark.bootlab.io/pages-clients.html#" aria-controls="datatables-clients" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="https://spark.bootlab.io/pages-clients.html#" aria-controls="datatables-clients" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="datatables-clients_next"><a href="https://spark.bootlab.io/pages-clients.html#" aria-controls="datatables-clients" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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
