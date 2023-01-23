<?php
$this->load->view('admin/header');
?>

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Employee</h1>
<div class="row">
  <div class="col-lg-3">
    <a href="<?php echo base_url('admin/ahom/emp') ?>" class="btn btn-light bg-gradient-light border btn-icon-split mb-4 rounded-0">
      <span class="icon text-white">
        <i class="fas fa-chevron-left"></i>
      </span>
      <span class="text">Back</span>
    </a>
  </div>
  <div class="col-lg-10 offset-lg-1">
              <?= $this->session->flashdata('message'); ?>
            </div>
  
</div>
<div class="row justify-content-center">
  <div class="col-lg-10 p-0">
    <form action="<?php echo base_url('admin/ahom/a_emp') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="card rounded-0">
      <h5 class="card-header">Staff Data</h5>
      <div class="card-body">
        <h5 class="card-title">Add New Staff</h5>
        <p class="card-text">Form to add new staff to system</p>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group row">
              <label for="e_name" class="col-form-label col-lg-4">Staff Name*</label>
              <div class="col p-0">
                <input type="text" class="form-control col-lg" name="e_name" id="e_name" value="<?php echo set_value('e_name')?>" autofocus>
                <?php echo form_error('e_name');?>
                                        </div>
            </div>
            <div class="form-group row">
              <label for="e_number" class="col-form-label col-lg-4">Staff Number*</label>
              <div class="col p-0">
                <input type="number" class="form-control col-lg" name="e_number" id="e_number" value="<?php echo set_value('e_number')?>" autofocus>
                <?php echo form_error('e_number');?>
                                        </div>
            </div>
            
            <div class="form-group row">
              <label for="e_gender" class="col-form-label col-lg-4">Gender*</label>
              <div class="form-check form-check-inline my-0">
                <input class="form-check-input" type="radio" name="e_gender" id="m" value="M" checked >
                <label class="form-check-label" for="m">
                  Male
                </label>
                </div>                       
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="e_gender" id="f" value="F">
                <label class="form-check-label" for="f">
                  Female
                  
                </label>
              </div>
             
            </div>
            
            <div class="form-group row">
              <label for="e_birth_date" class="col-form-label col-lg-4">Staff D.O.B*</label>
              <div class="col-lg p-0">
                <input type="date" class="form-control col-lg" name="e_birth_date" id="e_birth_date" min="1990-01-01" max="2002-01-01" value="<?php echo set_value('e_birth_date')?>">
                <?php echo form_error('e_birth_date');?>
                                        </div>
            </div>
            <div class="form-group row">
              <label for="address" class="col-form-label col-lg-4">Address*</label>
              <div class="col p-0">
                <input type="text" class="form-control col-lg" name="address" id="address" value="<?php echo set_value('address')?>">
                <?php echo form_error('address');?>
                                        </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-form-label col-lg-4">Email*</label>
              <div class="col p-0">
                <input type="text" class="form-control col-lg" name="email" id="email" value="<?php echo set_value('email')?>">
                <?php echo form_error('email');?>
                                        </div>
            </div>
            <div class="form-group row">
              <label for="aadhar" class="col-form-label col-lg-4">Aadhar Number</label>
              <div class="col p-0">
                <input type="text" class="form-control col-lg" name="aadh" id="aadh">
                                        </div>
            </div>
            <div class="form-group row">
              <label for="pan" class="col-form-label col-lg-4">Pan Number</label>
              <div class="col p-0">
                <input type="text" class="form-control col-lg" name="pan" id="pan">
                                        </div>
            </div>
            <div class="form-group row">
              <label for="pf" class="col-form-label col-lg-4">Pf Number</label>
              <div class="col p-0">
                <input type="text" class="form-control col-lg" name="pf" id="pf">
                                        </div>
            </div>
            <div class="form-group row">
              <label for="esi" class="col-form-label col-lg-4">Esi Number</label>
              <div class="col p-0">
                <input type="text" class="form-control col-lg" name="esi" id="esi">
                                        </div>
            </div>
            
          </div>
          
          <div class="col-lg-6">
         
            <div class="form-group row">
              <label for="d_id" class="col-form-label col-lg-4">Branch*</label>
              <div class="col p-0">
                <select class="form-control" name="b_id" id="b_id">
                <option value="">Select Branch</option>
                <?php foreach ($branch as $row) : ?>
                              <option <?php echo set_select('b_id',$row['id'],false)?>value="<?= $row['id'] ?>"><?= $row['name']; ?></option>
                            <?php endforeach; ?>
                                            </select>
                                            <?php echo form_error('b_id');?>
              </div>
             
            </div>
            <div class="form-group row">
              <label for="d_id" class="col-form-label col-lg-4">Shift*</label>
              <div class="col p-0">
                <select class="form-control" name="shift" id="shift">
                <option value="">Select Shift</option>
                <?php foreach ($shift as $row) : ?>
                              <option <?php echo set_select('shift',$row['id'],false)?>value="<?= $row['id'] ?>"><?= $row['id']; ?> = <?= $row['start']; ?>-<?= $row['end']; ?></option>
                            <?php endforeach; ?>
                                            </select>
                                            <?php echo form_error('shift');?>
              </div>
             
            </div>
            <div class="form-group row">
              <label for="d_id" class="col-form-label col-lg-4">Location*</label>
              <div class="col p-0">
                <select class="form-control" name="l_id" id="l_id">
                <option value="">Select Location</option>
                <?php foreach ($loc as $row) : ?>
                              <option <?php echo set_select('l_id',$row['id'],false)?>value="<?= $row['id'] ?>"><?= $row['name']; ?></option>
                            <?php endforeach; ?>
                                            </select>
                                            <?php echo form_error('l_id');?>
              </div>
             
            </div>
            
            <div class="form-group row">
              <label for="title" class="col-form-label col-lg-4">Job Title</label>
              <div class="col p-0">
                <input type="text" class="form-control col-lg" name="title" id="title">
                                        </div>
            </div>
            <div class="form-group row">
              <label for="title" class="col-form-label col-lg-4">Salary</label>
              <div class="col p-0">
                <input type="number" class="form-control col-lg" name="salary" id="salary">
                                        </div>
            </div>
            <div class="form-group row">
              <label for="e_hire_date" class="col-form-label col-lg-4">Joining Date*</label>
              <div class="col-lg p-0">
                <input type="date" class="form-control col-lg" name="e_hire_date" id="e_hire_date" min="2004-04-16" max="" value="<?php echo set_value('e_hire_date')?>">
                <?php echo form_error('e_hire_date');?>
                                        </div>
    </div>
    <!-- <div class="form-group row">
              <label for="sid" class="col-form-label col-lg-4">Staff ID</label>
              <div class="col p-0">
                <input type="text" class="form-control col-lg" name="sid" id="sid">
                                        </div>
            </div> -->
            <div class="form-group row">
              <label for="image" class="col-form-label col-lg-4">Employee Image</label>
              <div class="col-lg-8 p-0">
                <input type="file" name="image" id="image">
              </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary bg-gradient-primary btn-icon-split mt-4 float-right rounded-0">
          <span class="icon text-white">
            <i class="fas fa-plus-circle"></i>
          </span>
          <span class="text">Save</span>
        </button>
        </form>                </div>
    </div>
    </form>            </div>
</div>
</div>
         
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<?php
$this->load->view('admin/footer');
?>