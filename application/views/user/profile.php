<?php
$this->load->view('user/header');
?>
<div class="container-fluid">
  <div class="card rounded-0 shadow">
    <div class="card-header">
      <h3 class="card-title font-weight-bolder text-dark h3 mb-0"> <?php echo $pro['name'];?></h3>
    </div>
    <div class="card-body">
      <div class="container-fluid">
        <div class="row">

          <!-- left -->
          <div class="col-sm-10 col-md-5 col-lg-4 col-xl-3 offset-sm-1 offset-md-0 offset-lg-0 offset-xl-0 text-center">
            <img src="<?= base_url('assets/empimg/') . $pro['image']; ?>?v=<?php echo time(); ?>" class="rounded-circle img-thumbnail">
          </div>

          <!-- right -->
          <div class="col-sm-10 col-md-6 offset-sm-1">
            <h1 class="h3 text-white bg-gradient-dark p-1 rounded-0 mt-1 mb-3">Staff Information</h1>
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Staff ID</th>
                  <td>: <?php echo $pro['id'];?></td>
                </tr>
                <tr>
                  <th scope="row">Gender</th>
                  <td>: <?php  if($pro['gender']=='M')
                  echo 'Male';
                  else{
                    echo 'Female';
                  }
                  ?></td>
                </tr>
                <tr>
                  <th scope="row">Department</th>
                  <td>: <?php echo $pro['bn'];?></td>
                </tr>
                <tr>
                  <th scope="row">Salary</th>
                  <td>: <?php echo $pro['salary'];?></td>
                </tr>
                <tr>
                  <th scope="row">Birthday</th>
                  <td>: <?php echo $pro['birth_date'];?></td>
                </tr>
                <tr>
                  <th scope="row">Joined On</th>
                  <td>: <?php echo $pro['date_joining'];?></td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<?php
$this->load->view('user/footer');
?>