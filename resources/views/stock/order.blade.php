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
                    <h4 class="pull-left page-title">Orders</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Order Table</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Make Order</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                               <button class="btn btn-success" data-toggle="modal" data-target="#stockIn" style="margin-bottom: 2rem"><span class="fa fa-plus"></span> Make New Order</button>
                            </div>
                            <div class="col-xs-12">
                                <div class="table-responsive table-hover table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>Total Amount</th>
                                                <th>Paid</th>
                                                <th>Due</th>
                                                <th>Sold By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stocks as $stock)
                                            <tr>
                                                <td>{{$stock->id}}</td>
                                                <td>{{$stock->category->name}}</td>
                                                <td>{{$stock->product->name}}</td>
                                                <td>{{$stock->vendor->name}}</td>
                                                <td>{{$stock->quantity}}</td>
                                                <td>{{$stock->cost}}</td>
                                                <td>{{$stock->selling}}</td>
                                                <td>{{$stock->date}}</td>
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
<div class="modal fade" id="stockIn" tabindex="-1" role="dialog" aria-labelledby="stockIn" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stockIn">Add New Order</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <select name="customer" class="form-control :class="{ 'is-invalid': form.errors.has('customer') }" required>
                            <option value="">Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{$customer->name}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                            <has-error :form="form" field="customer"></has-error>
                    </div>
                    <div class="form-group">
                        <select name="product" id="product" class="form-control :class="{ 'is-invalid': form.errors.has('product') }" required>
                            <option value="">Select Product</option>
                                @foreach ($products as $product)
                                    <option value="{{$product->name}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                            <has-error :form="form" field="product"></has-error>
                    </div>
                    <div class="form-group">
                        <input type="text" name="quantity" class="form-control :class="{ 'is-invalid': form.errors.has('quantity') }" placeholder="Product Quantity" required>
                        <has-error :form="form" field="quantity"></has-error>
                    </div>
                    <div class="form-group">
                        <input type="text" name="selling" class="form-control :class="{ 'is-invalid': form.errors.has('selling') }" placeholder="Selling Price" required>
                        <has-error :form="form" field="selling"></has-error>
                    </div>
                    <div class="form-group">
                        <input type="date" name="date" class="form-control :class="{ 'is-invalid': form.errors.has('date') }" placeholder="Date" required>
                        <has-error :form="form" field="date"></has-error>
                    </div>
                    <div class="form-group">
                        <textarea name="note" class="form-control :class="{ 'is-invalid': form.errors.has('note') }" placeholder="Note (Optional)" required></textarea>
                        <has-error :form="form" field="note"></has-error>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-success" type="submit" id="sub">Order</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script src="/assets/js/jquery.min.js"></script>
    <!-- Script -->
<script>

       // Get the value of select product
       var product = $('#product');
       product.on('selected', function(e){
           console.log($('#product').val())
       })
       console.log(product)
    
        // Settings
        var settings = {
            "async": true,
            "processData": true,
            url: '{{url("/sp")}}',
            method: "POST",
            data: {
            "_token": "{{ csrf_token() }}",
            "product": product
            }
        };
</script>
@endsection
