<?php
$this->load->view('admin/header');
?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-flex w-100 align-items-center">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
  </div>
</div>
<hr>
<div class="row">

  <div class="col-lg-12 col-md-12 col-sm-12">
  <?= $this->session->flashdata('message'); ?>
                </div>
</div>

<!-- Data Table Users-->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">DataTables Users</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>EmpID</th>
            <th>Employee</th>
            <th>Dept.ID</th>
            <th>Username</th>
            <th>Actions</th>
          </tr>
        </thead>
        
        <tbody>
            <?php 
            $i=1;
            foreach($users as $row){
            ?>
                                <tr>
              <td class=" align-middle"><?php echo $i++;?></td>
              <td class=" align-middle"><?php echo $row['id'];?></td>
              <td class=" align-middle"><?php echo $row['name'];?></td>
              <td class=" align-middle"><?php echo $row['branch'];?></td>
              <?php
                        if ($row['uname']) : ?>
                          <td class=" align-middle text-center">
                            <?= $row['uname']; ?>
                          </td>
                          <td class="text-center align-middle">
                            <a href="<?= base_url('admin/ahom/e_users/') . $row['uname']?>" class="btn btn-primary rounded-0 btn-sm text-xs ">
                              <span class="icon text-white" title="Edit">
                                <i class="fas fa-edit"></i>
                              </span>
                            </a> |
                            <a href="<?= base_url('admin/ahom/d_users/') . $row['id'] ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Users will lost forever. Still want to delete?')">
                              <span class="icon text-white" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                              </span>
                            </a>
                          </td>
                        <?php else : ?>
                          <td class=" align-middle text-center">
                            <a href="<?= base_url('admin/ahom/a_users/') . $row['id']; ?>" class="btn btn-primary btn-sm bg-gradient-primary rounded-pill px-3">Create Account</a>
                          </td>
                          <td class="text-center align-middle">
                            <button class="btn btn-primary rounded-0 btn-sm text-xs" disabled>
                              <span class="icon text-white" title="Edit">
                                <i class="fas fa-edit"></i>
                              </span>
                            </button> |
                            <button class="btn btn-danger rounded-0 btn-sm text-xs" disabled>
                              <span class="icon text-white" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                              </span>
                            </button>
                          </td>
                        <?php endif; ?>

                                    </tr>
                                    <?php }?>
                                
                            </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<?php
$this->load->view('admin/footer');
?>