<?php include_once("adminheader.php");?>


<!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small class="myheading text-muted text-decoration-underline" >List of foster kids</small>
    </h1>

    
 
    <div class="row">
      <div class="col-lg-10 mb-4">

      <div class="card">
        <div class="card-header bg-secondary ">
            <h3 class="myadmintext text-white">Foster kids</h3>
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
                <th>Hobbies</th>
                <th>Picture</th>
                <th>Blood Group</th>
                <th>Allergies</th>
                <th>DNA Report</th>
                <th>Medical Challenges</th>

                </tr>
            </thead>

            <tbody class="myadmintext">


                <?php
                #include class

                include_once('shared/user.php');

                #create club object
                $userobj = new User();
                
                $output = $userobj->listfosterkids();

                // echo "<pre>";
                // print_r($output);
                // echo "</pre>";


                    if (count($output)>0) {

                        foreach($output as $key => $value){
                            $fosterkid_id = $value['fosterkid_id'];

                        ?>

                        <tr>
                            <td>#</td>
                            <td><?php echo $value['fosterkid_firstname']?></td>
                            <td><?php echo $value['fosterkid_lastname']?></td>
                             <td><?php echo date('l jS F, Y', strtotime($value['dateof_birth']))?></td>
                            <td><?php echo $value['gender']?></td>
                            <td><?php echo $value['hobbies']?></td>
                            <td><?php echo $value['picture']?></td>
                            <td><?php echo $value['blood_group']?></td>
                            <td><?php echo $value['allergies']?></td>
                            <td><?php echo $value['dna_report']?></td>
                            <td><?php echo $value['medical_challenge']?></td>


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


  <?php include_once("adminfooter.php");?>
