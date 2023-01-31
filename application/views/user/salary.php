<?php
$this->load->view('user/header');
?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-flex w-100 align-items-center">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <h1 class="h3 mb-0 text-gray-800">Salary Report</h1>
    </div>
    
  </div>
  <hr>
  <div class="card rounded-0 shadow mb-3">
    <div class="card-body">
      <fieldset class="border rounded-0 px-2 pb-2">
        <legend class="ml-3 px-3 w-auto"> Report</legend>
        <form action="" method="GET">
          <div class="row">
           
            <div class="col-lg-3 col-md-6 col-sm-12">
             <input type="text"readonly class="form-control " name="unam" value="<?php echo $username['username1']?>">
   
            </div>
            <div class="col-2">
              <button type="submit" class="btn btn-primary btn-sm rounded-0 bg-gradient-primary "><i class="fa fa-file"></i> Show Report</button>
            </div>
          </div>
        </form>
      </fieldset>
    </div>
  </div>
  <!-- End of row show -->
  <?php if ($sal == false) : ?>
    <h3 class="text-center my-5">Please Click Show Report To Get Salary Data</h3>
  <?php else : ?>
    <?php if ($sal != null) : ?>
      <div class="card shadow mb-4 rounded-0">
        <div class="card-header py-3">
          <div class="d-flex w-100 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <h6 class="m-0 font-weight-bold text-dark">Data Salary</h6>
            </div>
            
           
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-gradient-primary text-white">
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Staff_id</th>
                  <th>Salary</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($sal as $sall) : ?>
                  <tr>
                    <th class="p-1 align-middle text-center"><?= $i++ ?></th>
                    <td class="p-1 align-middle"><?= date('l, d F Y', $sall['time']) ?></td>
                    <td class="p-1 align-middle"><?= $sall['name'] ?></td>
                   
                    
                    <td class="p-1 align-middle"><?= $sall['username']; ?></td>
                    <td class="p-1 align-middle"><?= $sall['salary']; ?></td>
                    
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>
      
  </div>
<!-- /.container-fluid -->

</div>
<?php
$this->load->view('user/footer');
?>