<?php

  Class Model{
    private $server= "localhost";
    private $username= "root";
    private $password;
    private $db= "oop_crud_php";
    private $conn;

    public function __construct(){
      try {
        $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
      } catch (Exception $e) {
        echo 'connection failed' .$e->getMessage();
      }

    }
  //data insert
    public function insert(){
      if(isset($_POST['submit'])){
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address'])){
          if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address'])){

             $name = $_POST['name'];
             $email = $_POST['email'];
             $phone = $_POST['phone'];
             $address = $_POST['address'];

            $query ="INSERT INTO info(name,email,phone,address) VALUES ('$name', '$email', '$phone', '$address')";
            if($sql = $this->conn->query($query)){
                echo "<script>alert('Info added successfully');</script>";
                echo "<script>window.location.href ='index.php';</script>";
            }
            else{
              echo "<script>alert('Failed');</script>";
              echo "<script>window.location.href ='index.php';</script>";
            }
          }
          else{
            echo "<script>alert('Empty');</script>";
            echo "<script>window.location.href ='index.php';</script>";
          }
        }
      }
    }


  //data fetch

  public function fetch(){
    $data = null;

    $query = "SELECT * FROM info";
    if($sql = $this->conn->query($query)){
      while ($row = mysqli_fetch_assoc($sql)){
        $data[]= $row;
      }
    }
    return $data;
  }


  //delete query

  public function delete($id){

    $query = "DELETE FROM info WHERE id = '$id'";
    if($sql= $this->conn->query($query)){
      return true;
    }
    else{
      return false;
    }
  }


// edit Data

  public function edit($id){
    $data = null;

    $query = "SELECT * FROM info WHERE id = '$id'";
    if($sql = $this->conn->query($query)){
      while($row = $sql->fetch_assoc()){
        $data = $row;

      }
    }
    return $data;
  }

// update data
public function update($data){
  $query ="UPDATE info SET name='$data[name]', email='$data[email]', phone='$data[phone]', address='$data[address]' WHERE id='$data[id]'";

  if($sql = $this->conn->query($query)){
    return true;
  }
  else{
    return false;
  }
}














  }

 ?>
