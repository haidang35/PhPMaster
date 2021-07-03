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
    <h1>Edit category</h1>
    <form action="?route=saveeditcategory" method="post" class="form">
        <div class="form-group">
            <input type="hidden" name="id" class="form-control" value="<?php  /*echo $category["id"] */?>" />
        </div>
        <div class="form-group">
            <label class="label-input">Category name</label>
            <input type="text" name="name" class="form-control" value="<?php /* echo $category["name"] */?>" />
        </div>
        <div class="btn-group-control">
            <button onclick="location.href='?route=listcategory'" type="button" class="btn btn-secondary btn-lg">Close</button>
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>

</div>
</body>
</html>
