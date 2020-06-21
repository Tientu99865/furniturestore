@extends('admin/layout/index')
@section('title')
    Trang chủ
@endsection
@can('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Total invoices</h6>
                        <h2 class="mb-0">28893</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Total invoices</h6>
                        <h2 class="mb-0">28893</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Total invoices</h6>
                        <h2 class="mb-0">28893</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-info text-white text-center card-shadow-info">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Total invoices</h6>
                        <h2 class="mb-0">28893</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body pb-0">
                        <h4 class="card-title">Daily Sales</h4>
                        <div class="d-flex justify-content-between justify-content-lg-start flex-wrap">
                            <div class="mr-5 mb-2">
                                <h3>
                                    56789
                                </h3>
                                <h6 class="font-weight-normal mb-0">
                                    Online sales
                                </h6>
                            </div>
                            <div class="mb-2">
                                <h3>
                                    12345
                                </h3>
                                <h6 class="font-weight-normal mb-0">
                                    Sales in store
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-end p-0">
                        <div class="mt-auto w-100">
                            <div class="chartjs-size-monitor"
                                 style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <div id="sales-legend" class="chartjs-legend mt-2 mb-4">
                                <ul class="0-legend">
                                    <li><span style="background-color:rgba(235, 105, 143, .7)"></span>online</li>
                                    <li><span style="background-color:rgba(119, 111, 249, .9)"></span>store</li>
                                </ul>
                            </div>
                            <canvas id="chart-sales" width="326" height="163" class="chartjs-render-monitor"
                                    style="display: block; width: 326px; height: 163px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Activity</h6>
                        </div>
                        <div class="list d-flex align-items-center border-bottom pb-3">
                            <img class="img-sm rounded-circle" src="../../images/faces/face8.jpg" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p><b>Dobrick </b>published an article</p>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img class="img-sm rounded-circle" src="../../images/faces/face5.jpg" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p><b>Stella </b>created an event</p>
                                <small class="text-muted">3 hours ago</small>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img class="img-sm rounded-circle" src="../../images/faces/face7.jpg" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p><b>Peter </b>submitted the reports</p>
                                <small class="text-muted">1 hours ago</small>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img class="img-sm rounded-circle" src="../../images/faces/face6.jpg" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p><b>Nateila </b>updated the docs</p>
                                <small class="text-muted">1 hours ago</small>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center pt-3">
                            <img class="img-sm rounded-circle" src="../../images/faces/face9.jpg" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p><b>Tom </b>uploaded the demo</p>
                                <small class="text-muted">3 hours ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Traffic</h4>
                        <div class="w-50 mx-auto">
                            <div class="chartjs-size-monitor"
                                 style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="traffic-chart" width="134" height="134" class="chartjs-render-monitor"
                                    style="display: block; width: 134px; height: 134px;"></canvas>
                        </div>
                        <div class="text-center mt-5">
                            <h4 class="mb-2">Traffic for the day</h4>
                            <p class="card-description mb-5">Traffic through the sources google and facebook for the
                                day</p>
                        </div>
                        <div id="traffic-chart-legend" class="chartjs-legend traffic-chart-legend">
                            <ul>
                                <li><h2 class="mb-3">40%</h2>
                                    <div class="legend-content"><span class="legend-dots"
                                                                      style="background:linear-gradient(145deg, #6486fc, #0e4cfb)"></span>Facebook
                                    </div>
                                </li>
                                <li><h2 class="mb-3">60%</h2>
                                    <div class="legend-content"><span class="legend-dots"
                                                                      style="background:linear-gradient(to right, rgba(238, 143, 154, 1), rgba(233, 79, 133, 1))"></span>Google
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@else
@section('content')
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 style="text-align: center;font-size: 27px">Chào mừng bạn đến trang chủ quản trị của
                            Furniture Store</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endcan
