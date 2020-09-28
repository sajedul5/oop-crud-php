    <?php
    include 'model.php';
    $model = new Model();

    $id = $_REQUEST['id'];
    $row = $model->edit($id);

    if(isset($_POST['update'])){
      if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address'])){
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address'])){
           $data['id'] = $id;
           $data['name'] = $_POST['name'];
           $data['email'] = $_POST['email'];
           $data['phone'] = $_POST['phone'];
           $data['address'] = $_POST['address'];

           $update = $model->update($data);

           if($update){
             echo "<script>alert('Info updated success!');</script>";
             echo "<script>window.location.href ='index.php';</script>";
           }
           else {
             echo "<script>alert('Info dont updated!');</script>";
             echo "<script>window.location.href ='index.php';</script>";
           }

        }
        else{
          echo "<script>alert('Empty');</script>";
          header("Location: edit.php?id=$id");
        }
      }
    }
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
          <h2 class="text-center">Single Data Edit</h2>
          <hr>

          <form method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" placeholder="Full Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Phone</label>
              <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Phone">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Address</label>
              <textarea class="form-control" name="address" rows="3" value=""><?php echo $row['address']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Submit</button>
          </form>

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
