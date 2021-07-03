@extends("layout")
@section("title", "Product")
@section("main")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
                <div class="col-sm-12" >
                    <div class="btn-add-new" style="margin-top: 15px; float: right">
                        <a href="{{url("/product/new")}}" class="btn btn-success btn-lg">Add new product</a>
                    </div>
                </div>
                <div>
                    <?php
                    $message = \Illuminate\Support\Facades\Session::get("message");
                    if($message) {
                        echo "<div class='text-success'>$message</div>";
                        \Illuminate\Support\Facades\Session::put("message", null);
                    }
                    ?>
                </div>
                <div class="col-sm-8">
                    <form action="{{url("/product")}}" method="get" >
                        <input type="text" name="search_value" placeholder="Search ..." class="form-control-sm">
                        <select name="category_id" class="form-control-sm">
                            <option value="0">Select category</option>
                            @foreach($categories as $item)
                                <option @if(app("request")->input("category_id") == $item->category_id) selected @endif value="{{$item->category_id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
                        <select name="brand_id" class="form-control-sm">
                            <option value="0">Select brand</option>
                        @foreach($brands as $item)
                                <option @if(app("request")->input("brand_id") == $item->brand_id) selected @endif value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary" >Submit</button>

                    </form>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Description</th>
                                    <th>Created at</th>
                                    <th class="thead-button"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$item->product_name}}</td>
                                        <td><img src="{{$item->getImage()}}" style="width: 150px"/></td>
                                        <td>{{$item->Brand->brand_name}}</td>
                                        <td>{{$item->Category->category_name}}</td>
                                        <td>{{$item->product_price}}</td>
                                        <td>{{$item->product_quantity}}</td>
                                        <td>{{$item->product_desc }}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td style="width: 10%">
                                            <button onclick="location.href='{{url("/product/edit/".$item->product_id)}}'" class="btn btn-primary" style="margin-bottom: 10px">Edit product</button>
                                            <button  class="btn btn-danger" data-toggle="modal" data-target="#modal-default">Delete product</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete confirm</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure delete product {{ $item->product_name }} </p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button onclick="location.href='{{url("/product/delete/".$item->product_id)}}'" type="button" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>

                        <div>
                        </div>
                    </div>
                    <div style="float: right" >{!! $products->appends(request()->input())->links("vendor.pagination.bootstrap-4") !!}</div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
