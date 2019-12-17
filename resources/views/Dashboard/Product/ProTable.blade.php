 <table class="table table-bordered">
     <thead>
         <tr>
             <th>Sr. No.</th>
             <th>Product Name</th>
             <th>Product Description</th>
             <th>Product SKU</th>
             <th>Product Prize</th>

             <th>Product Image</th>
             <th>Category</th>
             <th>Status</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody class="ProductTbody">


         @forelse ($productData as $k=>$prod_val)
         <tr>
             <td>{{$productData->firstItem()+$k }}

             </td>
             <td>{{$prod_val->name}}</td>
             <td>{{$prod_val->desription}}</td>
             <td>{{$prod_val->sku}}</td>
             <td>{{$prod_val->amount}}</td>

             <td><img height="50px" width="50px" src="{{asset('storage/images/'.$prod_val->image)}}"></img>
             </td>
             <input type="hidden" value="{{$prod_val->image}}" name="hidden_image" />
             <td>@foreach($prod_val->categories as $cat)

                 {{$cat->name.','}}

                 @endforeach
             </td>
             <td class="status_td">@if($prod_val->status==1)
                 {{"Active"}}
                 @else{{'Inactive'}}
                 @endif
             </td>

             <td style=" width: 140px;"><button class="btn btn btn-danger button" data-url="{{ route('product.destroy', $prod_val->product_id) }}" data-value="product">Delete</button>

                 <a href="{{route('product.edit',$prod_val->product_id)}}" class="btn btn btn-info" id="EditButtton">Edit
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
                 {!! $productData->links() !!}
             </td>
         </tr>

     </tbody>
 </table>