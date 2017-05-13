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
                        <h4>Update! 2017/05/12</h4>

                        <p>
                            1. Date time have been fixed. Instead of 2017-12-20 00:00:00, 2017-12-20 will be presented.<br/>
                            2. Email will be sent if you lose your password.
                            3. Money format is using US standard now.
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
