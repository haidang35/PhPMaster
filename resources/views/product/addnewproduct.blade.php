@extends("layout")
@section("title", "Add new product")
@section("main")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add new product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
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

                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="add-new-form card">
                        <div class="card-body">
                            <form class="form" action="{{ url("/product/save")  }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="label-input">Product Name</label>
                                    <input type="text" name="product_name" value="{{old("product_name")}}" class="form-control" />
                                    @error("product_name")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="label-input">Product Image</label>
                                    <input type="file" name="product_image" value="{{old("product_image")}}" class="form-control" />
                                    @error("product_image")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="label-input">Quantity</label>
                                    <input type="number" name="product_quantity" value="{{old("product_quantity")}}" min="1" class="form-control" />
                                    @error("product_quantity")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="label-input">Price</label>
                                    <input type="text" name="product_price" value="{{old("product_price")}}" class="form-control" />
                                    @error("product_price")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Category</label>
                                    <select class="form-control" name="category_id" id="exampleSelectBorder">

                                        @foreach($categories as $item)
                                            <option @if(old("category_id") == $item->category_id) selected @endif value="{{$item->category_id}}">{{$item->category_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Brand</label>
                                    <select class="form-control" name="brand_id" id="exampleSelectBorder">
                                        @foreach($brands as $item_brand)
                                            <option @if(old("brand_id") == $item_brand->brand_id) selected @endif value="{{$item_brand->brand_id}}">{{$item_brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="label-input">Description</label>
                                    <input type="text" name="product_desc" value="{{old("product_desc")}}" class="form-control" />
                                </div>
                                <div class="btn-group-control" style="float: right">
                                    <button onclick="location.href=''" type="button" class="btn btn-secondary btn-lg">Close</button>
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection
