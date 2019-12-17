@extends('Template.admin_template')
@section('page_title')
{{ "Dashboard Page" }}
@endsection
@section('content')

<div class='row'>
    <div class='col-md-6'>
        <style>
            .col-xs-6 {
                background-color: lightgrey;
                width: 245px;
                border: 10px solid #337ab7;
                padding: 50px;
                margin: 20px;
            }
        </style>

        <div class="content-wrapper">
            <!--First Section-->
            <section class="content-header">
                <h1>
                    <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                </h1>
            </section>
            <!--First section end-->

            <!--second Section-->
            <section class="content">
                <div class="row">
                    <!--col-start-->
                    <div class="col-lg-3 col-xs-6">
                        <!--small box start-->
                        <!--col-start-->
                        <div class="small-box bg-blue ">
                            <div class="inner">
                                <h3></h3>
                                <p> <label>{{$activArr['activeCat']." Active Category"}}</label></p>
                            </div>

                            <div class="icon ">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <!--small box end-->
                    </div><!-- ./col -->



                    <!--col-start-->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3></h3>
                                <p>
                                    <label> {{$activArr['activePro']." Active Product"}}</label> </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"><label></label></i>
                            </div>

                            <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <!--small box end-->
                    </div>
                    <!--col-end-->
                </div>
            </section>
            <!--second Section end-->
        </div>
        <!--wrapper close-->
    </div>
    <!--col-close-->
</div>
<!--row-close-->


@endsection