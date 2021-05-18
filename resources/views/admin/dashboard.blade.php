@extends('admin.layouts.master')

@section('content')

{{--    {{ trans('quickadmin::admin.dashboard-title') }}--}}




    <div class="row">


        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-globe"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Country</span>
                    <span class="info-box-number">{{$country}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>


        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-tags"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Category</span>
                    <span class="info-box-number">{{$category}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Station</span>
                    <span class="info-box-number">{{$station}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

    </div>

@endsection