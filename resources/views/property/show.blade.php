@extends('layouts.backend.main')

@section('title', 'Housing | Property info')

@section('css')
    <link rel="stylesheet" href="/backend/css/lib/datepicker3.css">
    <link rel="stylesheet" href="/backend/css/lib/select2.min.css">
    <link rel="stylesheet" href="/backend/css/lib/parsley.css">
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
                    <li><a href="#"><i class="fa fa-dashboard"></i> Property</a></li>
                    <li><a href="#">List Property</a></li>
                    <li class="active">Housing Details</li>
                </ol>
            </section>
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Application Options</h3>
                </div>
                <div class="box-body">
                    <a class="btn btn-app" href="{{ route('property.record', [$property->id]) }}">
                        <i class="fa fa-edit"></i> Record
                    </a>
                    <a class="btn btn-app">
                        <i type="button" class="fa fa-upload" data-toggle="modal" data-target="#category">
                        </i> Add Categories
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
                        <form role="form" id="transaction" data-parsley-validate="">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control" id="amount" placeholder="Enter amount" name="amount" data-parsley-type="number" required="">
                                    <input type="hidden" class="form-control" id="userID" name="userID" value="{{ Crypt::encryptString(Auth::user()->id) }}">
                                    <input type="hidden" class="form-control" id="propertyID" name="propertyID" value="{{ Crypt::encryptString($property->id) }}">
                                </div>

                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Note for transaction ..." name="note" required=""></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="balanceType">Balance Type</label>
                                    <select class="form-control select2" name="balanceType" style="width: 100%;">
                                        <label>Balance Type</label>
                                        <option selected="selected">Credit</option>
                                        <option>Debit</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="categories">Categories</label>
                                    <select class="form-control select2" name="categories" style="width: 100%;">
                                        <label>Categories</label>
                                        @foreach($categories as $key => $category)
                                            <option value="{{ $key }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" name="date" required="">
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

                </section>
            </div>
        </section>
        <!-- /.content -->
    </div>


    <!-- Modal -->
    <div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" class="category" data-parsley-validate="">
                    <div class="modal-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="amount">Category Name</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter Name" name="title" required="">
                                </div>
                                <div class="form-group">
                                    <label for="color">Pick a Color</label>
                                    <input type="color" class="form-control" id="color" name="color" value="#ff0000" required="">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="/backend/js/lib/bootstrap-datepicker.js"></script>
<script src="/backend/js/lib/select2.full.min.js"></script>
<script src="/backend/js/lib/parsley.min.js"></script>
<script src="/backend/js/property/transcation.js"></script>
@endsection