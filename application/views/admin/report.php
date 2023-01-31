<?php
$this->load->view('admin/header');
?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-flex w-100 align-items-center">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <h1 class="h3 mb-0 text-gray-800">Report</h1>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
      <a href="<?php echo base_url().'admin/ahom/index'?>" class="btn btn-md btn-light btn-sm bg-gradient-light border rounded-0 mb-2 btn-icon-split">
        <span class="icon text-white-600">
          <i class="fas fa-angle-left"></i>
        </span>
        <span class="text">Add Back</span>
      </a>
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
                          </div>
            <!-- <div class="col-lg-3 col-md-6 col-sm-12">
              <input type="date" name="end" class="form-control form-control-sm rounded-0" value="<?= !empty($this->input->get('end')) ? $this->input->get('end') : '' ?>">
                          </div> -->
            <div class="col-lg-3 col-md-6 col-sm-12">
              <select class="form-control form-control-sm rounded-0" name="id">
              <option value="">Select Staff Id </option>
               
               
                <?php foreach ($euser as $row) : ?>
                  <option <?= !empty($this->input->get('id')) && $this->input->get('id') == $row['username1'] ? 'selected' : '' ?> value="<?= $row['username1']; ?>"><?= $row['username1']; ?></option>
                <?php endforeach; ?>
                                 
                              </select>
              
            </div>
            <div class="col-2">
              <button type="submit" class="btn btn-primary btn-sm rounded-0 bg-gradient-primary "><i class="fa fa-file"></i> Show Report</button>
            </div>
          </div>
        </form>
      </fieldset>
    </div>
  </div>
  <!-- End of row show -->
  <?php if ($attendance == false) : ?>
    <h3 class="text-center my-5">No Record Found</h3>
  <?php else : ?>
    <?php if ($attendance != null) : ?>
      <div class="card shadow mb-4 rounded-0">
        <div class="card-header py-3">
          <div class="d-flex w-100 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <h6 class="m-0 font-weight-bold text-dark">Data Attendance</h6>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-right">
              <a href="<?= base_url('admin/ahom/print/') . $start . '/'  . $id ?>" target="blank" class="btn btn-sm btn-light bg-gradient-light border shadow-sm rounded-0"><i class="fas fa-download fa-sm text-dark"></i> Print Report</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-gradient-primary text-white">
                <tr>
                  <th>#</th>
                  <th width="100px">Date</th>
                  <th>Name</th>
                  <th width="50px">Shift</th>
                  <th width="90px">Punch In</th>
                  <th>In Status</th>
                  <th width="90px">Punch Out</th>
                  <th >Out Status</th>
                  <th>Break In</th>
                  <th>Break Out</th>
                  <th>Total Break</th>
                  <th>Total Work In office</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($attendance as $atd) : ?>
                  <tr>
                    <th ><?= $i++ ?></th>
                    <td><?= date('Y-m-d', $atd['in_time']) ?></td>
                    <td><?= $atd['name'] ?></td>
                    <td>
                      <div style="line-height:1em">
                        <div class="text-xs"><?= date("h:i A", strtotime('2022-06-23 '.$atd['start'])) ?></div>
                        <div class="text-xs"><?= date("h:i A", strtotime('2022-06-23 '.$atd['end'])) ?></div>
                      </div>
                    </td>
                    <td ><?= date('h:i:s A', $atd['in_time']) ?></td>
                   
                    <td class="p-1 align-middle"><?= $atd['in_status']; ?></td>
                    <td><?php if ($atd['out_time'] == 0) {
                          echo "Haven't Checked Out";
                        } else {
                          echo date('h:i:s A', $atd['out_time']);
                        }
                        ?>
                    </td>
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

                  
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  
  <?php endif; ?>
  <?php endif; ?>
      <?php
//       for($i=1;$i<=10;$i++)
//       {
//         if($i%2==1)
//         {
// echo $i."<br>";
//         }
//       }
// $i=2;

// do{
//   if($i%2==0){

//   echo $i."<br>";
  
//   }
//   $i++;
 
// }
// while($i<=10){
//   $j=2;
//   while($j<$i){
//     if($i%$j==0){
// break;
//       }
//       $j++;
//   }
//   if($i==$j)
//   {
//     echo $i."<br>";
//   }
//       $i++;
// }
// $a=0;
// $b=1;
// echo $a.",".$b.",";
// for($i=0;$i<=10;$i++)
// {
//   $c=$a+$b;
//   echo $c.",";
//   $a=$b;
//   $b=$c;
// }
// echo $a=20;
// echo $b=30;
// $c;
// $c=$a;
// $a=$b;
// $b=$c;
// $a=$a+$b;
// $b=$a-$b; 
// $a=$a-$b;
// echo $a.",".$b;

// $num = 2;  
// $count=0;  
// if($num<2) {
//   echo "$num is not a prime number."; 
//   exit;
// }
// for ( $i=1; $i<=$num; $i++)  
// { 
  
// if(($num%$i)==0)  
// {  
// echo $count++;  
// }  
// }  
// if ($count<3)  
// {  
// echo "$num is a prime number.";  
// }
// else
// {
// echo "$num is not a prime number."; 
// }

// $ok='okkkk pi';
// echo strrev($ok);

?>  
      
  </div>
<!-- /.container-fluid -->

</div>
<?php
$this->load->view('admin/footer');
?>