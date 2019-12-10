<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/config.php')
?>
<?php
  $r_query = "SELECT * FROM register";
  $r_result =  mysqli_query($db,$r_query);

?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="adminController.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<!-- edit register -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="adminController.php" method="POST">

        <div class="modal-body">
            

            <div class="form-group">
            <input type="hidden" id="update_id">
                <label> Username </label>
                <input type="text" name="username" id="user_name" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" id="cpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">
      <?php
      if(isset($_SESSION['success']) && $_SESSION['success']!=''){
         
          echo '<h2>'.$_SESSION['success'].'</h2>';
          unset($_SESSION['success']);
      }
       ?>

<?php
      if(isset($_SESSION['status']) && $_SESSION['status']!=''){
         
          echo '<h2>'.$_SESSION['status'].'</h2>';
          unset($_SESSION['status']);
      }
       ?>

    <div class="table-responsive">
        

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <?php foreach($r_result as $res): ?>
        <tbody>
     
          <tr>
            <td><?php echo $res['id']; ?> </td>
            <td><?php echo $res['username'];?></td>
            <td><?php echo $res['email'];?></td>
            <td><?php echo $res['password']; ?> </td>
            <td>
                <button  type="submit" id="edit_btn" class="btn btn-success"> EDIT</button>
            </td>
            <td>
            </td>
          </tr>
        
        </tbody>
        <?php endforeach; ?>
      </table>
        

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

<script>
    $(document).ready(function(){
        $('#edit_btn').on('click',function(){
            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

                // console.log(data);
                // $('#update_id').val(data[0]);
                // $('#user_name').val(data[1]);
                // $('#email').val(data[2]);
                // $('#password').val(data[3]);
                // $('#cpassword').val(data[4]);

        
        });


    });

</script>