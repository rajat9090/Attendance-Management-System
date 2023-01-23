<?php
$this->load->view('user/header');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-flex w-100 align-items-center">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <h1 class="h3 mb-0 text-gray-800">Attendance History</h1>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
    </div>
  </div>
  <hr>
  <div class="card rounded-0 shadow mb-3">
    <div class="card-body">
      <fieldset class="border rounded-0 px-2 pb-2">
        <legend class="ml-3 px-3 w-auto">Filter Report</legend>
        <form action="" method="GET">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
              <input type="month" name="start" class="form-control form-control-sm rounded-0" value="<?= !empty($this->input->get('start')) ? $this->input->get('start') : '' ?>">
              <?= form_error('start', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <!-- <div class="col-lg-3 col-md-6 col-sm-12">
              <input type="date" name="end" class="form-control form-control-sm rounded-0" value="<?= !empty($this->input->get('end')) ? $this->input->get('end') : '' ?>">
              <?= form_error('end', '<small class="text-danger pl-3">', '</small>') ?>
            </div> -->
            <div class="col-2">
              <button type="submit" class="btn btn-primary btn-sm rounded-0 bg-gradient-primary "><i class="fa fa-file"></i> Show Attendance</button>
            </div>
          </div>
        </form>
      </fieldset>
    </div>
  </div>

  <?php if ($data['attendance']) : ?>
    <div class="card shadow mb-4 rounded-0">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Data Attendance</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-gradient-primary text-white">
              <tr>
                <th>#</th>
                <th width="270px">Date</th>
                <th width="150px">Shift</th>
                <th>Time In</th>
                <th>In Status</th>
                <th>Punch Out</th>
                <th>Out Status</th>
                <th>Break In</th>
                <th>Break Out</th>
                <th>Total Break</th>
                <th>Total Work In office</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // looping attendance list
              $i = 1;
              foreach ($data['attendance'] as $atd) :
              ?>
                <tr <?php if (date('l', $atd['in_time']) == 'Saturday' || date('l', $atd['in_time']) == 'Sunday') {
                      echo "class ='bg-secondary text-white'";
                    } ?>>

                  <!-- Column 1 -->
                  <td><?= $i++; ?></td>
                  <?php

                  // if WEEKENDS
                  if (date('l', $atd['in_time']) == 'Saturday' || date('l', $atd['in_time']) == 'Sunday') : ?>
                    <!-- Column 2 -->
                    <td colspan="6" class="text-center">OFF</td>
                  <?php

                  // if WEEKDAYS
                  else : ?>
                    <!-- Column 2 (Date) -->
                    <td><?= date('l, d F Y', $atd['in_time']); ?></td>

                    <!-- Column 3 (Shift) -->
                    <td>
                     <div style="line-height:1em">
                        <div class="text-xs"><b><?= date("h:i A", strtotime('2022-06-23 '.$atd['start'])) ?> TO <?= date("h:i A", strtotime('2022-06-23 '.$atd['end'])) ?></b></div>
                       
                      </div>  
                    </td>

                    <!-- Column 4 (Time In) -->
                    <td><?= date('h:i:s A', $atd['in_time']); ?></td>

                    <!-- Column 5 (Notes) -->
                    


                    <!-- Column 6 (In Status) -->
                    <td><?= $atd['in_status']; ?></td>

                    <!-- Column 7 (Time Out) -->
                    <td><?php if ($atd['out_time'] == 0) {
                          echo "Haven't Checked Out";
                        } else {
                          echo date('h:i:s A', $atd['out_time']);
                        }
                        ?>
                    </td>

                    <!-- Column 10 (Out Status) -->
                    <td><?php if ($atd['out_status'] == '') {
                          echo "N/A";
                        } else {
                          echo  $atd['out_status'];
                        }
                        ?></td>
                    <td><?php if ($atd['breakin'] == 0) {
                          echo "Didn't take break yet";
                        } else {
                         echo date('h:i:s A', $atd['breakin']);
                        }
                        ?></td>
                    <td><?php if ($atd['breakout'] == 0) {
                          echo "N/A";
                        } else {
                         echo date('h:i:s A', $atd['breakout']);
                        }
                        ?></td>
                   
                    <td><?php 
                    if($atd['breakin']==0){
                       echo "N/A";
                    }else{

                    
                    $bn=$atd['breakin'];
                    $bn1=date('H:i:s', $bn);
                    $breakin = strtotime($bn1);
                    $bt=$atd['breakout'];
                    $bt1=date('H:i:s', $bt);
	                  $breakout = strtotime($bt1);
	                  $min = intval(($breakout - $breakin)/60);
                    $final= '0'.floor($min/60).':'.($min -   floor($min/60) * 60).':'.($min%60);
                    echo $final;
                    }
                    ?></td>
                    <td><?php 
                    if ($atd['out_time'] == 0 && $atd['breakin']==0){
                      echo"N/A";
                    }
                    elseif ($atd['out_time']!= 0 && $atd['breakin']==0){
                      $it=date('H:i:s',$atd['in_time']);
                      $intime = strtotime($it);
                      $ot=date('H:i:s',$atd['out_time']);
                      $outtime = strtotime($ot);
                      $min = intval(($outtime - $intime)/60);
                       $totalwork= '0'.floor($min/60).':'.($min -   floor($min/60) * 60).':'.($min%60);
                       echo $totalwork;
                     
                    }

                    
                    else{ 
                    $bn=date('H:i:s',$atd['breakin']);
                    $breakin = strtotime($bn);
                    $bt=date('H:i:s',$atd['breakout']);
	                  $breakout = strtotime($bt);
                    $pp=$breakout - $breakin;
	                  // $min = intval(($breakout - $breakin)/60);
                    // $totalbreak= '0'.floor($min/60).':'.($min -   floor($min/60) * 60).':'.($min%60);
                    $it=date('H:i:s',$atd['in_time']);
                    $intime = strtotime($it);
                    $ot=date('H:i:s',$atd['out_time']);
                    $outtime = strtotime($ot);
                    $min1 = intval(($outtime - $intime-$pp)/60);
                     $totalwork= '0'.floor($min1/60).':'.($min1 -   floor($min1/60) * 60).':'.($min1%60);
                     echo $totalwork;
                    }
                    ?></td>

                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php else : ?>
    <h1 class="text-center">Please Pick Your Date</h1>
  <?php endif; ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
$this->load->view('user/footer');
?>