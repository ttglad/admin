@extends('admin.layout._back')

@section('content-header')
    @parent
    <h1>
        控制面板
        <small>概述</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">控制面板 - 概述</li>
    </ol>
@stop

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>100<sup style="font-size: 20px">个</sup></h3>
                    <p>人员总数，包括（关闭）</p>
                </div>
                <div class="icon">
                    <i class="ion ion-chatboxes"></i>
                </div>
                <a href="#" class="small-box-footer">
                    更多信息
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>990<sup style="font-size: 20px">种</sup></h3>
                    <p>产品数量，包括（关闭）</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document"></i>
                </div>
                <a href="#" class="small-box-footer">
                    更多信息 <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>25652<sup style="font-size: 20px">篇</sup></h3>
                    <p>文章发布总数</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    更多信息 <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>2<sup style="font-size: 20px">次</sup></h3>
                    <p>公告次数</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    更多信息 <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->
@stop
