<?php
$this->load->view('admin/header');
?>
    <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Users</h1>

<a href="<?php echo base_url('admin/ahom/users')?>" class="btn btn-light bg-gradient-light border btn-icon-split mb-4 rounded-0">
  <span class="icon text-white">
    <i class="fas fa-chevron-left"></i>
  </span>
  <span class="text">Back</span>
</a>
<div class="row justify-content-center">

  <form action="" method="POST" class="col-lg-5 col-md-6 col-sm-12 p-0">
    <div class="card">
      <h5 class="card-header">Users Data</h5>
      <div class="card-body">
      <?= $this->session->flashdata('message1') ?>
        <h5 class="card-title">Edit Users</h5>
        <p class="card-text">Form to edit users in system</p>
        <div class="form-group">
          <label for="u_username" class="col-form-label-lg">Username</label>
          <input type="text" readonly class="form-control form-control-lg" name="u_username" value="<?php echo $uname;?> ">
        </div>
        <div class="form-group">
          <label for="password" class="col-form-label-lg">Reset Password</label>
          <input type="password" class="form-control form-control-lg" name="password" id="password" value="<?php echo set_value('password'); ?>">
          <?php echo form_error('password', '<small class="text-danger">', '</small>');?>
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