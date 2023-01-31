<?php
$this->load->view('admin/header');
?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-flex w-100 align-items-center">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <h1 class="h3 mb-0 text-gray-800">Salary Report</h1>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
      <a href="<?php echo base_url().'admin/ahom/index'?>" class="btn btn-md btn-light btn-sm bg-gradient-light border rounded-0 mb-2 btn-icon-split">
        <span class="icon text-white-600">
          <i class="fas fa-angle-left"></i>
        </span>
        <span class="text">Add Back</span>
      </a>
    </div>
  </div>
  <hr>
  <div class="card rounded-0 shadow mb-3">
    <div class="card-body">
      <fieldset class="border rounded-0 px-2 pb-2">
        <legend class="ml-3 px-3 w-auto">Filter Report</legend>
        <form action="" method="GET">
          <div class="row">
            <!-- <div class="col-lg-3 col-md-6 col-sm-12">
              <input type="month" name="start" class="form-control form-control-sm rounded-0" value="<?= !empty($this->input->get('start')) ? $this->input->get('start') : '' ?>">
                          </div> -->
            <!-- <div class="col-lg-3 col-md-6 col-sm-12">
              <input type="date" name="end" class="form-control form-control-sm rounded-0" value="<?= !empty($this->input->get('end')) ? $this->input->get('end') : '' ?>">
                          </div> -->
            <div class="col-lg-3 col-md-6 col-sm-12">
              <select class="form-control form-control-sm rounded-0" name="id">
              <option value="">Select Staff Id </option>
               
               
                <?php foreach ($euser as $row) : ?>
                  <option <?= !empty($this->input->get('id')) && $this->input->get('id') == $row['username1'] ? 'selected' : '' ?> value="<?= $row['username1']; ?>"><?= $row['username1']; ?></option>
                <?php endforeach; ?>
                                 
                              </select>
              
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
    <h3 class="text-center my-5">Please Choose Staff ID To get Salary Data</h3>
  <?php else : ?>
    <?php if ($sal != null) : ?>
      <div class="card shadow mb-4 rounded-0">
        <div class="card-header py-3">
          <div class="d-flex w-100 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <h6 class="m-0 font-weight-bold text-dark">Data Salary</h6>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 text-right">
              <a href="<?= base_url('admin/ahom/prints/') . $id ?>" target="blank" class="btn btn-sm btn-light bg-gradient-light border shadow-sm rounded-0"><i class="fas fa-download fa-sm text-dark"></i> Print Report</a>
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
$this->load->view('admin/footer');
?>