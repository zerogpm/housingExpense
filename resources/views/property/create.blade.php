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
                    Create Housing Property
                    <small>#007612</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Property</a></li>
                    <li><a href="#">Add New</a></li>
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
                    <a class="btn btn-app" href="{{ route('property.index') }}">
                        <i class="fa fa-edit"></i> Listing Property
                    </a>
                </div>
                <!-- /.box-body -->
                <section class="invoice">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Property Entry</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" id="property" data-parsley-validate="">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="amount">Property Name:</label>
                                    <input type="text" class="form-control" id="description" placeholder="Enter Name" name="description" required="">
                                </div>

                                <div class="form-group">
                                    <label>Address:</label>
                                    <input class="form-control" type="text" placeholder="Enter Address" id="address" name="address" required="">
                                </div>

                                <div class="form-group">
                                    <label>Post Code:</label>
                                    <input class="form-control" type="text" placeholder="Enter Post Code" id="post_code" name="post_code" required="">
                                </div>

                                <div class="form-group">
                                    <label for="interest_rate">Interest Rate:</label>
                                    <input type="text" class="form-control" id="interest_rate" placeholder="Enter Rate" name="interest_rate" data-parsley-type="number" required="">
                                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Crypt::encryptString(Auth::user()->id) }}">
                                </div>

                                <div class="form-group">
                                    <label for="principal_amount">Principal Amount:</label>
                                    <input type="text" class="form-control" id="principal_amount" placeholder="Enter Principal" name="principal_amount" data-parsley-type="number" required="">
                                </div>

                                <div class="form-group">
                                    <label for="payment">Payment:</label>
                                    <input type="text" class="form-control" id="payment" placeholder="Enter payment" name="payment" data-parsley-type="number" required="">
                                </div>

                                <div class="form-group">
                                    <label>Payment Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" id="datepicker" name="payment_date" required="">
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Purchase Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" id="datepicker" name="purchased_date" required="">
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Renew Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" id="datepicker" name="renew_date" required="">
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
                <div class="modal-body">
                    <form role="form" id="transaction">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="amount">Category Name</label>
                                <input type="text" class="form-control" id="amount" placeholder="Enter amount" name="amount" data-parsley-type="number" required="">
                            </div>
                            <div class="form-group">
                                <label for="color">Pick a Color</label>
                                <input type="color" class="form-control" id="color" name="color" value="#ff0000" required="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="/backend/js/lib/bootstrap-datepicker.js"></script>
    <script src="/backend/js/lib/select2.full.min.js"></script>
    <script src="/backend/js/lib/parsley.min.js"></script>
    <script src="/backend/js/property/create.js"></script>
@endsection