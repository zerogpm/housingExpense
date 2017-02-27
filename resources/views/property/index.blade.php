@extends('layouts.backend.main')

@section('title', 'Housing | Property Listing')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Property Listing
                <small>Listing all Property</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <div class="row">
                                @foreach($properties as $property)
                                    <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                        <div class="small-box bg-aqua">
                                            <div class="inner">
                                                <h3>{{ $property->description }}</h3>

                                                <p>{{ $property->address }}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <a href="{{ route('property.show', $property->id) }}" class="small-box-footer">
                                                More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- ./col -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
