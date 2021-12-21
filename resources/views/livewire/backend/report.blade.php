<div>
    <x-slot name="header">
        <div class="sub-header">
            <div class="d-flex align-items-center flex-wrap mr-auto">
                <h5 class="dashboard_bar">Report Generation</h5>
            </div>
            <div class="d-flex align-items-center">
                <a href="javascript:void(0);" class="btn btn-xs btn-primary light logout-btn">Logout</a>
            </div>
        </div>
    </x-slot>

    <div class="content-body">
        <div class="container-fluid">
            @if (session()->has('message'))
            <div class="row page-titles mx-0">
                <div class="col-xl-12 col-lg-12">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="#daily" data-toggle="tab" class="nav-link @if($tab == 'daily') active @endif" wire:click="tab_daily">Daily</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#monthly" data-toggle="tab" class="nav-link @if($tab == 'monthly') active @endif" wire:click="tab_monthly">Monthly</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#yearly" data-toggle="tab" class="nav-link @if($tab == 'yearly') active @endif" wire:click="tab_yearly">Yearly</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content wrapper">
                                        <div id="daily" class="tab-pane fade  @if($tab == 'daily') active show @endif">
                                            <div class="pt-3">
                                                <div class="basic-form mb-2">
                                                    <form wire:submit.prevent="daily_report">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <input type="date" class="form-control"
                                                                    title="Starting date" name="daily_starting_date"
                                                                    wire:model="daily_starting_date">
                                                                @error('daily_starting_date')
                                                                <div class="alert alert-danger" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-5 mt-2 mt-sm-0">
                                                                <input type="date" class="form-control"
                                                                    title="Ending date" name="daily_ending_date"
                                                                    wire:model="daily_ending_date">
                                                                @error('daily_ending_date')
                                                                <div class="alert alert-danger" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-2 mt-2 mt-sm-0">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-lg">Generate</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                @if($daily_result == true)
                                                <div class="row mt-2">
                                                    <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-6">
                                                        <div class="widget-stat card bg-primary">
                                                            <div class="card-body  p-4">
                                                                <div class="media">
                                                                    {{-- <span class="mr-3">
                                                                        <i class="la la-users"></i>
                                                                    </span> --}}
                                                                    <div class="media-body text-white">
                                                                        <p class="mb-1">Income</p>
                                                                        <h3 class="text-white">{{
                                                                            array_sum(array_column($data_set, 'income'))
                                                                            }}</h3>
                                                                        <div class="progress mb-2 bg-secondary">
                                                                            <div class="progress-bar progress-animated bg-light"
                                                                                style="width: 80%"></div>
                                                                        </div>
                                                                        <small>80% Increase in 20 Days</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-6">
                                                        <div class="widget-stat card bg-primary">
                                                            <div class="card-body  p-4">
                                                                <div class="media">
                                                                    {{-- <span class="mr-3">
                                                                        <i class="la la-users"></i>
                                                                    </span> --}}
                                                                    <div class="media-body text-white">
                                                                        <p class="mb-1">Expense</p>
                                                                        <h3 class="text-white">{{
                                                                            array_sum(array_column($data_set, 'expense')) }}</h3>
                                                                        <div class="progress mb-2 bg-secondary">
                                                                            <div class="progress-bar progress-animated bg-light"
                                                                                style="width: 80%"></div>
                                                                        </div>
                                                                        <small>80% Increase in 20 Days</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-right">
                                                        <button type="button" class="btn btn-success" wire:click="report_download">{{ __('Report Download as PDF') }}</button>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="table-responsive" id="daily_result">
                                                            <table
                                                                class="table table-hover table-bordered table-responsive-sm">
                                                                <thead class="thead-primary">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Date</th>
                                                                        <th class="text-right">Income</th>
                                                                        <th class="text-right">Expense</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($data_set as $data)
                                                                    <tr>
                                                                        <th>{{ $loop->iteration }}</th>
                                                                        <td>{{ $data['date'] }}</td>
                                                                        <td class="text-right text-success">{{
                                                                            $data['income'] }}</td>
                                                                        <td class="text-right text-danger">{{
                                                                            $data['expense'] }}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div id="monthly" class="tab-pane fade @if($tab == 'monthly') active show @endif">
                                            <div class="pt-3">
                                                <div class="basic-form mb-2">
                                                    <form wire:submit.prevent="monthly_report">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <input type="month" class="form-control"
                                                                    title="Starting date" name="monthly_starting_date"
                                                                    wire:model="monthly_starting_date">
                                                                @error('monthly_starting_date')
                                                                <div class="alert alert-danger" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-5 mt-2 mt-sm-0">
                                                                <input type="month" class="form-control"
                                                                    title="Ending date" name="monthly_ending_date"
                                                                    wire:model="monthly_ending_date">
                                                                @error('monthly_ending_date')
                                                                <div class="alert alert-danger" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-2 mt-2 mt-sm-0">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-lg">Generate</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                @if($monthly_result == true)
                                                <div class="row mt-2">
                                                    <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-6">
                                                        <div class="widget-stat card bg-primary">
                                                            <div class="card-body  p-4">
                                                                <div class="media">
                                                                    {{-- <span class="mr-3">
                                                                        <i class="la la-users"></i>
                                                                    </span> --}}
                                                                    <div class="media-body text-white">
                                                                        <p class="mb-1">Income</p>
                                                                        <h3 class="text-white">{{
                                                                            array_sum(array_column($data_set, 'income'))
                                                                            }}</h3>
                                                                        <div class="progress mb-2 bg-secondary">
                                                                            <div class="progress-bar progress-animated bg-light"
                                                                                style="width: 80%"></div>
                                                                        </div>
                                                                        <small>80% Increase in 20 Days</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-6">
                                                        <div class="widget-stat card bg-primary">
                                                            <div class="card-body  p-4">
                                                                <div class="media">
                                                                    {{-- <span class="mr-3">
                                                                        <i class="la la-users"></i>
                                                                    </span> --}}
                                                                    <div class="media-body text-white">
                                                                        <p class="mb-1">Expense</p>
                                                                        <h3 class="text-white">{{
                                                                            array_sum(array_column($data_set, 'expense')) }}</h3>
                                                                        <div class="progress mb-2 bg-secondary">
                                                                            <div class="progress-bar progress-animated bg-light"
                                                                                style="width: 80%"></div>
                                                                        </div>
                                                                        <small>80% Increase in 20 Days</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-right">
                                                        <button type="button" class="btn btn-success" wire:click="report_download">{{ __('Report Download as PDF') }}</button>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="table-responsive" id="daily_result">
                                                            <table
                                                                class="table table-hover table-bordered table-responsive-sm">
                                                                <thead class="thead-primary">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Date</th>
                                                                        <th class="text-right">Income</th>
                                                                        <th class="text-right">Expense</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($data_set as $data)
                                                                    <tr>
                                                                        <th>{{ $loop->iteration }}</th>
                                                                        <td>{{ $data['date'] }}</td>
                                                                        <td class="text-right text-success">{{
                                                                            $data['income'] }}</td>
                                                                        <td class="text-right text-danger">{{
                                                                            $data['expense'] }}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div id="yearly" class="tab-pane fade @if($tab == 'yearly') active show @endif">
                                            <div class="pt-3">
                                                <div class="basic-form mb-2">
                                                    <form wire:submit.prevent="yearly_report">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <input type="date" class="form-control"
                                                                    title="Starting date" name="yearly_starting_date"
                                                                    wire:model="yearly_starting_date">
                                                                @error('yearly_starting_date')
                                                                <div class="alert alert-danger" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-5 mt-2 mt-sm-0">
                                                                <input type="date" class="form-control"
                                                                    title="Ending date" name="yearly_ending_date"
                                                                    wire:model="yearly_ending_date">
                                                                @error('yearly_ending_date')
                                                                <div class="alert alert-danger" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-2 mt-2 mt-sm-0">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-lg">Generate</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                @if($yearly_result == true)
                                                <div class="row mt-2">
                                                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                                                        <div class="widget-stat card bg-primary">
                                                            <div class="card-body  p-4">
                                                                <div class="media">
                                                                    {{-- <span class="mr-3">
                                                                        <i class="la la-users"></i>
                                                                    </span> --}}
                                                                    <div class="media-body text-white">
                                                                        <p class="mb-1">Total Students</p>
                                                                        <h3 class="text-white">3280</h3>
                                                                        <div class="progress mb-2 bg-secondary">
                                                                            <div class="progress-bar progress-animated bg-light"
                                                                                style="width: 80%"></div>
                                                                        </div>
                                                                        <small>80% Increase in 20 Days</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                                                        <div class="widget-stat card bg-primary">
                                                            <div class="card-body  p-4">
                                                                <div class="media">
                                                                    {{-- <span class="mr-3">
                                                                        <i class="la la-users"></i>
                                                                    </span> --}}
                                                                    <div class="media-body text-white">
                                                                        <p class="mb-1">Total Students</p>
                                                                        <h3 class="text-white">3280</h3>
                                                                        <div class="progress mb-2 bg-secondary">
                                                                            <div class="progress-bar progress-animated bg-light"
                                                                                style="width: 80%"></div>
                                                                        </div>
                                                                        <small>80% Increase in 20 Days</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                                                        <div class="widget-stat card bg-primary">
                                                            <div class="card-body  p-4">
                                                                <div class="media">
                                                                    {{-- <span class="mr-3">
                                                                        <i class="la la-users"></i>
                                                                    </span> --}}
                                                                    <div class="media-body text-white">
                                                                        <p class="mb-1">Total Students</p>
                                                                        <h3 class="text-white">3280</h3>
                                                                        <div class="progress mb-2 bg-secondary">
                                                                            <div class="progress-bar progress-animated bg-light"
                                                                                style="width: 80%"></div>
                                                                        </div>
                                                                        <small>80% Increase in 20 Days</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="table-responsive" id="daily_result">
                                                            <table
                                                                class="table table-hover table-bordered table-responsive-sm">
                                                                <thead class="thead-primary">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Date</th>
                                                                        <th class="text-right">Income</th>
                                                                        <th class="text-right">Expense</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($data_set as $data)
                                                                    <tr>
                                                                        <th>{{ $loop->iteration }}</th>
                                                                        <td>{{ $data['date'] }}</td>
                                                                        <td class="text-right text-success">{{
                                                                            $data['income'] }}</td>
                                                                        <td class="text-right text-danger">{{
                                                                            $data['expense'] }}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>