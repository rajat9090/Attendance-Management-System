<?php
$this->load->view('admin/header');
?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-flex w-100 align-items-center">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <h1 class="h3 mb-0 text-gray-800">Location</h1>
  </div>
  
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
    <a href="<?php echo base_url('admin/ahom/a_loc') ?>" class="btn btn-primary btn-sm bg-gradient-primary rounded-0 btn-icon-split mb-0">
      <span class="icon text-white-600">
        <i class="fas fa-plus-circle"></i>
      </span>
      <span class="text">Add New Location</span>
    </a>
  </div>
</div>
<hr>
<div class="col-lg-12 offset-lg-0">
              <?= $this->session->flashdata('message'); ?>
            </div>

<!-- Data Table Location-->
<div class="card shadow mb-4 rounded-0">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Different Location where Staff Works</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <colgroup>
            <col width="10%">
            <col width="75%">
            <col width="15%">
          </colgroup>
        <thead>
          <tr>
            <th>#</th>
            <th>Location Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        
        <tbody>
          <?php 
          $i=1;
          foreach($loc as $row){?>

          
                                <tr>
              <td class="align-middle"><?php echo $i++;?></td>
              <td class="align-middle"><?php echo $row['name'];?></td>
              <td class="align-middle text-center">
                <a href="<?php echo base_url('admin/ahom/e_loc/').$row['id'];?>" class="btn btn-primary rounded-0 btn-sm text-xs">
                  <span class="icon text-white" title="Edit">
                    <i class="fas fa-edit"></i>
                  </span>
                </a> |
                <a href="<?php echo base_url('admin/ahom/d_loc/').$row['id']; ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Location will lost forever. Still want to delete?')">
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