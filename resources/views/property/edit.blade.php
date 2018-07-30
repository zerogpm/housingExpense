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
                    Record Details
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Property</a></li>
                    <li><a href="#">List Property</a></li>
                    <li class="active">Record Details</li>
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
                    <a class="btn btn-app" href="{{ route('property.record', [$transaction->property_id]) }}">
                        <i class="fa fa-edit"></i> Record
                    </a>
                </div>
                <!-- /.box-body -->
                <section class="invoice">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Record Entry</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" id="transaction" data-parsley-validate="" method="post" action="{{ route('property.record.update', [$transaction->id]) }}">
                            <div class="box-body">
                                @if ($flash = session('message'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                        {{ $flash }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control" id="amount" placeholder="Enter amount" name="amount" data-parsley-type="number" required="" value="{{ $transaction->amount }}">
                                    <input type="hidden" class="form-control" id="userID" name="userID" value="{{ Crypt::encryptString(Auth::user()->id) }}">
                                    <input type="hidden" class="form-control" id="propertyID" name="propertyID" value="{{ Crypt::encryptString($transaction->id) }}">
                                </div>

                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Note for transaction ..." name="description" required="">{{ $transaction->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="balanceType">Balance Type</label>
                                    <select class="form-control select2" name="balanceType" style="width: 100%;">
                                        <label>Balance Type</label>
                                        @if (count($transaction))
                                            @if($transaction->balanceType === 'Debit')
                                                <option selected="selected">Debit</option>
                                                <option>Credit</option>
                                            @else
                                                <option selected="selected">Credit</option>
                                                <option>Debit</option>
                                            @endif
                                        @else
                                            <option selected="selected">Credit</option>
                                            <option>Debit</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" name="insert_date" required="" value="{{ $transaction->insert_date->format('Y-m-d') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-danger" href="{{ route('property.record', [$transaction->property_id]) }}">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('scripts')
    <script src="/backend/js/lib/bootstrap-datepicker.js"></script>
    <script src="/backend/js/lib/select2.full.min.js"></script>
    <script src="/backend/js/lib/parsley.min.js"></script>
    <script src="/backend/js/property/updateTranscation.js"></script>
@endsection