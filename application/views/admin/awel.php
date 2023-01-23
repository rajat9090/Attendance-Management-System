<?php
$this->load->view('admin/header');
?>
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2 rounded-0 border-4">
      <div class="card-body py-1">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-lg font-weight-bold mb-1">Branch</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800 text-right"><?php echo $branch;?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-building fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-4">
    <div class="card border-left-info shadow h-100 py-2 rounded-0 border-4">
      <div class="card-body py-1">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-lg font-weight-bold mb-1">Location</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800 text-right"><?php echo $location;?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-4">
    <div class="card border-left-success shadow h-100 py-2 rounded-0 border-4">
      <div class="card-body py-1">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-lg font-weight-bold mb-1">Staffs</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800 text-right"><?php echo $staff;?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-id-badge fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-4">
    <div class="card border-left-danger shadow h-100 py-2 rounded-0 border-4">
      <div class="card-body py-1">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-lg font-weight-bold mb-1">Users</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800 text-right"><?php echo $users;?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Content Row -->

<div class="row">

  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <!-- Pie Chart -->
    <div class="col p-0">
      <div class="card shadow mb-4 rounded-0">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-rowz align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-muted">Branch's Staff</h6>
          <a class="text-reset font-weight-bolder text-muted" title="Go to Department List" href="<?php echo base_url('admin/ahom')?>"><i class="fa fa-arrow-right"></i></a>
        </div>
        <!-- Card Body -->
        <div class="card-body overflow-auto" style="max-height: 400px;">
          <table class="table table-bordered table-striped">
            <thead class="bg-gradient-primary text-white">
              <tr>
                <th class="text-center p-1" scope="col">#</th>
                <th class="p-1" scope="col">Branch Code</th>
                <th class="p-1" scope="col">Staff</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i=1;
              foreach($sbc as $row)
              {
              ?>
                                       <tr>
                  <th class="text-center p-1" scope="row"><?php echo $i++;?></th>
                  <td class="p-1"><?php echo $row['b_id']; ?></td>
                  <td class="p-1 text-right"><?php echo $row['qty']; ?></td>
                </tr>
                <?php }?>
                                      
                                   </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <div class="col p-0">
      <div class="card shadow mb-4 rounded-0">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-muted">Staffs per Location</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body" style="max-height: 370px;">
          <table class="table table-bordered table-striped">
            <thead class="bg-gradient-primary text-white">
              <tr>
                <th class="text-center p-1" scope="col">#</th>
                <th class="p-1" scope="col">Location</th>
                <th class="p-1" scope="col">Staffs</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              foreach($cls as $row){?>
                                                                <tr>
                  <th class="text-center p-1" scope="row"><?php echo $i++;?></th>
                  <td class="p-1 align-middle"><?php echo $row['lname']; ?></td>
                  <td class="p-1 text-right"><?php echo $row['gty']; ?></td>
                </tr>
                 <?php }?>
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
$this->load->view('admin/footer');
?>