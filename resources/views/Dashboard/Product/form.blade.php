<form action="{{url('product')}}/{{$product->product_id ?? ''}}" method="post" id="productForm" enctype="multipart/form-data">
    @csrf
    @if(isset($product))
    {{ method_field('PUT') }}
    @endif
    <div class="form-group">
        <label for="exampleInputEmail1">{{ __('Product Name') }}</label>
        <input type="text" class="form-control" id="" name="name" value="{{ $product->name ?? old('name') }} " placeholder="Enter category Name">
        <span class="error_name"></span>

    </div>

    <div class="form-group">
        <label for="exampleIidnputEmail1">{{ __('Product Category') }}</label>
        <select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select form-control" name="categories_id[]">
            <option value=""></option>
            @foreach($categories as $category)
            <option value="{{$category->category_id}}" @if (isset($catNames) && in_array($category->category_id, $catNames)) {{"selected"}}
                @endif>{{$category->name}}</option>
            @endforeach
        </select>
        <span class="error_categories_id"></span>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">{{ __('Product Description') }}</label>

        <input type="text" class="form-control" name="desription" value="{{ $product->desription ?? old('desription') }} " placeholder="Enter category Description">
        <span class="error_desription"></span>

    </div>


    <div class="form-group">
        <label for="exampleInputEmail1">{{ __('Product SKU') }}</label>
        @php $name = Route::currentRouteName(); @endphp
        @if ($name == 'product.edit')
        <input type="text" class="form-control" name="sku" id="disableinp" readonly value="{{ $product->sku ?? old('sku') }} " placeholder="Enter category Description">
        @else
        <input type="text" class="form-control" name="sku" id="disableinp" value="{{ $product->sku ?? old('sku') }} " placeholder="Enter category Description">
        @endif

        <span class="error_sku"></span>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">{{ __('Product Image') }}</label>
        @if (isset($product->image))
        <img src="{{asset('storage/images/'.$product->image)}}">
        <input type="hidden" value="$product->image" class="old_image" />
        @else
        <p>No image found</p>
        @endif
        <input type="file" class="form-control" name="image" value="{{ $product->image ?? old('image') }} " placeholder="Enter category Description">
        <span class="error_image"></span>


    </div>

    <div class="form-group">

        <label for="exampleInputEmail1">{{ __('Product Price') }}</label>
        <input type="text" class="form-control" name="amount" value="{{ $product->amount ?? old('amount') }} " placeholder="Enter category Description">
        <span class="error_amount"></span>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">{{ __('Product Status') }}</label>
        <select class="status_drop form-control" name="status">
            <option value="">Select Option</option>
            @foreach($status_arr as $k=>$status)
            <option value="{{$k}}" @if(isset($product)) {{ $product->status == $k  ? 'selected' : '' }} @endif>{{$status}}</option>
            @endforeach
        </select>
        <span class="error_status"></span>
    </div>
    <input type="submit" class="btn btn-primary btnSubmit" value="Submit" />
</form>