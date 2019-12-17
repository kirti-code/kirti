<table class="table table-bordered TableClass">
    <thead>
        <tr>
            <th>Sr. No.</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Category Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="CategoryBody">
        @forelse ($catData as $k=>$cat_val)
        <tr>
            <td>{{$catData->firstItem()+$k }}
            <td>{{$cat_val->name}}</td>
            <td>{{$cat_val->desription}}</td>
            <td class="status_td">@if($cat_val->status==1)
                {{"Active"}}
                @else{{'Inactive'}}
                @endif
            </td>
            <td>
                <button class="btn btn btn-danger button" data-url="{{ route('category.destroy', $cat_val->category_id) }}" data-value="category">Delete</button>

                <a href="{{route('category.edit',$cat_val->category_id)}}" class="btn btn btn-info">Edit
                </a>
                <br></td>
        </tr>
        @empty
        <tr>
            <td colspan="100%">No Records Exists</td>
        </tr>
        @endforelse

        <tr>
            <td colspan="100" align="center">
                {!! $catData->links() !!}
            </td>
        </tr>
    </tbody>
</table>