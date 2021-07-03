@extends("layout")
@section("title", "Form")
@section("main")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>

                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-5">
                    <div class="add-new-form card">
                        <div class="card-body">
                            <form class="form" action="{{ url("/category/update", ["category_id" => $category->id]) }}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label class="label-input">Category</label>
                                    <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" />
                                </div>
                                <div class="btn-group-control">
                                    <a href="{{url("/category")}}" type="button" class="btn btn-secondary btn-lg">Close</a>
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



