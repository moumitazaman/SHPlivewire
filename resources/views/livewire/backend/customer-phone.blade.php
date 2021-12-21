<div>
    <x-slot name="header">
        <div class="sub-header">
            <div class="d-flex align-items-center flex-wrap mr-auto">
                <h5 class="dashboard_bar">Customer Phone Numbers</h5>
            </div>
            <div class="d-flex align-items-center">
                <a href="javascript:void(0);" class="btn btn-xs btn-primary light logout-btn">Logout</a>
            </div>
        </div>
    </x-slot>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-xl-12 col-lg-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">{{ __('Customer phone number list') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:50px;">
                                                <div
                                                    class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                    <input type="checkbox" class="custom-control-input" id="checkAll"
                                                        required="">
                                                    <label class="custom-control-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th><strong>{{ __('#') }}</strong></th>
                                            <th><strong>{{ __('Phone') }}</strong></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($phone_numbers as $data)
                                            <tr>
                                                <td>
                                                    <div
                                                        class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheckBox{{ $loop->iteration }}" required="">
                                                        <label class="custom-control-label"
                                                            for="customCheckBox{{ $loop->iteration }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $data->customer_phone }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button 
                                                            class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-bolt" aria-hidden="true"></i></button>
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <div wire:ignore.self class="modal fade" id="delete_modal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p>Are you sure want to delete?</p>
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal"
                        data-dismiss="modal">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
