@extends("layout")
@section("title", "Form")
@section("main")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form</h1>
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
                            <form class="form" action="{{ url("/brand/save") }}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label class="label-input">Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" />
                                    @error("brand_name")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="label-input">Brand Desc</label>
                                    <textarea cols="6" type="text" name="brand_desc" class="form-control" >
                                    </textarea>
                                </div>
                                <div class="btn-group-control">
                                    <a href="{{url("/brand")}}" type="button" class="btn btn-secondary btn-lg">Close</a>
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



