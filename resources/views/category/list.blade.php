@extends("layout");
@section("title", "Category")
@section("main")

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div>
            <div class="col-sm-12" >
                <div class="btn-add-new" style="margin-top: 15px; float: right">
                    <button onclick="location.href='?route=addnewcategory'" class="btn btn-success btn-lg">Add new category</button>
                    <button onclick="location.href='?route=cart'" class="btn btn-warning btn-lg">My Cart</button>
                </div>
            </div>
        <?php
        $message = \Illuminate\Support\Facades\Session::get("message");
        if($message) {
            echo "<div class='text-success'>$message</div>";
            \Illuminate\Support\Facades\Session::put("message", null);
        }
        ?>

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
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product Count</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="thead-button"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $item)
                            <tr>
                                <td>{{ $item->category_id }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ $item->products_count }}</td>
                                <td>{{formatDate($item->created_at)}}</td>
                                <td>{{formatDate($item->updated_at ) }}</td>
                                <td style="width: 10%">
                                    <a href="{{url("/category/edit/".$item->id)}}"  class="btn btn-primary" >Edit</a>
                                    <a href="{{url("/category/delete/".$item->id)}}" class="btn btn-danger" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>

                </div>
                <div style="float: right" >{!! $categories->links("vendor.pagination.bootstrap-4") !!}</div>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

@endsection

