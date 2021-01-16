@extends('layout')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
@endsection

@section('content')



<div class="row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>SR#</th>
                        <th>Title</th>
                        <th>Pay</th>
                        <th>Hours</th>
                        <th>Posted By</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Status</th>
                     
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($jobs as $key => $job)

                        <tr role="row">
                            <td>{{$key+1}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->pay}}</td>
                            <td>{{$job->hours}}</td>
                            <td>{{$job->user->name}}</td>
                            <td>
                                @if ($job->category_id ==null)
                                    null
                                @else
                                    {{$job->category->name}}
                                @endif
                            </td>
                            <td>
                                @if ($job->description == null)
                                    null
                                @else 
                                    
                                {{$job->description}}
                                @endif
                            </td>
                            <td>
                                @if ($job->status == true)
                                    Open
                                @else 
                                    Closed
                                @endif
                            </td>
                            
                            {{-- <td class="">
                                <button href="" class="btn btn-primary edit-btn" 
                                    name="{{$product->name}}"
                            id="{{$product->id}}" category_id="{{$product->category_id}}" stock="{{$product->stock}}" price="{{$product->price}}" data-toggle="modal"
                                            data-target="#exampleModal">Edit</button>
                            </td> --}}

                            {{-- <td>
                                <form action="{{route('admin.product.destroy',$product->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"><i class="icon-trash">Delete</i></button>

                            </form>
                            </td> --}}

                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="category">Name</label>
                    <input type="text" class="form-control" name="name"  id="name" placeholder="Category name" required>
                </div>
                  <div class="modal-body">
                    <label for="category">Select Category</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option selected disabled>Choose category</option>
                        {{-- @foreach(App\Models\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach --}}
                    </select>
                </div>  
                
                <div class="modal-body">
                    <label for="category">Price</label>
                    <input type="text" class="form-control" name="price"  id="price" placeholder="price" required>
                </div>
                
                <div class="modal-body">
                    <label for="category">Stock</label>
                    <input type="text" class="form-control" name="stock"  id="stock" placeholder="stock" required>
                </div>
                
              
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>

<script>

    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            let name =  $(this).attr('name');
            let category_id =  $(this).attr('category_id');
            let price =  $(this).attr('price');
            let stock =  $(this).attr('stock');
            $('#name').val(name);
            $('#id').val(id);
            $('#category_id').val(category_id);
            $('#price').val(price);
            $('#stock').val(stock);
        });
    });
</script>

@endsection
