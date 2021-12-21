<div>
    <x-slot name="header">
        <div class="sub-header">
            <div class="d-flex align-items-center flex-wrap mr-auto">
                <h5 class="dashboard_bar">Product</h5>
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
                            <h4 class="card-title">{{ __('Products') }}</h4>
                            <button type="button" class="btn btn-primary" wire:click="create_new"
                                data-toggle="modal" data-target="#create_and_edit_modal">Create New</button>
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
                                            <th><strong>{{ __('NO.') }}</strong></th>
                                            <th><strong>{{ __('Status') }}</strong></th>
                                            <th><strong>{{ __('Online Status') }}</strong></th>
                                            <th><strong>{{ __('Name') }}</strong></th>
                                            <th><strong>{{ __('Price') }}</strong></th>
                                            <th><strong>{{ __('Category') }}</strong></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <div
                                                        class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheckBox2" required="">
                                                        <label class="custom-control-label"
                                                            for="customCheckBox2"></label>
                                                    </div>
                                                </td>
                                                <td><strong>{{ $loop->iteration }}</strong></td>
                                                <td>
                                                    @if ($product->status)
                                                        <div class="d-flex align-items-center"><i
                                                                class="fa fa-circle text-success mr-1"></i>
                                                            {{ __('Active') }} </div>
                                                    @else
                                                        <div class="d-flex align-items-center"><i
                                                                class="fa fa-circle text-danger mr-1"></i>{{ __('Inactive') }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($product->online)
                                                        <div class="d-flex align-items-center"><i
                                                                class="fa fa-circle text-success mr-1"></i>
                                                            {{ __('Online') }} </div>
                                                    @else
                                                        <div class="d-flex align-items-center"><i
                                                                class="fa fa-circle text-danger mr-1"></i>{{ __('Only Offline') }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center"><img src="{{ asset($product->image ?? 'assets/images/no_food.png') }}" class="rounded-lg mr-2" width="24" alt=""> <span class="w-space-no">{{ $product->name }}</span></div>
                                                </td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->category->name ?? '' }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="javascript:void(0)"
                                                            wire:click="select_for_edit({{ $product->id }})"
                                                            data-toggle="modal" data-target="#create_and_edit_modal"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="javascript:void(0)"
                                                            wire:click="select_for_delete({{ $product->id }})"
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

    <!-- Create and edit Modal -->
    <div wire:ignore.self class="modal fade" id="create_and_edit_modal" data-backdrop="static" tabindex="-1"
        role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">{{ __('Product information') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <form wire:submit.prevent="save" enctype="multipart/form-data">
                            <div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Product Name </label>
                                    <input type="text" class="form-control" placeholder="Product name" required
                                        wire:model="name">
                                    @error('name')
                                        <div class="alert alert-danger solid alert-square "><strong>Error!</strong>
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Product Price</label>
                                    <input type="number" class="form-control" placeholder="Product price" required
                                        wire:model="price">
                                    @error('price')
                                        <div class="alert alert-danger solid alert-square "><strong>Error!</strong>
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Product Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" accept="image/*"
                                                wire:model="image">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                    <div wire:loading wire:target="image">Uploading...</div>
                                    @if ($image)
                                        <div class="row">
                                            <div class="col-3 card me-1 mb-1">
                                                <img src="{{ $image->temporaryUrl() }}">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Product category</label>
                                    <select name="" id="" class="form-control default-select" required
                                        wire:model="category">
                                        <option selected="">Choose category...</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}">
                                                {{ $productCategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="alert alert-danger solid alert-square "><strong>Error!</strong>
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="custom-control-input" checked="" id="status"
                                            wire:model="status">
                                        <label class="custom-control-label" for="status">Status</label>
                                    </div>
                                    @error('status')
                                        <div class="alert alert-danger solid alert-square "><strong>Error!</strong>
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="custom-control-input" checked="" id="online"
                                            wire:model="online">
                                        <label class="custom-control-label" for="online">Online</label>
                                    </div>
                                    @error('online')
                                        <div class="alert alert-danger solid alert-square "><strong>Error!</strong>
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Save Product') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
