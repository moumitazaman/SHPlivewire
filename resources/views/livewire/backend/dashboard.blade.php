<div>
    <x-slot name="header">
        <div class="sub-header">
            <div class="d-flex align-items-center flex-wrap mr-auto">
                <h5 class="dashboard_bar">Dashboard</h5>
            </div>
            <div class="d-flex align-items-center">
                <a href="javascript:void(0);" class="btn btn-xs btn-primary light logout-btn">Logout</a>
            </div>
        </div>
    </x-slot>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    {{-- <div class="media">
                        <img src="{{ asset(auth()->user()->image ?? 'assets/images/no_image.png') }}" alt="image"
                            class="mr-3 rounded" width="75">
                        <div class="media-body">
                            <h5 class="m-b-5"><a href="post-details.html" class="text-black">{{ auth()->user()->name
                                    }}</a></h5>
                            <p class="mb-0">{{ auth()->user()->email }}</p>
                        </div>
                    </div> --}}
                </div>
                <div class="col-md-5">
                    <div class="input-group input-primary m-2">
                        <input type="month" class="form-control" wire:model="filter_date">
                        <div class="input-group-append">
                            <span class="input-group-text">Filter Data</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="widget-stat card bg-success">
                        <div class="card-body  p-4">
                            <div class="media">
                                {{-- <span class="mr-3">
                                    <i class="flaticon-381-calendar-1"></i>
                                </span> --}}
                                <div class="media-body text-white text-right">
                                    <p class="mb-1">  </p>
                                    <h3 class="text-white"></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="widget-stat card bg-danger">
                        <div class="card-body  p-4">
                            <div class="media">
                                {{-- <span class="mr-3">
                                    <i class="flaticon-381-calendar-1"></i>
                                </span> --}}
                                <div class="media-body text-white text-right">
                                    <p class="mb-1"> {{ $month }}/{{ $year }}</p>
                                    <h3 class="text-white"></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h2 class="card-title"></h2>
                        </div>
                        <div class="card-body pb-0">
                         <!--   <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Total</strong>
                                    <span class="mb-0"></span>
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Active</strong>
                                    <span class="mb-0"></span>
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Inactive</strong>
                                    <span class="mb-0 text-danger"></span>
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Online</strong>
                                    <span class="mb-0"></span>
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Only Offline</strong>
                                    <span class="mb-0 text-danger"></span>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h2 class="card-title"></h2>
                        </div>
                        <div class="card-body pb-0">
                           <!-- <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Total</strong>
                                    <span class="mb-0"></span>
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Active</strong>
                                    <span class="mb-0"></span>
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Inactive</strong>
                                    <span class="mb-0 text-danger"></span>
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Online</strong>
                                    <span class="mb-0"></span>
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Only Offline</strong>
                                    <span class="mb-0 text-danger"></span>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>