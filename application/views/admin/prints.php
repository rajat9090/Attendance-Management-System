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
        <h2 class="text-center">Staff Salary Report</h2>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-6">
        <h1 class="h5">Staff ID: <?= $id ?></h1>
      </div>
      <div class="col-6 text-right">
        <!-- <?php if ($start != null || $end != null) : ?>
          <h1 class="h5">From: <i><?= $start.'-01'; ?> To: </i><?= $start.'-31'; ?></i></h1>
        <?php else : ?>
          <h1 class="h5">All</h1>
        <?php endif; ?> -->
      </div>
    </div>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th width="230">Date</th>
          <th width="190">Name</th>
          <th>Staff ID</th>
          <th>Salary</th>
          
        </tr>
      </thead>
      <tbody>
        <?php

        // looping attendance list
        $i = 1;
        foreach ($attendance as $atd) :
        ?>
        <td><?= $i++ ?></td>
              <td><?= date('d F Y', $atd['time']); ?></td>
              <!-- <td><?= date('h:i:s A', $atd['time']); ?></td> -->
              <td><?= $atd['name']; ?></td>
              <td><?= $atd['username']; ?></td>
              <td><?= $atd['salary']; ?></td>

           
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