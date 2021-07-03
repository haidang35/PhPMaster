
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/AddNewForm.css"/>
</head>
<body>

<div class="add-new-form">
    <h1>Add new product</h1>
    <form class="form" action="?route=savenewproduct" method="post">
        <div class="form-group">
            <label class="label-input">Product name</label>
            <input type="text" name="name" class="form-control" />
        </div>
        <div class="form-group">
            <label class="label-input">Quanity</label>
            <input type="number" name="quantity" min="1" class="form-control" />
        </div>
        <div class="form-group">
            <label class="label-input">Price</label>
            <input type="text" name="price" class="form-control" />
        </div>
        <input type="hidden" name="categoryid" value="<?php  /*echo $categoryId */ ?> " />
        <div class="btn-group-control">
            <button onclick="location.href='?route=listproduct&id=<?php /* echo $categoryId */ ?>'" type="button" class="btn btn-secondary btn-lg">Close</button>
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>

</div>
</body>
</html>


