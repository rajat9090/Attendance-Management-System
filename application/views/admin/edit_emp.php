<?php
$this->load->view('admin/header');
?>
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Employee</h1>

          <a href="<?php echo base_url('admin/ahom/emp') ?>" class="btn btn-light bg-gradient-light border btn-icon-split mb-4 rounded-0">
            <span class="icon text-white">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Back</span>
          </a>
          <div class="col-lg-10 offset-lg-1">
              <?= $this->session->flashdata('message'); ?>
            </div>
          
          <form action="<?php echo base_url('admin/ahom/e_emp/'.$emp['id']) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
          <div class="col-lg-12 p-0">
            
                        <div class="row justify-content-center">
              <div class="col-lg-3">
                <div class="card rounded-0 shadow" style="width: 100%; height: 100%">
                  <img src="<?= base_url('assets/empimg/') . $emp['image']; ?>" class="card-img-top w-75 mx-auto pt-3">
                  <div class="card-body mt-3">
                    <label for="image">Change Staff Image</label>
                    <input type="file" name="image" id="image" class="mt-2">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card rounded-0 shadow">
                  <h5 class="card-header">Staff Data</h5>
                  <div class="card-body">
                    <h5 class="card-title">Edit Employee</h5>
                    <p class="card-text">Form to edit Staff Data in system</p>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="employee_id" class="col-form-label">Staff ID</label>
                          <input type="text" readonly class="form-control" name="e_id" value="<?php echo  set_value('e_id',$emp['id']);?>">
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="form-group">
                          <label for="e_name" class="col-form-label">Staff Name</label>
                          <input type="text" class="form-control" name="e_name" id="e_name" value="<?php echo  set_value('e_name',$emp['name']);?>">
                          <?php echo form_error('e_name');?>
                                                  </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="employee_id" class="col-form-label">Staff Number</label>
                          <input type="text"  class="form-control" name="e_number" value="<?php echo  set_value('e_number',$emp['number']);?>">
                          <?php echo form_error('e_number');?>
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="form-group">
                          <label for="e_name" class="col-form-label">Staff Email</label>
                          <input type="text" class="form-control" name="e_mail" id="e_mail" value="<?php echo  set_value('e_email',$emp['email']);?>">
                          <?php echo form_error('e_mail');?>
                                                  </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="e_gender" class="col-form-label">Gender</label>
                          <div class="row col-lg">
                            <div class="form-check form-check-inline my-0">
                              <input class="form-check-input" type="radio" name="e_gender" value="M" id="m" <?php echo ($emp['gender']=='M')?'checked':'';?>>
                              <label class="form-check-label" for="m">
                                Male
                              </label>
                                                          </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="e_gender" value="F" id="f" <?php echo ($emp['gender']=='F')?'checked':'';?>>
                              <label class="form-check-label" for="f">
                                Female
                              </label>
                            </div>
                          </div>
                                                  </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="e_birth_date" class="col-form-label">Employee D.O.B</label>
                          <div class="col-lg p-0">
                            <input type="date" class="form-control" name="e_birth_date" id="e_birth_date" min="1990-01-01" max="2002-01-01" value="<?php echo  set_value('e_birth_date',$emp['birth_date']);?>">
                            <?php echo form_error('e_birth_date');?>
                                                      </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="e_hire_date" class="col-form-label">Hire Date</label>
                          <div class="col-lg p-0">
                            <input type="date" class="form-control" name="e_hire_date" id="e_hire_date" min="2004-04-16" max="" value="<?php echo  set_value('e_hire_date',$emp['date_joining']);?>">
                            <?php echo form_error('e_hire_date');?>
                                                      </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                     
                      <div class="col-lg-7">
                     
                        <div class="form-group">
                          <label for="address" class="col-form-label">Address</label>
                          <input type="text" class="form-control" name="address" id="address" value="<?php echo  set_value('address',$emp['address']);?>">
                          <?php echo form_error('address');?>
                                                  </div>
                      </div>
                    
                    <div class="col-lg-5">
                        <div class="form-group">
                          <label for="d_id" class="col-form-label">Branch</label>
                          <select class="form-control" name="b_id" id="b_id">
                                                          <option value="" >Select Branch</option>
                               <?php foreach ($branch as $row) : 
                                $selected=($emp['branch']==$row['id'])? true :false;
                                ?>
                              <option <?php echo set_select('b_id',$row['id'],$selected)?>value="<?= $row['id'] ?>"><?= $row['name']; ?></option>
                            <?php endforeach; ?>
                                                      </select>
                                                      <?php echo form_error('b_id');?>
                        </div>
                      </div>
                      
                     
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="e_name" class="col-form-label">Salary</label>
                          <input type="text" class="form-control" name="sal" id="sal" value="<?php echo  set_value('sal',$emp['salary']);?>">
                         
                                                  </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="e_name" class="col-form-label">Aadhar Number</label>
                          <input type="text" class="form-control" name="aadh" id="aadh" value="<?php echo  set_value('aadh',$emp['aadh']);?>">
                         
                                                  </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="employee_id" class="col-form-label">Pan Number</label>
                          <input type="text"  class="form-control" name="pan" value="<?php echo  set_value('pan',$emp['pan']);?>">
                          
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="employee_id" class="col-form-label">PF Number</label>
                          <input type="text"  class="form-control" name="pf" value="<?php echo  set_value('pf',$emp['pf']);?>">
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                   
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="e_name" class="col-form-label">ESI Number</label>
                          <input type="text" class="form-control" name="esi" id="esi" value="<?php echo  set_value('esi',$emp['esi']);?>">
                          
                                                  </div>
                      </div>
                     
                    </div>
                    
                    <button type="submit" class="btn btn-sm btn-primary bg-gradient-primary btn-icon-split mt-4 float-right rounded-0">
                      <span class="icon text-white">
                        <i class="fas fa-check"></i>
                      </span>
                      <span class="text">Save Changes</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>        </div>
        <!-- /.container-fluid -->

        </div>
        <?php
$this->load->view('admin/footer');
?>