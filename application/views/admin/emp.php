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
                          <button class="btn btn-success btn-rounded btn-xs mb-10" type="button"  onclick='editSeat("<?php echo $row["id"];?>","<?php echo $row["name"];?>","<?php echo $row["number"];?>","<?php if($row["gender"]=="M"){echo "Male";}else{echo"Female";}?>","<?php echo date("Y-m-d",strtotime($row["birth_date"]));?>","<?php echo $row["address"];?>","<?php echo $row["email"];?>","<?php echo $row["aadh"];?>","<?php echo $row["pan"];?>","<?php echo $row["pf"];?>","<?php echo $row["esi"];?>","<?php echo $row["branch"];?>","<?php echo $row["title"];?>","<?php echo $row["salary"];?>","<?php echo $row["date_joining"];?>");'><i class = "fa fa-eye"> </i></button>
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
      
        </div>
     
      </div>
  
      </div>
     

      <div class="modal fade" id="editSeatDetails" tabindex="-1" role="dialog" aria-labelledby="assigntodis" aria-hidden="true">

<div class="modal-dialog">

  <div class="modal-content">
     
                  
                 
         
           <div class="modal-header">

                  <h3 class="modal-title custom-font">Staff Data</h3>

              </div>
              
              <div class="modal-body">
              <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="employee_id" class="col-form-label">ID</label>
                          <input type="text" readonly class="form-control" name="userid" id="userid" >
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="form-group">
                          <label for="name" class="col-form-label">Name</label>
                          <input type="text" class="form-control" readonly name="name" id="name">
                         
                                                  </div>
                      </div>
                    </div>

             
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="number" class="col-form-label">Number</label>
                          <input type="text" readonly class="form-control"  id="number" >
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="form-group">
                          <label for="email" class="col-form-label">Email ID</label>
                          <input type="text" class="form-control" readonly id="email">
                         
                                                  </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="gender" class="col-form-label">Gender</label>
                          <input type="text" readonly class="form-control"  id="gender" >
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="dob" class="col-form-label">Date of Birth</label>
                          <input type="text" class="form-control" readonly id="birth_date">
                         
                                                  </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="doj" class="col-form-label">Date of Joining</label>
                          <input type="text" class="form-control" readonly id="date_joining">
                         
                                                  </div>
                      </div>
                    </div>
                 
                 
                  
                  <div class="mb-3">

                      <label class="form-label" for="address">Address</label>

                      <input id="address" class="form-control" type="text" readonly="readonly">

                  </div>
                 
                  <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="aadhar" class="col-form-label">Aadhar</label>
                          <input type="text" readonly class="form-control"  id="aadh" >
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="pan" class="col-form-label">Pan</label>
                          <input type="text" class="form-control" readonly id="pan">
                         
                                                  </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="pf" class="col-form-label">PF</label>
                          <input type="text" readonly class="form-control"  id="pf" >
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="esi" class="col-form-label">ESI</label>
                          <input type="text" class="form-control" readonly id="esi">
                         
                                                  </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label for="branch" class="col-form-label">Branch</label>
                          <input type="text" readonly class="form-control"  id="branch" >
                        </div>
                      </div>
                      <div class="col-lg-9">
                        <div class="form-group">
                          <label for="title" class="col-form-label">Title</label>
                          <input type="text" class="form-control" readonly id="title">
                         
                                                  </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="salary" class="col-form-label">Salary</label>
                          <input type="text" readonly class="form-control"  id="salary" >
                        </div>
                      </div>
                      <button type="button" style="margin-top:35px; margin-left:200px; height:40px; width:90px;"class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>


  </div>

</div>

</div>

</div>
<script>

function editSeat(userid,name,number,gender,birth_date,address,email,aadh,pan,pf,esi,branch,title,salary,date_joining)
{
$('#editSeatDetails').modal('show');

$('#userid').val(userid);

$('#name').val(name);
$('#number').val(number);
$('#gender').val(gender);
$('#birth_date').val(birth_date);
$('#address').val(address);
$('#email').val(email);
$('#aadh').val(aadh);
$('#pan').val(pan);
$('#pf').val(pf);
$('#esi').val(esi);
$('#branch').val(branch);
$('#title').val(title);
$('#salary').val(salary);
$('#date_joining').val(date_joining);
}
</script>
      <?php
$this->load->view('admin/footer');
?>
      