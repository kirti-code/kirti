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
    ['class' => 'form-control',
    'multiple' => 'multiple']) !!}
</div>



{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}