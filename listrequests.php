<?php include_once("adminheader.php");?>


<!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small class="myheading text-muted text-decoration-underline" >List of requests</small>
    </h1>

    <a href="approved.php" class="btn btn-success mb-3 myadmintext">Approved</a>

    <a href="pending.php" class="btn btn-secondary mb-3 myadmintext">Pending</a>

    <a href="declined.php" class="btn btn-danger mb-3 myadmintext">Declined</a>

    <a href="javascript:void(0)" class="btn btn-light mb-3 myadmintext"  onclick="start()">Pull</a>

        <div class="w-75">

    <?php
      if (isset($_REQUEST['m'])) {
        # code...
      ?>
        <div class="alert alert-success">

        <?php echo $_REQUEST['m']; ?>
        </div>

        <?php  }?>


        <?php
      if (isset($_REQUEST['info'])) {
        # code...
      ?>
        <div class="alert alert-info">

        <?php echo $_REQUEST['info']; ?>
        </div>

        <?php  }?>


        <?php
      if (isset($_REQUEST['err'])) {
        # code...
      ?>
        <div class="alert alert-danger">

        <?php echo $_REQUEST['err']; ?>
        </div>

        <?php  }?>

        </div>

    
 
    <div class="row">
      <div class="col-md-12 mb-4">

      <div class="card">
        <div class="card-header bg-secondary ">
            <h3 class="myadmintext text-white">List of requests</h3>
                    </div>

                    <div class="card-body">
                      <div class="card-text"> 

 
        <table class="table table-hover table-bordered table-striped">
            <thead class="">

            <tr class="myadmintext">
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date 0f Birth</th>
                <th>Gender</th>
                <th>Picture</th>
                <th>requestdate</th>
                <th>Status</th>


                </tr>
            </thead>

            <tbody class="myadmintext">


                <?php
                #include class

                include_once('shared/user.php');

                #create club object
                $userobj = new User();
                
                $output = $userobj->listrequests();

                // echo "<pre>";
                // print_r($output);
                // echo "</pre>";


                    if (count($output)>0) {

                        foreach($output as $key => $value){
                            $request_id = $value['request_id'];

                        ?>

                        <tr>
                            <td>#</td>
                            <td><?php echo $value['firstname']?></td>
                            <td><?php echo $value['lastname']?></td>
                             <td><?php echo date('l jS F, Y', strtotime($value['dateof_birth']))?></td>
                            <td><?php echo $value['gender']?></td>
                            

                            <td>
                              <?php
                              if (!empty($value['picture'])) {
                                # code...
          
                              ?>

                                <img src="fosterphotos/pictures<?php echo $value['picture']?>" alt="<?php echo $value['firstname']?> picture" class="img-fluid" style="height:100px;">
                              <?php } ?>   

                              <?php //echo $value['picture']?>
                            
                            </td>


                            <td><?php echo date(' jS F, Y', strtotime($value['requestdate']))?></td>

                            <td>
                             
                            <a href="grantrequest.php?requestid=<?php echo $request_id?>&firstname=<?php echo $value['firstname']; ?>&lastname=<?php echo $value['lastname']; ?>&reqstatus=<?php echo $value['requeststatus']; ?>" class="btn btn-success" id="btnaccept">Accept</a>

                            <a href="deleterequest.php?requestid=<?php echo $request_id?>&firstname=<?php echo $value['firstname']; ?>&lastname=<?php echo $value['lastname']; ?>&reqstatus=<?php echo $value['requeststatus']; ?>" class="btn btn-danger" id="btndecline">Decline</a>
            
                    
                     </td>
                            


                            <!-- <td><?php 
                            if (!empty($value['emblem'])) {
                              # code...
                            ?>
                              <img src="clubphotos/<?php //echo $value['emblem']?>" alt="<?php //echo $value['club_name']?> emblem" class="img-fluid">
                            <?php  } ?></td>
                            
                            <td>

                            <a href="editclub.php?clubid=<?php //echo $clubid?>">Edit</a> |  
                            <a href="deleteclub.php?clubid=<?php //echo $clubid?>&clubname=<?php //echo $value['club_name']; ?>">Delete</a>

                            </td>
                             -->
                        </tr>

                        <?php }
                        
                        
                    }

                
                ?>

                  
            </tbody>
        </table>
            <!-- card text ends here -->
        </div> 
            <!-- card body ends here -->
        </div>
            <!-- card ends here -->
        </div>

        <!-- col ends here -->
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- jquery script file -->
    <script type="text/javascript" src="jquery.min.js"></script>

       <!-- linking to push         -->
    <script src="mypush/push.min.js"></script>

          <!-- linking to service worker        -->
    <script src="mypush/serviceWorker.min.js"></script>

    <!-- external javascript -->
    <script src="push.js"></script>

    


  <?php include_once("adminfooter.php");?>
