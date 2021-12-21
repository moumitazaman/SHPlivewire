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
            <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">{{ __('Documents') }}</h4>
                            <button type="button" class="btn btn-primary" wire:click="create_new"
                                data-toggle="modal" data-target="#create_and_edit_modal">Create New</button>
                        </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="30%">Title</th>
                        <th width="20%">Type</th>
                        <th width="25%">Year</th>
                        <th width="25%">Location</th>
                        <th width="25%">User</th>
                        <th width="25%">Notes</th>

                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $row)
                      <tr>
                          <td style="font-weight: bold">{{$row->title}}</td>
                          <td style="font-weight: bold">{{$row->type}}</td>
                          <td style="font-weight: bold">{{$row->year}}</td>
                         <td style="font-weight: bold">{{$row->location}}</td>
@php
$user=@App\User::where('id',$row->user_id)->value('name');
@endphp
                          <td style="font-weight: bold">{{$user}}</td>

                          <td style="font-weight: bold">{{$row->note}}</td>

                          <td> 
                          <div class="row">&nbsp;&nbsp;&nbsp;
                            <a download class="btn btn-sm btn-primary" @if($row->document) href="{{URL::to('/')}}/uploads/documents/{{$row->document}}" @endif><i class="fa fa-download"></i></a>&nbsp;
                            
                          </td>
                        </tr>
                          
                    @endforeach
                </tbody>
            </table> 

            </div>
            </div>
            </div>
    </div>
    <div wire:ignore.self class="modal fade" id="create_and_edit_modal" data-backdrop="static" tabindex="-1"
        role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">{{ __('Document information') }}</h5>
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
                                    <label>Title </label>
                                    <input type="text" class="form-control" placeholder="Document Name" required
                                        wire:model="name">
                                    @error('name')
                                        <div class="alert alert-danger solid alert-square "><strong>Error!</strong>
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Year</label>
                                    <input type="number" class="form-control" placeholder="Year" required
                                        wire:model="year">
                                    @error('year')
                                        <div class="alert alert-danger solid alert-square "><strong>Error!</strong>
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Document</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" accept="image/*"
                                                wire:model="document">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                    <div wire:loading wire:target="document">Uploading...</div>
                                    @if ($document)
                                        <div class="row">
                                            <div class="col-3 card me-1 mb-1">
                                                <img src="{{ $document->temporaryUrl() }}">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Notes</label>
                                    <textarea  class="form-control" wire:model="notes" >  </textarea>
                                    <input type="hidden" wire:model="location" value="o">
                        <input type="hidden" wire:model="user_id" value="{{ auth()->user()->id }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Save Document') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>