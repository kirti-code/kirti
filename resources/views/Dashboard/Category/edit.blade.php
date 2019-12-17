@extends('Template.admin_template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Category') }}
                </div>
                <br>
                <br>

                <div class="card-body">
                    @include('Dashboard.Category.form')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection