<?php include "inc/header.php"; 
      include "config.php";
      include "Database.php";
?> 
<?php 
    $fname = '';
    $lname = '';
    $email = '';
    $id = $_GET['id'];
    $db = new Database();
    $query = "SELECT * FROM Information WHERE id = $id";
    $read = $db->select($query)->fetch_assoc();

    if(isset($_POST['update'])){
         $fname = mysqli_real_escape_string($db->link,$_POST['firstName']);
         $lname = mysqli_real_escape_string($db->link,$_POST['lastName']);
         $email = mysqli_real_escape_string($db->link,$_POST['email']);
        if($fname != '' || $lname != '' || $email != ''){
          $query = "UPDATE Information
            SET
            FirstName = '$fname',
            LastName = '$lname',
            Email = '$email'
            WHERE id = $id";

            $update = $db->update($query);
          }else{
            $error = "Fill Must not be empty";
            
        }
    }
    if(isset($_POST['delete'])){
        $query = "DELETE FROM Information WHERE id = $id";
        $delete = $db->delete($query);
    }

?>

 <form action="Update.php?id=<?php echo $id; ?>" class="was-validated" method="post">
  <div class="form-group dns">
    <label for="fname">First Name:</label>
    <input type="text" class="form-control" id="fname" value="<?php echo $read['FirstName']; ?>" name="firstName" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group dns">
    <label for="lname">Last Name:</label>
    <input type="text" class="form-control" id="lname" value="<?php echo $read['LastName']; ?>" name="lastName" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group dns">
    <label for="email">Email:</label>
    <input type="text" class="form-control" id="email" value="<?php echo $read['Email']; ?>" name="email" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <button type="submit" name="update" class="btn btn-primary">Update</button>
  <button type="reset" class="btn btn-primary">Reset</button>
  <button type="submit" name="delete" class="btn btn-primary">Delete</button>

</form> 


</body>
</html>