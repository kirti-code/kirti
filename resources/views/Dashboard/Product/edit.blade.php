@extends('Template.admin_template')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b> {{ __('Edit Product') }}</b>
                </div>
                <br>
                <div class="card-body">
                    @include('Dashboard.Product.form')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection