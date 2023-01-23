<!-- <?php
$this->load->view('admin/header');
?>
 <div class="container-fluid py-3">

         <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Users</h1>

          <a href="<?php echo base_url('admin/ahom/users')?>" class="btn btn-light bg-gradient-light border btn-icon-split mb-4 rounded-0">
            <span class="icon text-white">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Back</span>
          </a>
          <div class="row justify-content-center">
            <div class="col-lg-5 p-0">
              <form action="<?php echo base_url('admin/ahom/a_users/'.$id)?>" method="POST">
                <div class="card rouded-0">
                  <h5 class="card-header">Users Data</h5>
                  <div class="card-body">
                    <h5 class="card-title">Add New Users</h5>
                    <p class="card-text">Form to add new users to system</p>
                    <input type="hidden" name="e_id" value="034">
                    <div class="form-group row">
                      <label for="u_username" class="col-form-label col-lg-4">Username</label>
                      <div class="col p-0">
                        <input type="text" readonly class="form-control col-lg" name="u_username" id="u_username" value="<?php echo set_value('u_username',$usernam)?>">
                                              </div>
                    </div>
                    <div class="form-group row">
                      <label for="u_password" class="col-form-label col-lg-4">Password</label>
                      <div class="col p-0">
                        <input type="password" class="form-control col-lg" name="u_password" id="u_password">
                        <?php echo form_error('u_password');?>
                                              </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary bg-gradient-primary btn-icon-split mt-4 float-right rounded-0">
                      <span class="icon text-white">
                        <i class="fas fa-plus-circle"></i>
                      </span>
                      <span class="text">Save</span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        </div>
<?php
$this->load->view('admin/footer');
?> -->