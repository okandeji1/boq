@extends('user.layouts.layout')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Invoice</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Invoice</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="invoice-title">
                                        <h4 class="pull-right">Order # 12345</h4>
                                        <img src="/assets/images/logo.png" alt="logo" height="100">
                                        <h4>BOQ</h4>
                                        <p><a href="#/">www.boqaul.herokuapp.com</a></p>
                                        <p>23, Tide Gate <br> Ijora Kingdom, Lagos<br> Nigeria. </p> <p> Telephone: +2347087828631<br> Fax: 111-000-0000 </p>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <address>
                                                <strong>Billed To:</strong><br> John Smith<br> 1234 Main<br> Apt. 4B<br> Springfield, ST 54321
                                            </address>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <address>
                                                <strong>Shipped To:</strong><br> Kenny Rigdon<br> 1234 Main<br> Apt. 4B<br> Springfield, ST 54321
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <address> <strong>Payment Method:</strong><br> Visa ending **** 4242<br> jsmith@email.com
                                            </address>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <address>
                                                <strong>Order Date:</strong><br> October 7, 2016<br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>Item</strong></td>
                                                            <td class="text-center"><strong>Price</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Quantity</strong>
                                                            </td>
                                                            <td class="text-right"><strong>Totals</strong>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>BS-200</td>
                                                            <td class="text-center">$10.99</td>
                                                            <td class="text-center">1</td>
                                                            <td class="text-right">$10.99</td>
                                                        </tr>
                                                        <tr>
                                                            <td>BS-400</td>
                                                            <td class="text-center">$20.00</td>
                                                            <td class="text-center">3</td>
                                                            <td class="text-right">$60.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>BS-1000</td>
                                                            <td class="text-center">$600.00</td>
                                                            <td class="text-center">1</td>
                                                            <td class="text-right">$600.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line text-center">
                                                                <strong>Subtotal</strong>
                                                            </td>
                                                            <td class="thick-line text-right">$670.99</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Shipping</strong>
                                                            </td>
                                                            <td class="no-line text-right">$15</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Total</strong>
                                                            </td>
                                                            <td class="no-line text-right">
                                                                <h4 class="m-0">$685.99</h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="hidden-print">
                                                <div class="pull-right">
                                                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>
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
@endsection