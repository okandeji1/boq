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
                    <h4 class="pull-left page-title">Products</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Products Table</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Product List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                               <button class="btn btn-success" data-toggle="modal" data-target="#addProduct" style="margin-bottom: 2rem"><span class="fa fa-plus"></span> Create New</button>
                            </div>
                            <div class="col-xs-12">
                                <div class="table-responsive table-hover table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->category->name}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->description}}</td>
                                                <td>{{$product->created_at}}</td>
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
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProduct">Add New Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/product" method="post">
                    {{ csrf_field() }}
                <div class="form-group">
                    <select name="category" class="form-control :class="{ 'is-invalid': form.errors.has('category') }" required>
                        <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <has-error :form="form" field="category"></has-error>
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Product Name" required>
                    <has-error :form="form" field="name"></has-error>
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control :class="{ 'is-invalid': form.errors.has('description') }" placeholder="Product description" required></textarea>
                    <has-error :form="form" field="description"></has-error>
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