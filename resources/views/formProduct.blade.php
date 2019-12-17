{!! Form::open(['url' => 'product',$product->id ?? '' ,'id' =>'productForm']) !!}


<div class="form-group">
    {!! Form::label('name', 'Product Name') !!}
    {!! Form::text('name', $product->name ?? old('name') , ['class' => 'form-control' ,'name' => 'name' ]) !!}
    <span class="error_name"></span>
</div>

<div class="form-group">
    {!! Form::label('Product Category') !!}<br />
    {!! Form::select('categories_id[]',
    $categories,
    null,
    ['class' => 'form-control chosen-select',
    'multiple' => 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Product Name') !!}
    {!! Form::text('name', $product->name ?? old('name') , ['class' => 'form-control' ,'name' => 'name' ]) !!}
    <span class="error_name"></span>
</div>
<div class="form-group">
    {!! Form::label('name', 'Product Name') !!}
    {!! Form::text('name', $product->name ?? old('name') , ['class' => 'form-control' ,'name' => 'name' ]) !!}
    <span class="error_name"></span>
</div>
<div class="form-group">
    {!! Form::label('name', 'Product Name') !!}
    {!! Form::text('name', $product->name ?? old('name') , ['class' => 'form-control' ,'name' => 'name' ]) !!}
    <span class="error_name"></span>
</div>




{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}


@section('js')
<script>
    $(document).ready(function($) {
        var fullPath = window.location.href;
        $('#productForm').submit(function(event) {
            event.preventDefault();
            // var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: new FormData($(this)[0]),
                processData: false,
                enctype: 'multipart/form-data',
                contentType: false,
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
                    var err = error.responseJSON;
                    if (error.status == 422) {
                        $.each(err.errors, function(key, val) {
                            $(".error_" + key).text(val).addClass('text-danger').fadeIn().delay(5000).fadeOut('slow');
                        });
                    }
                    if (error.status == 500) {
                        console.log('error database');
                    }
                },

            });

        });
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        });
    });
</script>
@endsection