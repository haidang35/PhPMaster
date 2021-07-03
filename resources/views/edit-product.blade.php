
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/EditForm.css"/>

</head>
<body>

<div class="edit-form">
    <h1>Edit product</h1>
    <form action="?route=saveeditproduct" method="post" class="form">
        <input type="hidden" name="id" class="form-control" value="<?php /* echo $product["id"]; */ ?>" />
        <div class="form-group">
            <label class="label-input">Product name</label>
            <input type="text" name="name" class="form-control" value="<?php /* echo $product["name"]; */ ?>"/>
        </div>
        <div class="form-group">
            <label class="label-input">Quantity</label>
            <input type="text" name="quantity" class="form-control" value="<?php /* echo $product["quantity"]; */?>"/>
        </div>
        <div class="form-group">
            <label class="label-input">Price</label>
            <input type="text" name="price" class="form-control" value="<?php /* echo $product["price"]; */?>"/>
        </div>
        <input type="hidden" name="categoryId" value="<?php /* echo $product["categoryId"] */ ?>"/>
        <div class="btn-group-control">
            <button onclick="location.href='?route=listproduct&id=<?php /* echo $product["categoryId"] */?>'" type="button" class="btn btn-secondary btn-lg">Close</button>
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>

</div>
</body>
</html>


