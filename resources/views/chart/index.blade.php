@extends('layouts.backend.main')

@section('title', 'Housing | Property info')

@section('css')
@endsection

@section('content')

    <!-- Data -->
    <span id="title" data-title="{{ json_encode($barTitle) }}"></span>
    <span id="color" data-color="{{ json_encode($barColor) }}"></span>
    <span id="pie_sum" data-pie-sum="{{ json_encode($pieSum) }}"></span>
    <span id="barSum" data-bar-sum="{{ json_encode($barSum) }}"></span>
    <span id="barMonth" data-bar-month="{{ json_encode($barMonth) }}"></span>
    <!-- end Data -->

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
                    <a class="btn btn-app" href="{{ route('property.show', [$id]) }}">
                        <i class="fa fa-mail-reply"></i> Go Back
                    </a>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Bar Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="barChart" style="height:250px"></canvas>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Donut Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <canvas id="pieChart" style="height:250px"></canvas>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="/backend/js/chart/getData.js"></script>
@endsection