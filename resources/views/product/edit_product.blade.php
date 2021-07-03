@extends("layout")
@section("title", "Edit product")
@section("main")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit product</h1>
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
                            @foreach($product_edit as $item_edit)
                            <form class="form" action="{{ url("/product/update/".$item_edit->product_id)  }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="label-input">Product Name</label>
                                    <input type="text" name="product_name" value="{{$item_edit->product_name}}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="label-input">Product Image</label>
                                    <input type="file" name="product_image"  class="form-control" />
                                    <img src="{{$item_edit->product_image}}" style="width: 250px"/>
                                </div>
                                <div class="form-group">
                                    <label class="label-input">Quantity</label>
                                    <input type="number" name="product_quantity"  min="1" value="{{$item_edit->product_quantity}}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="label-input">Price</label>
                                    <input type="text" name="product_price" value="{{$item_edit->product_price}}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Category</label>
                                    <select class="form-control"  name="category_id" id="exampleSelectBorder">
                                        @foreach($categories as $item)
                                            @if($item_edit->category_id == $item->id)
                                            <option selected value="{{$item->id}}">{{$item->category_name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Brand</label>
                                    <select class="form-control"  name="brand_id" id="exampleSelectBorder">
                                        @foreach($brands as $item_brand)
                                            @if($item_edit->brand_id == $item_brand->brand_id)
                                                <option selected value="{{$item_brand->brand_id}}">{{$item_brand->brand_name}}</option>
                                            @else
                                                <option value="{{$item_brand->brand_id}}">{{$item_brand->brand_name}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="label-input">Description</label>
                                    <textarea cols="8" name="product_desc" class="form-control">
                                        {{$item_edit->product_desc}}
                                    </textarea>
                                </div>
                                <div class="btn-group-control">
                                    <button onclick="location.href=''" type="button" class="btn btn-secondary btn-lg">Close</button>
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </form>
                            @endforeach

                        </div>

                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection

