<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row"  style="margin: 10px">
    <?php if(!empty($message["success"])){?>
    
        <div class="alert alert-success">
            <strong>Success!</strong> <?=$message["success"];?>
        </div>
    <?php }elseif(!empty($message["error"])){ ?>
        <div class="alert alert-error">
            <strong>Success!</strong> <?=$message["error"];?>
        </div>
    <?php }?>
    </div>
    <div class="row"  style="margin: 10px">
        <div class="col-sm-8">
                <h4>Manage Student</h4>
        </div>
        <div class="col-sm-4">
            <a href="<?= base_url()."student/create" ?>" class="btn btn-success">Add</a>
        </div>
    </div>
    <div class="row">
    
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Action</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($records as $key => $value) {?>
                <tr>
                    <td> 
                        <a href="<?=base_url("student/edit/".$value["id"]) ?>" class="btn btn-primary">edit</a>
                        <a href="<?=base_url("student/delete/".$value["id"]) ?>" class="btn btn-danger">delete</a>
                    </td>
                    <td><?=$value["name"]?></td>
                    <td><?=$value["email"]?></td>
                    <td><?=$value["contact"]?></td>
                </tr>
            <?php
            }?>
            </tbody>
        </table>
    </div>
    </div>

</body>
</html>
