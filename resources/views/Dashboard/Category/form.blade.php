<form action="{{url('category')}}/{{$category->category_id ?? ''}}" method="post" id="category_form">
    @csrf
    @if(isset($category))
    {{ method_field('PUT') }}
    @endif
    <div class="form-group">
        <label for="exampleInputEmail1">{{ __('Category Name') }}</label>
        <input type="text" class="form-control" id="" name="name" value="{{ $category->name ?? old('name') }} " placeholder="Enter category Name">
        <span class="error_name"></span>
    </div>


    <div class="form-group">
        <label for="exampleInputEmail1">{{ __('Category Description') }}</label>
        <input type="text" class="form-control" name="desription" value="{{ $category->desription ?? old('desription') }} " placeholder="Enter category Description">
        <span class="error_desription"></span>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">{{ __('Category Status') }}</label>
        <select class="status_drop form-control" name="status">
            <option value="">Select Option</option>
            @foreach($status_arr as $k=>$status)
            <option value="{{$k}}" @if(isset($category)) {{ $category->status == $k  ? 'selected' : '' }} @endif>{{$status}}</option>
            @endforeach


        </select>
        <span class="error_status"></span>

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@section('js')
<script>
    jQuery(document).ready(function($) {
        $('#category_form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    new Notification('Notification title', {
                        icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
                        body: data.message,
                        message: data.message
                    });
                    window.location.href = data.redirectTo;
                },
                error: function(error) {
                    console.log(error.responseJSON.errors);
                    var err = error.responseJSON;
                    if (error.status == 422) {

                        $.each(err.errors, function(key, val) {
                            console.log(key + " : " + val);
                            $(".error_" + key).text(val).addClass('text-danger').fadeIn().delay(5000).fadeOut('slow');;
                        });
                    }

                }
            });

        });

    });
</script>
@endsection