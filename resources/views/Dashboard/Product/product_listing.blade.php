@extends('Template.admin_template')
@section('content')
<div class='col-md-9'>
    <div class="row">
        <div class="col-sm-3">
            <form id="filterProduct" method="get">
                <br>
                <label>Filter: Search By Status</label>
                <select class="Liveserach" name="status" style="width:100px;height:30px;">
                    <option value="" selected>All</option>
                    @foreach($statusArr as $k=>$status)
                    <option value="{{$k}}">{{$status}}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="col-sm-3">
            <br>
            <div class="pull-right" style="
    margin-top: 16px;">
                <a href="{{url('product/create')}}" class="btn btn btn-success">{{ __('Add New Product') }}
                </a>
            </div>
            <br>
        </div>
    </div>
    <br>


    <div id="listing">

        @include('Dashboard.Product.ProTable')
    </div>

</div>
</div>

@endsection

@section('vars')
<script>
    const formId = "filterProduct";
    const indexUrl = "{{ route('product.index') }}";
</script>
@endsection


@section('js')
<script>
    $(document).ready(function(e) {
        //live search onchange of status dropdown
        $(document).on('change', '.Liveserach', function(e) {
            e.preventDefault();
            fetch_data2();
        });

        $('#filterProduct').on('submit', function(e) {
            e.preventDefault();
        })
    });
</script>
@endsection