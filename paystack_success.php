<?php include_once('frontheader.php')?>


<!-- Page Content -->
  <div class="container">

   <div class="row">
    <div class="col-md-10 mt-5 mx-auto">
        <div class="card mt-5">
            <div class="card-header text-center">
                
            <h3 class="mt-4 mb-3 ">
      <small class="donationtext">Donation Status</small>
    </h3>
                </div>

                <div class="card-body">
                     <!-- Page Heading/Breadcrumbs -->
    

    
 
    <div class="row">
      <div class="col-lg-8 mb-4 mx-auto">

            <?php
            
            if (isset($_REQUEST['ref'])) {
                # code...
            
            
            ?>

               <div class="alert alert-success">

               <p>Your donation with reference number <b><?php  echo $_REQUEST['ref']?></b> was successful.</p>
               </div>     

            <?php } ?>
      </div>

    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col">
            <small>Click <a href="index.php" class="btn btn-outline-secondary">here</a> to go back to the homepage</small>
        </div>
    </div>

            </div>
        </div>
    </div>
   </div>
  </div>
  <!-- /.container -->


  <?php //include_once('frontfooter.php')?>
