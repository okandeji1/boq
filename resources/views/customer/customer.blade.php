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
                    <h4 class="pull-left page-title">All Customers</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">customers Table</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">customer List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                               <button class="btn btn-success" data-toggle="modal" data-target="#addcustomer" style="margin-bottom: 2rem"><span class="fa fa-plus"></span> Create New</button>
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
                                                <th>Address</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{$customer->id}}</td>
                                                <td>{{$customer->name}}</td>
                                                <td>{{$customer->email}}</td>
                                                <td>{{$customer->phone}}</td>
                                                <td>{{$customer->address}}</td>
                                                <td>{{$customer->created_at}}</td>
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
<div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="addcustomer" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addcustomer">Add New Customer</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/customer" method="post">
                    {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="name" class="form-control :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Customer Name" required>
                    <has-error :form="form" field="name"></has-error>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Customer email" required>
                    <has-error :form="form" field="email"></has-error>
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control :class="{ 'is-invalid': form.errors.has('phone') }" placeholder="Customer phone number" required>
                    <has-error :form="form" field="phone"></has-error>
                </div>
                <div class="form-group">
                    <textarea name="address" class="form-control :class="{ 'is-invalid': form.errors.has('address') }" placeholder="Customer address" required></textarea>
                    <has-error :form="form" field="address"></has-error>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit">Save</button>
            </div>
            </form>
            </div>
        </div>
    </div>
@endsection