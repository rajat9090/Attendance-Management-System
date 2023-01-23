<?php
$this->load->view('user/header');
?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Attendance Form</h1>
</div>

<!-- Content Row -->
<div class="row">

  <div class="col">
    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4" style="min-height: 543px">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Stamp your Attendance!</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
          <?php if ($weekends == true) : ?>
                       <h1 class="text-center my-3">THANK YOU FOR THIS WEEK!</h1>
                       <h5 class="card-title text-center mb-4 px-4">Have a Good Rest this <b>WEEKEND</b></h5>
                       <b><p class="text-center text-dark pt-3">See You on Monday!</p></b>
                       <div class="row">
                         <button disabled class="btn btn-danger rounded-0 btn-sm text-xs mx-auto" style="font-size: 35px; width: 200px; height: 200px">
                           <i class="fas fa-fw fa-sign-out-alt fa-2x"></i>
                         </button>
                       </div>
                       <?php else : ?>
                       <?php if ($in == false) : ?>
                <form action="<?php echo base_url('user/uhom/attend')?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="row mb-3">
                  <div class="col-lg-5">
                    <input type="hidden" name="work_shift" value="<?php echo $all['id'];?>">
                    <label for="work_shift" class="col-form-label">Work Shift</label>
                    <input class="form-control" type="text"  placeholder="" value="<?php echo $all['start'];?> - <?php echo $all['end'];?>"readonly>
                  </div>
                  <div class="col-lg-5 offset-lg-1">
                  <input type="hidden" name="work_location" value="<?php echo $all['lid'];?>">
                    <label for="location" class="col-form-label">Punch In Location</label>
                    <input class="form-control" type="text"  placeholder="" value="<?php echo $all['lnam'];?>"readonly>
</div></div>
               
                    <hr>
                    <button type="submit" class="btn btn-primary bg-gradient-primary px-5 btn-lg rounded-pill" >
                      <i class="fas fa-fw fa-sign-in-alt"></i> Punch In
                    </button>
                    <hr>
                  </div>
                </div>
                </form> 
                <?php else : ?>
                         <!-- <h3 class="text-center my-3">THANK YOU FOR TODAY</h3> -->
                         
                         <?php if ($disable == false && $ok==false) : ?>
                           
                           <h6 class="card-title text-center mb-4 px-4">Your Time is recorded To check time time go to <a href="<?= base_url('user/uhom/history') ?>">History</a></h6><br>
                           <div class="row">
                             <a href="<?= base_url('user/uhom/checkout') ?>" onclick="return confirm('Time Out now? Make sure you are done with you work!')" class="btn btn-danger bg-gradient-danger rounded-pill px-5 btn-lg mx-auto">
                               <i class="fas fa-fw fa-sign-out-alt"></i> <b>Punch Out</b>
                             </a>
                             <a href="<?= base_url('user/uhom/breakin') ?>" onclick="return confirm('Break In now? Have a good break')" class="btn btn-warning  rounded-pill px-5 btn-lg mx-auto">
                               <i class="fas fa-fw fa-sign-out-alt"></i> <b>Break In</b>
                             </a>
                             <?php elseif ($disable == false && $ok==true && $okk==false) : ?>
                           
                           <h6 class="card-title text-center mb-4 px-4">Your Time is recorded To check time time go to <a href="<?= base_url('user/uhom/history') ?>">History</a></h6><br>
                           <div class="row">
                             <a href="<?= base_url('user/uhom/checkout') ?>" onclick="return confirm('Time Out now? Make sure you are done with you work!')" class="btn btn-danger bg-gradient-danger rounded-pill px-5 btn-lg mx-auto">
                               <i class="fas fa-fw fa-sign-out-alt"></i> <b>Punch Out</b>
                             </a>
                             <a href="<?= base_url('user/uhom/breakout') ?>" onclick="return confirm('Break Out now? Good! Do your remaining Work')" class="btn btn-primary  rounded-pill px-5 btn-lg mx-auto">
                               <i class="fas fa-fw fa-sign-out-alt"></i> <b>Break Out</b>
                             </a>
                             <?php elseif ($disable == false && $ok==true && $okk==true) : ?>
                           
                           <h6 class="card-title text-center mb-4 px-4">Your Time is recorded To check time time go to <a href="<?= base_url('user/uhom/history') ?>">History</a></h6><br>
                           <div class="row">
                             <a href="<?= base_url('user/uhom/checkout') ?>" onclick="return confirm('Time Out now? Make sure you are done with you work!')" class="btn btn-danger bg-gradient-danger rounded-pill px-5 btn-lg mx-auto">
                               <i class="fas fa-fw fa-sign-out-alt"></i> <b>Punch Out</b>
                             </a>
                            
                           <?php else : ?>
                            <h3 class="text-center my-3">THANK YOU FOR TODAY</h3>
                            <h6 class="card-title text-center mb-4 px-4">Take Rest </h6>
                             <b><p class="text-center text-dark pt-3">See You Tomorrow!</p></b>
                               
                             
                             <?php endif; ?>
                           <?php endif; ?>
                           <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End  -->
</div>
<!-- /.container-fluid -->

</div>
<?php
$this->load->view('user/footer');
?>

                     