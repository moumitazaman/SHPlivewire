<div class="row m-1">
    <div class="col-12">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-danger text-white d-flex justify-content-between">
                <div>
                    {{-- <h4 class="card-title">{{ __('Products') }}</h4> --}}
                    <select name="" id="" class="form-select select2" wire:model="searched_product_category">
                        <option value="all">{{ __('All Category') }}</option>
                        @foreach ($productCategories as $productCategory)
                        <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Search" wire:model="searched_product">
                </div>
                <div>
                    <form wire:submit.prevent="addByProductID">
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Product ID" name="product_id_number"
                                wire:model="product_id_number">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">+</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body product-card">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-3">
                        <div class="card m-1 hoverable" wire:click="addToCard({{ $product->id }})">
                            <img class="card-img-top rounded mx-auto d-block" height="90px;"
                                style="margin-bottom: -10px;"
                                src="{{ asset($product->image ?? 'assets/images/no_food.png') }}">
                            <div class="card-body text-center">
                                <p class="card-text" style="margin-bottom: -5px;">{{ $product->id }}) {{ $product->name
                                    }}</p>
                                <span class="badge bg-primary">{{ $product->price }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-danger text-white d-flex justify-content-between">
                <div>
                    <div class="input-group">
                        <input type="number" class="form-control" placeholder="Sales receipt ID"
                            name="sales_receipt_id" wire:model="sales_receipt_id">
                        <div class="input-group-append">
                            @if($sales_receipt_id)
                            <a href="{{ url('/invoice/'.$sales_receipt_id.'?kitchen=yes') }}" class="btn btn-success" target="_blank">PRINT</a>
                            @endif
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Logout
                    </button>
                </form>
            </div>
            <div class="card-body product-card">
                <div class="row" style="font-size: 8px;">
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-append" style="width:30%;">
                                <span class="input-group-text">Price</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ array_sum(array_column($basket, 'sub_total_price')) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group-append" style="width:20%;">
                                <span class="input-group-text">P</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" placeholder="Mobile number"
                                wire:model="customer_phone">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-prepend" style="width:30%;">
                                <span class="input-group-text">Discount</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" style="width:40%;"
                                placeholder="Discount" wire:model="discount_amount">
                            <div class="input-group-append" style="width:30%;">
                                <span class="input-group-text">Pay:
                                    {{ array_sum(array_column($basket, 'sub_total_price')) - round($discount_amount, 1)
                                    }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form-check mt-2" style="font-size: 16px;">
                            <input class="form-check-input" type="checkbox" value="" id="parcel" wire:model="parcel">
                            <label class="form-check-label" for="parcel">
                                Parcel check
                            </label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-prepend" style="width:30%;">
                                <span class="input-group-text">Paid</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" style="width:40%;"
                                placeholder="Paid amount" wire:model="paid_amount">
                            <div class="input-group-append" style="width:30%;">
                                <span class="input-group-text">Re.
                                    {{ -array_sum(array_column($basket, 'sub_total_price')) + round($paid_amount, 2) +
                                    round($discount_amount, 1) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="m-2">
                            @if(count($basket) > 0)
                            <button type="button" class="btn btn-danger btn-sm btn-block" style="width: 100%;"
                                wire:click="save">Save Invoice</button>
                            @endif
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead class="bg-info text-white">
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td style="text-align: right;">Price</td>
                            <td style="text-align: right;">QT</td>
                            <td style="text-align: right;">Total</td>
                            <td style="text-align: right;">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($basket as $basket_item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style="font-size:12px;">{{ $basket_item['name'] }}</td>
                            <td style="text-align: right;">{{ $basket_item['price'] }}</td>
                            <td style="text-align: right;">{{ $basket_item['qty'] }}</td>
                            <td style="text-align: right;">{{ $basket_item['price'] * $basket_item['qty'] }}</td>
                            <td style="text-align: right;">
                                <i class="fa fa-plus-square fa-lg text-success hoverable"
                                    wire:click="addToCard({{ $basket_item['id'] }})"></i>
                                <i class="fa fa-minus-square fa-lg text-warning hoverable"
                                    wire:click="removeFromCard({{ $basket_item['id'] }})"></i>
                                <i class="fa fa-trash fa-lg text-danger hoverable"
                                    wire:click="allRemoveFromCard({{ $basket_item['id'] }})"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($invoice_url)
    <script>
        function alert_function(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Success',
                showConfirmButton: false,
                timer: 800
            });
        }
        alert_function();
    </script>
    <div wire:ignore.self class="modal fade" id="inv_modal" data-backdrop="static" data-bs-keyboard="false" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">{{ __('Invoice') }}</h5>
                </div>
                <div class="modal-body">
                    <iframe src="{{ $invoice_url }}" frameborder="0" width="100%;" height="600px;"></iframe>
                </div>
            </div>
        </div>
    </div>

    
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <script type="text/javascript">
        function openModal() {
            var myModal = new bootstrap.Modal(document.getElementById('inv_modal'));
            myModal.show();
        }
        openModal(); 
    </script>
    @endif
</div>