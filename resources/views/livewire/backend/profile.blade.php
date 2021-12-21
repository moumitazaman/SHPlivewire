<div>
    <x-slot name="header">
        <div class="sub-header">
            <div class="d-flex align-items-center flex-wrap mr-auto">
                <h5 class="dashboard_bar">Profile</h5>
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
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo"></div>
                            </div>
                            <div class="profile-info">
                                <div class="profile-photo">
                                    <img src="{{ asset(auth()->user()->image ?? 'assets/images/no_image.png') }}"
                                        class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
                                        <p>{{ auth()->user()->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="profile-email px-2 pt-2">
                                        <h4 class="text-muted mb-0">{{ auth()->user()->email }}</h4>
                                        <p>{{ auth()->user()->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                                class="nav-link">About Me</a>
                                        </li>
                                        <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                                class="nav-link active">Setting</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-3">
                                                    <h4 class="text-primary">About Me</h4>
                                                    <p class="mb-2">{!! auth()->user()->note !!}</p>
                                                </div>
                                            </div>
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Name <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7">
                                                        <span>{{ auth()->user()->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Email <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7">
                                                        <span>{{ auth()->user()->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Phone <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7">
                                                        <span>{{ auth()->user()->phone }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Address <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7">
                                                        <span>{{ auth()->user()->address }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Gender <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7">
                                                        <span>{{ auth()->user()->gender }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Join at <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7">
                                                        <span>{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="profile-settings" class="tab-pane fade active show">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    <h4 class="text-primary">Account Setting</h4>
                                                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                                                        <div>
                                                            @if (session()->has('message'))
                                                                <div class="alert alert-success">
                                                                    {{ session('message') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" placeholder="Full name"
                                                                class="form-control" required wire:model="name">
                                                            @error('name')
                                                                <div class="alert alert-danger solid alert-square ">
                                                                    <strong>Error!</strong>
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Email</label>
                                                                <input type="email" placeholder="Email"
                                                                    class="form-control" required wire:model="email">
                                                                @error('email')
                                                                    <div class="alert alert-danger solid alert-square ">
                                                                        <strong>Error!</strong>
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Phone</label>
                                                                <input type="text" placeholder="Phone number"
                                                                    class="form-control" required wire:model="phone">
                                                                @error('phone')
                                                                    <div class="alert alert-danger solid alert-square ">
                                                                        <strong>Error!</strong>
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Password</label>
                                                                <input type="password" placeholder="Password"
                                                                    class="form-control" wire:model="password">
                                                                @error('password')
                                                                    <div class="alert alert-danger solid alert-square ">
                                                                        <strong>Error!</strong>
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Profile Image</label>
                                                                <input type="file" accept="image/*"
                                                                    class="form-control" wire:model="image">
                                                                <div wire:loading wire:target="image">Uploading...</div>
                                                                @if ($image)
                                                                    <div class="row">
                                                                        <div class="col-3 card me-1 mb-1">
                                                                            <img src="{{ $image->temporaryUrl() }}">
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @error('image')
                                                                    <div class="alert alert-danger solid alert-square ">
                                                                        <strong>Error!</strong>
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" placeholder="Full address"
                                                                class="form-control" required wire:model="address">
                                                            @error('address')
                                                                <div class="alert alert-danger solid alert-square ">
                                                                    <strong>Error!</strong>
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    required id="agree">
                                                                <label class="custom-control-label" for="agree">
                                                                    Yes all data is correct</label>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit"> Save </button>
                                                    </form>
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
</div>
