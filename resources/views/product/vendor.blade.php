@extends('user.layouts.layout')
@section('content')
<!-- Start content -->
<div class="content">
        @include('user.partials.messages')
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-title">
                    <h4 class="pull-left page-title">Vendors</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">Table</a></li>
                        <li class="active">Vendor List</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vendor Table</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                               <button class="btn btn-success" data-toggle="modal" data-target="#addVendor" style="margin-bottom: 2rem"><span class="fa fa-plus"></span> Create New</button>
                            </div>
                            <div class="col-xs-12">
                                <div class="table-responsive table-hover table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vendors as $vendor)
                                            <tr>
                                                <td>{{$vendor->id}}</td>
                                                <td>{{$vendor->name}}</td>
                                                <td>{{$vendor->email}}</td>
                                                <td>{{$vendor->phone}}</td>
                                                <td>{{$vendor->created_at}}</td>
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
        </div> <!-- End row -->
    </div> <!-- container -->

</div> 
<!-- content -->

<!-- Modal -->
<div class="modal fade" id="addVendor" tabindex="-1" role="dialog" aria-labelledby="addVendor" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVendor">Add New Vendor</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/product-vendor" method="post">
                    {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="name" class="form-control :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Vendor Name" required>
                    <has-error :form="form" field="name"></has-error>
                </div>
                <div class="form-group">
                    <input type="email" parsley-type="email" name="email" class="form-control :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Vendor Email" required>
                    <has-error :form="form" field="email"></has-error>
                </div>
                <div class="form-group">
                    <input type="text" name="phone" data-parsley-type="number" class="form-control :class="{ 'is-invalid': form.errors.has('phone') }" placeholder="Vendor Phone Number" required>
                    <has-error :form="form" field="phone"></has-error>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Add Vendor</button>
            </div>
            </form>
            </div>
        </div>
    </div>
@endsection