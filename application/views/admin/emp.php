<?php
$this->load->view('admin/header');
?>

        <!-- End of Topbar -->        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-flex w-100 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <h1 class="h3 mb-0 text-gray-800">Staff</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
              <a href="<?php echo base_url('admin/ahom/a_emp') ?>" class="btn btn-primary btn-sm bg-gradient-primary rounded-0 btn-icon-split mb-0">
                <span class="icon text-white-600">
                  <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text">Add New Staff</span>
              </a>
            </div>
          </div>
          <div class="col-lg-10 offset-lg-1">
              <?= $this->session->flashdata('message'); ?>
            </div>
  

          <!-- Data Table employee-->
          <div class="card rounded-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-dark">DataTables Staff</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <colgroup>
                      <col width="5%">
                      <col width="10%">
                      <col width="10%">
                      <col width="15%">
                      <col width="15%">
                      <col width="10%">
                      <col width="15%">
                      <col width="15%">
                      <col width="10%">
                    </colgroup>
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Branch Code</th>
                      <th>Gender</th>
                      <th>DOB</th>
                      <th>Hire Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                
                  <tbody>
                    
                    <?php
                     $i = 1;
                    foreach($emp as $row)
                    {?>                                     <tr>
                        <td class=" align-middle"><?php echo $i++;?></td>
                        <td class=" align-middle"><?php echo $row['id']?></td>
                        <td class="text-center"><img src="<?= base_url('assets/empimg/') . $row['image']; ?>?v=<?php echo time(); ?>" style="width: 3em; height:3em;object-fit:cover;object-position:center center; border-width: 3px !important;" class="img-rounded border rounded-circle"></td>
                        <td class=" align-middle"><?php echo $row['name']?></td>
                        <td class=" align-middle text-center"><?php echo $row['branch']?></td>
                        <td class=" align-middle"><?php if ($row['gender']=='M'){
                          echo"Male";}
                          else{
                            echo"Female";
                          }?></td>
                        <td class=" align-middle"><?php echo $row['birth_date']?></td>
                        <td class=" align-middle"><?php echo $row['date_joining']?></td>
                        <td class="text-center align-middle">    
                          <a href="<?php echo base_url('admin/ahom/e_emp/').$row['id'] ?>" class="btn btn-primary rounded-0 btn-sm text-xs">
                            <span class="icon text-white" title="Edit">
                              <i class="fas fa-edit"></i>
                            </span>
                          </a> |
                          <a href="<?php echo base_url('admin/ahom/d_emp/').$row['id'] ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Staff will lost forever. Still want to delete?')">
                            <span class="icon text-white" title="Delete">
                              <i class="fas fa-trash-alt"></i>
                            </span>
                          </a>
                        </td>
                      </tr>
                   <?php }
                      ?>
                                                               
                                      </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->      <!-- Footer -->
      
      <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      
      <?php
$this->load->view('admin/footer');
?>
      