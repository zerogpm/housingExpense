@extends('layouts.backend.main')

@section('title', 'Housing | Property info')

@section('css')
    <link rel="stylesheet" href="/backend/css/lib/datepicker3.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <section class="content-header">
                <h1>
                    Housing Details
                    <small>#007622</small>
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
                    <a class="btn btn-app" href="{{ route('property.show', [$id]) }}">
                        <i class="fa fa-mail-reply"></i> Go Back
                    </a>

                    <div>
                        <form class="js-form-select" action="{{ route("property.record", [$id])}}">
                            <select name="selectedYear" class="form-control" style="margin-bottom: 10px" id="selectedYear">
                                <option value="none">Select a Year</option>
                                @foreach($yearListing as $list)
                                    <option value="{{ $list->yearList }}" <?php if (Request::get('selectedYear') == $list->yearList) echo 'selected="selected"'; ?> >{{ $list->yearList }}</option>
                                @endforeach
                            </select>
                        </form>
                    <div>

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Responsive Hover Table</h3>

                            <div class="box-tools">
                                <form action="{{ route("property.record", [$id]) }}" role="search">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="term" value="{{ Request::get("term") }}" class="form-control pull-right" placeholder="Search">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>Amount</th>
                                    <th>Blalance Type</th>
                                    <th>Note</th>
                                    <th>Date</th>
                                </tr>
                                @foreach( $transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->balanceType }}</td>
                                        <td>{{ $transaction->description }}</td>
                                        <td>{{ $transaction->insert_date->format('Y-m-d') }}</td>
                                        <td><a ref="#" class="btn btn-danger">Edit</a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>Total: {{ $totalAmount }}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {{ $transactions->appends(['selectedYear' => $year])->links() }}
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('scripts')
    <script src="/backend/js/lib/bootstrap-datepicker.js"></script>
    <script src="/backend/js/lib/select2.full.min.js"></script>
    <script src="/backend/js/lib/parsley.min.js"></script>
    <script src="/backend/js/property/selectYear.js"></script>
@endsection