@extends('layouts.backend.main')

@section('title', 'Housing | Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dasbhboard
            </h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="callout callout-info">
                        <h4>Update! 2018/07/29</h4>

                        <p>
                            1. added Edit function (Todo add Validation for Edit)
                        </p>
                    </div>

                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <h3>Welcome</h3>
                            <p class="lead text-muted">Hallo {{ Auth::user()->name }}, Welcome to Housing App</p>

                            <h4>Get started</h4>
                            <p><a href="{{ route('property.create') }}" class="btn btn-primary">Build your new House info</a> </p>
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
