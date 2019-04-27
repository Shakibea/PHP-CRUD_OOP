<?php include "inc/header.php"; 
      include "config.php";
      include "Database.php";
?> 
<?php 
    $fname = '';
    $lname = '';
    $email = '';
     $db = new Database();
     if(isset($_POST['submit'])){
         $fname = mysqli_real_escape_string($db->link,$_POST['firstName']);
         $lname = mysqli_real_escape_string($db->link,$_POST['lastName']);
         $email = mysqli_real_escape_string($db->link,$_POST['email']);
        if($fname == '' || $lname == '' || $email == ''){
            $error = "Fill Must not be empty";
        }else{
            $query = "INSERT INTO Information(FirstName, LastName, Email) Values ('$fname', '$lname', '$email')";
            $insert = $db->insert($query);
        }
     }
?>

 <form action="Create.php" class="was-validated" method="post">
  <div class="form-group dns">
    <label for="fname">First Name:</label>
    <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="firstName" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group dns">
    <label for="lname">Last Name:</label>
    <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lastName" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group dns">
    <label for="email">Email:</label>
    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-primary">Reset</button>
</form> 

</body>
</html>