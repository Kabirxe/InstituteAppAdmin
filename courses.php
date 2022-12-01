<?php
include('header.php');
require('connect.php');

$query = 'select * from courses';
$course_select = mysqli_query($conn , $query);
?>

<main id="main" class="main">
    <h2 class="text-center">Course Details</h2>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Course
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fill Course Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="functions.php" method="post">
            <div class="form-group">
              <label for="">Course Title</label>
              <input type="text" class="form-control" name="c_name" id="" aria-describedby="helpid">
            </div>
            <div class="form-group mt-3">
              <label for="">Course Duration</label>
              <input type="text" class="form-control" name="c_duration" id="" aria-describedby="helpid">
            </div>
            <div class="form-group mt-3">
              <label for="">Course Charges</label>
              <input type="text" class="form-control" name="c_charges" id="" aria-describedby="helpid">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="btnAddCourse" class="btn btn-primary" value="Save">
      </div>
      </form>

    </div>
  </div>
</div>
<table class="mt-5 table table-responsive table-stripped m-auto" style="width:90%">
    <thead>
      <tr>
        <th>S. No</th>
        <th>Course Title </th>
        <th>Duration</th>
        <th>Charges</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
          while($row = mysqli_fetch_assoc($course_select)){
            ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['Course']; ?></td>
              <td><?php echo $row['Duration']; ?></td>
              <td>Rs. <?php echo $row['Charges']; ?></td>
              <td><button type="button" id="editBtn" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
               <a href="functions.php?delcourse=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
          }
      ?>
    </tbody>
   </table>
   <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Course Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="functions.php" method="post">
            <div class="form-group">
              <label for="">Course Title</label>
              <input type="text" class="form-control" name="uc_name" id="uc_name" aria-describedby="helpid">
            </div>
            <div class="form-group mt-3">
              <label for="">Course Duration</label>
              <input type="text" class="form-control" name="uc_duration" id="uc_duration" aria-describedby="helpid">
            </div>
            <div class="form-group mt-3">
              <label for="">Course Charges</label>
              <input type="text" class="form-control" name="uc_charges" id="uc_charges" aria-describedby="helpid">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="btnUpdCourse" class="btn btn-primary" value="Update">
      </div>
      </form>

    </div>
  </div>
</div>

   </main>

   <script>
    $(document).ready(function(){
      $('.editBtn').click(function(){
        var cid = $(this).attr('id');
        // console.log(cid);
        $.ajax({
          type: 'GET',
          url: 'http://localhost:2124/InstituteApp/admin/functions.php?editcourse='+cid,
          dataType: 'json',
          success: function(data){
            // console.log(data);
            $('#uc_name').val(data.courseName);
            $('#uc_duration').val(data.courseDuration);
            $('#uc_charges').val(data.courseCharges);
          }
        })
      })
    })
   </script>

 
<?php
include('footer.php');
?>
