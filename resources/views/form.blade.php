{!! Form::open(['url' => 'category',$category->id ?? '' ,'id' =>'category_form']) !!}


<div class="form-group">
    {!! Form::label('name', 'Category Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control' ,'name' => 'name' ]) !!}
    <span class="error_name"></span>
</div>

<div class="form-group">
    {!! Form::label('Description', 'Category Description') !!}
    {!! Form::text('Description', null, ['class' => 'form-control','name' => 'desription']) !!}
    <span class="error_desription"></span>
</div>

<div class="form-group">
    {!! Form::label('name', 'Category Status') !!}
    {{ Form::select('status', $status_arr) }}
    <span class="error_status"></span>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

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