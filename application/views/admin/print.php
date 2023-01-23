<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Attendance Report</title>
</head>

<body>
  <div class="container border">
    <div class="row mb-2">
      <div class="col">
        <h2 class="text-center">Staff Attendance Report</h2>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-6">
        <h1 class="h5">Staff ID: <?= $id ?></h1>
      </div>
      <div class="col-6 text-right">
        <?php if ($start != null || $end != null) : ?>
          <h1 class="h5">From: <i><?= $start.'-01'; ?> To: </i><?= $start.'-31'; ?></i></h1>
        <?php else : ?>
          <h1 class="h5">All</h1>
        <?php endif; ?>
      </div>
    </div>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
        <th>#</th>
                  <th width="100px">Date</th>
                  
                  <th width="100px">Shift</th>
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
        <?php

        // looping attendance list
        $i = 1;
        foreach ($attendance as $atd) :
        ?>
          <tr <?php if (date('l', $atd['in_time']) == 'Saturday' || date('l', $atd['in_time']) == 'Sunday') {
                echo "class ='bg-secondary text-white'";
              } ?>>

            <!-- Kolom 1 -->
            <td><?= $i++; ?></td>
            <?php

            // if WEEKENDS
            if (date('l', $atd['in_time']) == 'Saturday' || date('l', $atd['in_time']) == 'Sunday') : ?>
              <!-- Kolom 2 -->
              <td colspan="6" class="text-center">OFF</td>
            <?php

            // if WEEKDAYS
            else : ?>
              
              <td><?= date('l, d F Y', $atd['in_time']); ?></td>

              
              <td>
                <div style="line-height:1em">
                <div class="text-xs"><?= date("h:i A", strtotime('2022-06-23 '.$atd['start'])) ?> TO <?= date("h:i A", strtotime('2022-06-23 '.$atd['end'])) ?></div>
                    
                </div>
              </td>

             
              <td><?= date('h:i:s A', $atd['in_time']); ?></td>

             

             
              <td><?= $atd['in_status']; ?></td>

              
              <td><?php if ($atd['out_time'] == 0) {
                    echo "Haven't Checked Out";
                  } else {
                    echo date('h:i:s A', $atd['out_time']);
                  }
                  ?>
              </td>

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
              

            <?php endif; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>



  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
  <!-- Optional JavaScript -->
  <script>
    $(function(){
      window.print();
      setTimeout(() => {
        window.close()
      }, 30000);
    })
  </script>
</body>

</html>