<?php
$this->load->view('admin/header');
?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Branch</h1>

<a href="<?php echo base_url('admin/ahom/brn') ?>" class="btn btn-sm btn-default bg-gradient-light border rouned-0 btn-icon-split mb-4">
  <span class="icon text-white">
    <i class="fas fa-chevron-left"></i>
  </span>
  <span class="text">Back</span>
</a>
<div class="row justify-content-center">
  <form action="<?php echo base_url('admin/ahom/e_brn/'.$brn['id']) ?>" method="POST" class="col-lg-5 col-md-6 col-sm-12  p-0">
    <div class="card rounded-0">
      <h5 class="card-header">Branch Data</h5>
      <div class="card-body">
      <?= $this->session->flashdata('message') ?>
                            <h5 class="card-title">Edit Branch</h5>
        <p class="card-text">Form to edit Branch in system</p>
        <div class="form-group">
          <label for="department_id" class="col-form-label-lg">Branch ID</label>
          <input type="text" readonly class="form-control form-control-lg" name="d_id" value="<?php echo set_value('d_id',$brn['id']);?>">
         
        </div>
        <div class="form-group">
          <label for="d_name" class="col-form-label-lg">Branch Name</label>
          <input type="text" class="form-control form-control-lg" name="d_name" id="d_name" value="<?php echo set_value('d_name',$brn['name']);?>">
          <?php echo form_error('d_name');?>
                            </div>
        <button type="submit" class="btn btn-sm btn-primary bg-gradient-primary btn-icon-split mt-4 float-right rounded-0">
          <span class="icon text-white">
            <i class="fas fa-check"></i>
          </span>
          <span class="text">Save Change</span>
        </button>
      </div>
    </div>
  </form>
</div>
</div>
<!-- /.container-fluid -->
</div>
<?php
$this->load->view('admin/footer');
?>