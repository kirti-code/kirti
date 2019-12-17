@extends('Template.admin_template')
@section('content')
<div class='col-md-9'>
    <br>
    <div class="row">
        <form id="filter" method="get">

            <div class="col-sm-3">
                <label> Search By Category Name</label>
                <div class="input-group">
                    <input type="search" name="serach" id="live_search" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <label>Search By Status</label><br>
                <select class="Liveserach" name="status" style="width:100px;height:30px;">
                    <option value="" selected>All</option>
                    @foreach($statusArr as $k=>$status)
                    <option value="{{$k}}">{{$status}}</option>
                    @endforeach
                </select>

            </div>
            <br>
            <div class="col-sm-3" style="margin-left: -79px;">
                <a href="{{ url('downloadDataNew') }}"><button class="btn btn-primary">Download Excel</button></a>
            </div>

        </form>

    </div>


    <div id="listing">
        <div class="pull-right" style="
    margin-top: 16px;">
            <a href="{{url('category/create')}}" class="btn btn btn-success">{{ __('Add New Category') }}
            </a>
        </div>
        <br>
        <!-- @include('Dashboard.Category.categoryTable') -->
        @include('Dashboard.Category.categoryTable')
    </div>
</div>
</div>

@endsection

@section('vars')
<script>
    const formId = "filter";
    const indexUrl = "{{ route('category.index') }}";
</script>
@endsection

@section('js')
<script>
    $(document).ready(function(e) {
        $(document).on('keyup', '#live_search', function(e) {
            e.preventDefault();
            fetch_data2();
        });

        //live search onchange of status dropdown
        $(document).on('change', '.Liveserach', function(e) {
            e.preventDefault();
            fetch_data2();
        });

        $('#filter').on('submit', function(e) {
            e.preventDefault();
        })
    });
</script>
@endsection