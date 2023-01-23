<?php
$this->load->view('admin/header');
?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Branch</h1>

<div class="row">
  <div class="col-lg-3">
    <a href="<?php echo base_url('admin/ahom/a_brn') ?>" class="btn btn-primary bg-gradient-primary btn-icon-split rounded-0 mb-4">
      <span class="icon text-white-600">
        <i class="fas fa-plus-circle"></i>
      </span>
      <span class="text">Add New Branch</span>
    </a>
  </div>
  <div class="col-lg-12 offset-lg-0">
  <?= $this->session->flashdata('message'); ?>
                </div>
</div>

<!-- Data Table Department-->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Branch</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>ID</th>
            <th>Branch Name</th>
            <th>Actions</th>
          </tr>
        </thead>
       
        <tbody>
        <?php 
            $i=1;
            foreach($brn as $row){
            ?>
                                <tr>
              <td class="align-middle"><?php echo $i++;?></td>
              <td class="align-middle"><?php echo $row['id'];?></td>
              <td class="align-middle"><?php echo $row['name'];?></td>
              <td class="align-middle text-center">
                <a href="<?php echo base_url('admin/ahom/e_brn/').$row['id'] ?>" class="btn btn-primary rounded-0 btn-sm text-xs">
                  <span class="icon text-white" title="Edit">
                    <i class="fas fa-edit"></i>
                  </span>
                </a> |
                <a href="<?php echo base_url('admin/ahom/d_brn/').$row['id'] ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Branch will lost forever. Still want to delete?')">
                  <span class="icon text-white" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                  </span>
                </a>
              </td>
            </tr>
               <?php }?>            
                               
                            </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<?php
$this->load->view('admin/footer');
?>