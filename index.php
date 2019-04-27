<?php include "inc/header.php"; 
      include "config.php";
      include "Database.php";
?> 
<?php 
     $db = new Database();
     $query = "SELECT * FROM Information";
     $read = $db->select($query);

  if(isset($_GET['msg'])){
    echo "<span class='green'>".$_GET['msg']."</span>";
  }
  if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $query = "DELETE FROM Information WHERE id = $id";
    $delete = $db->delete($query);
}
?>
  <table class="table table-hover">
    <thead>
      <tr>
      <th>Serial</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
  <?php if($read){ 
     $i = 1;
     while($row = $read->fetch_assoc()){?>
      <tr>
      <td><?php echo $i++; ?></td>
        <td><?php echo $row['FirstName']; ?></td>
        <td><?php echo $row['LastName']; ?></td>
        <td><?php echo $row['Email']; ?></td>
        <td><a class="editData" href="Update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a> || <a class="delete" href="index.php?delete&id=<?php echo urlencode($row['id']); ?>">Delete</a></td>
      </tr>
  <?php } ?>
  <?php }else{ ?>
    <p>Connection Error</p>
  <?php } ?>
    </tbody>
  </table>
  <a href="Create.php">Create Form</a>
</div>

<script type="text/javascript" src="inc/script.js"></script>

</body>
</html>