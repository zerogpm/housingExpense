@extends('layouts.backend.main')

@section('title', 'Housing | Property info')

@section('css')
    <link rel="stylesheet" href="/backend/css/lib/datepicker3.css">
    <link rel="stylesheet" href="/backend/css/lib/select2.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <section class="content-header">
                <h1>
                    Housing Details
                    <small>#007612</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Invoice</li>
                </ol>
            </section>
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="pad margin no-print">
                <div class="callout callout-info" style="margin-bottom: 0!important;">
                    <h4><i class="fa fa-info"></i> Note:</h4>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>
            </div>


            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-home"></i> {{ $property->description }}
                            <small class="pull-right">Date: {{ $property->created_at }}</small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Address</strong><br>
                            {{ $property->address }}<br>
                            {{ $property->post_code }}<br>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Status</strong><br>
                            <b>Interest rate:</b> {{ $property->interest_rate }}<br>
                            <b>Principal Amount:</b> {{ $property->principal_amount }}<br>
                            <b>Payment each month:</b> {{ $property->payment }}<br>
                            <b>Each month paid at</b> {{ $property->payment_date }}<br>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Purchased Date: </b>{{ $property->purchased_date }}<br>
                        <br>
                        <b>Renew Date</b> {{ $property->renew_date }}<br>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Transaction Entry</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" id="amount" placeholder="Enter amount">
                            </div>

                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" rows="3" placeholder="Note for transaction ..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="balanceType">Balance Type</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <label>Balance Type</label>
                                    <option selected="selected">Credit</option>
                                    <option>Debit</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Application Options</h3>
                    </div>
                    <div class="box-body">
                        <a class="btn btn-app">
                            <i class="fa fa-edit"></i> History
                        </a>
                        <a class="btn btn-app">
                            <i class="fa fa-play"></i> Play
                        </a>
                        <a class="btn btn-app">
                            <i class="fa fa-repeat"></i> Repeat
                        </a>
                        <a class="btn btn-app">
                            <i class="fa fa-pause"></i> Pause
                        </a>
                        <a class="btn btn-app">
                            <i class="fa fa-save"></i> Save
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-yellow">3</span>
                            <i class="fa fa-bullhorn"></i> Notifications
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-green">300</span>
                            <i class="fa fa-barcode"></i> Products
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-purple">891</span>
                            <i class="fa fa-users"></i> Users
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-teal">67</span>
                            <i class="fa fa-inbox"></i> Orders
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-aqua">12</span>
                            <i class="fa fa-envelope"></i> Inbox
                        </a>
                        <a class="btn btn-app">
                            <span class="badge bg-red">531</span>
                            <i class="fa fa-heart-o"></i> Likes
                        </a>
                    </div>
                    <!-- /.box-body -->
                </div>

            </section>
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('scripts')
<script src="/backend/js/lib/bootstrap-datepicker.js"></script>
<script src="/backend/js/lib/select2.full.min.js"></script>
<script src="/backend/js/custom.js"></script>
@endsection