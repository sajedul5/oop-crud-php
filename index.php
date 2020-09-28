<?php
include 'model.php';
$model = new Model();
$insert = $model->insert();
$row = $model->fetch();


 ?>









<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h2 class="text-center">PHP OOP CRUD/Info System</h2>
          <hr>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addinfo">
            Add Info
          </button>
          <hr>
          <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">#Sr</th>
                  <th scope="col">Name</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                //var_dump($row);
                $i = 1;
                if(!empty($row)){
                  foreach($row as $rows){
                 ?>
                <tr>
                  <th scope="row"><?php echo $i++; ?></th>
                  <td><?php echo $rows['name']; ?></td>
                  <td>
                    <a href="read.php?id=<?php echo $rows['id']; ?>" data-toggle="modal" data-target="#read<?php echo $rows['id']; ?>" class="badge badge-info">Read</a>
                    <a href="delete.php?id=<?php echo $rows['id']; ?>" class="badge badge-danger">Delete</a>
                    <a href="edit.php?id=<?php echo $rows['id']; ?>" class="badge badge-success">Edit</a>
                  </td>
                </tr>

                <!--modal-->
                <div class="modal fade" id="read<?php echo $rows['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">Details Info</h2>
                      </div>
                      <div class="modal-body">
                        <div class="border p-3">
                          <h5>Name: <?php echo $rows['name']; ?></h5>
                          <h5>Email: <?php echo $rows['email']; ?></h5>
                          <h5>Phone: <?php echo $rows['phone']; ?></h5>
                          <h5>Address: <?php echo $rows['address']; ?></h5>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                    }
                  }
                  else {
                    echo "<span class='text-danger'>Data No Aviable</span>";
                  }
                 ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>




<!-- Modal -->
<div class="modal fade" id="addinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Add Info System</h2>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Full Name">
            <small id="emailHelp" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
            <small id="emailHelp" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="Phone">
            <small id="emailHelp" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Address</label>
            <textarea class="form-control" name="address" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
