<div>
    <x-slot name="header">
        <div class="sub-header">
            <div class="d-flex align-items-center flex-wrap mr-auto">
                <h5 class="dashboard_bar">Invoice</h5>
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
                            <h4 class="card-title">{{ __('Invoic List') }}</h4>
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
                                            <th><strong>{{ __('ID') }}</strong></th>
                                            <th><strong>{{ __('Price') }}</strong></th>
                                            <th><strong>{{ __('Itam') }}</strong></th>
                                            <th><strong>{{ __('Created at') }}</strong></th>
                                            <th><strong>{{ __('Created by') }}</strong></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoices as $invoice)
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
                                                <td><strong>{{ $invoice->id }}</strong></td>
                                                <td>
                                                    <div class="d-flex align-items-center"
                                                        title="Price: {{ $invoice->total_price() }} - Discount: {{ $invoice->discount_amount }} = {{ $invoice->total_price_after_discount() }} Paid: {{ $invoice->paid_amount }} Due: {{ $invoice->total_price_after_discount() - $invoice->paid_amount }}">
                                                        <i class="fa fa-circle  @if ($invoice->paid_amount < $invoice->total_price_after_discount()) text-danger @else text-success @endif mr-1"></i>
                                                        {{ $invoice->total_price_after_discount() }} </div>
                                                </td>
                                                <td>{{ $invoice->items->count() }}</td>
                                                <td>{{ $invoice->created_at->format('d M Y h:i a') }}</td>
                                                <td>{{ $invoice->creator->name ?? '#' }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button onclick="showInvoice('{{ route('invoice.show', [$invoice, 'kitchen=yes']) }}')"
                                                            class="btn btn-info shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-eye"></i></button>
                                                        <button onclick="showInvoice('{{ route('invoice.show', [$invoice]) }}')"
                                                            class="btn btn-info shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-eye"></i></button>
                                                        <a href="javascript:void(0)"
                                                            wire:click="select_for_edit({{ $invoice->id }})"
                                                            data-toggle="modal" data-target="#create_and_edit_modal"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="javascript:void(0)"
                                                            wire:click="select_for_delete({{ $invoice->id }})"
                                                            data-toggle="modal" data-target="#delete_modal"
                                                            class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a>
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

    {{-- Show inv modal --}}
        <div wire:ignore.self class="modal fade" id="inv_modal" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">{{ __('Invoice') }}</h5>
                    </div>
                    <div class="modal-body">
                        <iframe id="invoice_iframe" src="" frameborder="0" width="100%;" height="600px;"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function showInvoice(inv_url) {
                document.getElementById('invoice_iframe').src = inv_url;
                var myModal = new bootstrap.Modal(document.getElementById('inv_modal'));
                myModal.show();
            }
        </script>
</div>
