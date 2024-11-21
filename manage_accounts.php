
<div class="person">
                <?php if ( 'view_census_report' == $id ) {
                    $sessionId=$_SESSION['id'];
                    $sessionRole=$_SESSION['role'];
                    if($sessionRole=='supervisor')
                    {?>
                        <form action="" method="POST">
                        <button name ="approve" style="margin-left:70%;margin-top:2%"class="btn btn-primary" type="submit" >Approve</button>
                        </form>
                        
                    <?php } ?>
                    
                    <div class="allPerson">
                    <div class="main__table">
                        <table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                    
                                        
                                        <th scope="col">Roll No</th>
                                        <th scope="col">Person ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">F.Name</th>
                                        <th scope="col">G.Name</th>
                                        <th scope="col">Sex</th>
                                        <th scope="col">Date of birth</th>
                                        
                                        <th scope="col">House NO</th>
                                        <th scope="col">Religion</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Education</th>
                                        <th scope="col">Job</th>
                                        
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                       
                                        $sessionRole=='supervisor'?$getPerson = "SELECT *,person.fname as pfname FROM person inner join house on house.house_id=person.house_id inner join enumerators on enumerators.enumerator_id = person.enum_id where enumerators.supervisor_id='$sessionId'":$getPerson = "SELECT *,  person.fname as pfname FROM person inner join house on house.house_id=person.house_id";
                                            // echo $getPerson;
                                        $result = mysqli_query( $connection, $getPerson );
                                        $i=1;
                                        while ( $person = mysqli_fetch_assoc( $result ) ) {?>

                                        <tr>
                                            
                                            
                                            <td><?php printf( "%s", $i );?></td>

                                            <td><?php printf( "%s", $person['person_id'] );?></td>
                                            <td><?php printf( "%s", $person['name'] );?></td>
                                            <td><?php printf( "%s", $person['pfname'] );?></td>
                                            <td><?php printf( "%s", $person['gfname'] );?></td>
                                            <td><?php printf( "%s", $person['sex'] );?></td>
                                            <td><?php printf( "%s", $person['age'] );?></td>
                                           
                                            <td><?php printf( "%s", $person['house_id'] );?></td>
                                            <td><?php printf( "%s", $person['religion'] );?></td>
                                            <td><?php printf( "%s", $person['email'] );?></td>
                                            <td><?php printf( "%s", $person['phone'] );?></td>
                                            <td><?php printf( "%s", $person['education'] );?></td>
                                            <td><?php printf( "%s", $person['job'] );?></td>
                                              
                                               
                                            
                                            <?php if ( 'admin' == $sessionRole ) {?>
                                                <!-- Only For Admin -->
                                                
                                            <?php }?>
                                        </tr>

                                    <?php
                                $i++;
                                }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                <?php }?>
<div class="person">
                <?php if ( 'view_registered' == $id ) {?>
                    <div class="allPerson">
                    <div class="main__table">
                        <table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                    
                                        <th scope="col">Roll No</th>
                                        <th scope="col">Person ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">F.Name</th>
                                        <th scope="col">G.Name</th>
                                        <th scope="col">Sex</th>
                                        <th scope="col">Date of birth</th>
                                        
                                        <th scope="col">House NO</th>
                                        <th scope="col">Religion</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Education</th>
                                        <th scope="col">Job</th>
                                       
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $e_id=$_SESSION['id'];
                                        $getPerson = "SELECT * FROM person inner join house on house.house_id=person.house_id  where enum_id='$e_id';";
                                        //echo $getPerson;
                                            $result = mysqli_query( $connection, $getPerson );
                                            $i=1;
                                        while ( $person = mysqli_fetch_assoc( $result ) ) {?>

                                        <tr>
                                            
                                            <td><?php printf( "%s", $i );?></td>
                                            <td><?php printf( "%s", $person['person_id'] );?></td>
                                            <td><?php printf( "%s", $person['name'] );?></td>
                                            <td><?php printf( "%s", $person['fname'] );?></td>
                                            <td><?php printf( "%s", $person['gfname'] );?></td>
                                            <td><?php printf( "%s", $person['sex'] );?></td>
                                            <td><?php printf( "%s", $person['age'] );?></td>
                                           
                                            <td><?php printf( "%s", $person['house_id'] );?></td>
                                            <td><?php printf( "%s", $person['religion'] );?></td>
                                            <td><?php printf( "%s", $person['email'] );?></td>
                                            <td><?php printf( "%s", $person['phone'] );?></td>
                                            <td><?php printf( "%s", $person['education'] );?></td>
                                            <td><?php printf( "%s", $person['job'] );?></td>
                                           
                                            
                                            <?php } ?>
                                            
                                        </tr>

                                    <?php 
                                $i++;
                                }?>

                                </tbody>
                            </table>


                        </div>
                    </div>

                <div class="supervisor">
                <?php if ( 'manage_supervisor' == $id ) {?>
                <a class = "newButton" href= "cms.php?id=register_supervisor">
                <i class= "fa fa plus"> New supervisor</i>
                </a>  
                    <div class="allSupervisor">
                        <div class="main__table">
                        <table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Avater</th>
                                        <th scope="col">Supervisor ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Subcity allocated</th>
                                        <?php if ( 'admin' == $sessionRole ) {?>
                                            <!-- Only For Admin -->
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                            <th scope="col">Status</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $getSupervisor = "SELECT * FROM supervisors";
                                            $result = mysqli_query( $connection, $getSupervisor );

                                        while ( $supervisor = mysqli_fetch_assoc( $result ) ) {
                                            $stat=$supervisor['status'];
                                            $bool=$stat?'class="fas fa-check-circle" ':'class="fas fa-minus-circle"';
                                            ?>

                                        <tr>
                                            <td>
                                                <center><img class="rounded-circle" width="40" height="40" src="assets/img/avatar.png" alt=""></center>
                                            </td>
                                            <td><?php printf( "%s", $supervisor['supervisor_id'] );?></td>
                                            <td><?php printf( "%s %s", $supervisor['fname'], $supervisor['lname'] );?></td>
                                            <td><?php printf( "%s", $supervisor['email'] );?></td>
                                            <td><?php printf( "%s", $supervisor['phone'] );?></td>
                                            <td><?php printf( "%s", $supervisor['address'] );?></td>
                                            <td><?php printf( "%s", $supervisor['subcity'] );?></td>
                                            <?php if (  'supervisor' == $sessionRole||'admin' == $sessionRole) {?>
                                                <!-- Only For Admin -->
                                                <td><?php printf( "<a href='cms.php?action=editSupervisor&supervisor_id=%s'><i class='fas fa-edit'></i></a>", $supervisor['supervisor_id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='cms.php?action=deleteSupervisor&supervisor_id=%s'><i class='fas fa-trash'></i></a>", $supervisor['supervisor_id'] )?></td>
                                                <td><?php printf( "<a class='onoff' href='cms.php?action=onoffSupervisor&supervisor_id=%s'><i $bool'></i></a>", $supervisor['supervisor_id'] )?></td>
                                            <?php }?>
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                <?php }?>
                <?php if ( 'register_supervisor' == $id ) {?>
                    <div class="addSupervisor">
                        <div class="main__form">
                            <div class="main__form--title text-center">Add New Supervisor</div>
                            <form onSubmit="return validateform()"   action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="supervisor_id" placeholder="Supervisor ID" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="address" name="address" placeholder="Address" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="subcity" name="subcity" placeholder="Subcity" required>

                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="Phone" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-key"></i>
                                            <input id="pwdinput" type="password" name="password" placeholder="Password" required>
                                            <i id="pwd" class="fas fa-eye right"></i>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="addSupervisor">
                                    <div class="col col-12">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                <?php }?>

                <?php if ( 'editSupervisor' == $action ) {
                        $supervisorId = $_REQUEST['supervisor_id'];
                        $selectSupervisors = "SELECT * FROM supervisors WHERE supervisor_id='{$supervisorId}'";
                        $result = mysqli_query( $connection, $selectSupervisors );

                    $supervisor = mysqli_fetch_assoc( $result );?>
                    <div class="addSupervisor">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update Supervisor</div>
                            <form action="add.php" method="POST" onSubmit="return validateform()">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" value="<?php echo $supervisor['fname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $supervisor['lname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $supervisor['email']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="Phone" value="<?php echo $supervisor['phone']; ?>" required>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="editSupervisor">
                                    <input type="hidden" name="supervisor_id" value="<?php echo $supervisorId; ?>">
                                    <div class="col col-12">
                                        <input type="submit" name="submit" value="Update">
                                    </div>
                                    <div class="col col-12">
                                        <input type="submit" name="resset" value="Resset password">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }?>

                <?php if ( 'deleteSupervisor' == $action ) {
                        $supervisorId = $_REQUEST['supervisor_id'];
                        $deleteSupervisor = "DELETE FROM supervisors WHERE supervisor_id ='{$supervisorId}'";
                        $result = mysqli_query( $connection, $deleteSupervisor );
                        header( "location:cms.php?id=manage_supervisor" );
                }?>
                <?php if ( 'onoffSupervisor' == $action ) {
                        $supervisorID = $_REQUEST['supervisor_id'];
                        
                        $deleteSupervisor = "select status FROM supervisors WHERE supervisor_id ='{$supervisorID}'";
                        $result = mysqli_query( $connection, $deleteSupervisor );
                        $supervisor = mysqli_fetch_assoc( $result );
                        $stat=$supervisor['status'];
                        $bool=$stat?0:1;
                            $query = "UPDATE supervisors SET status={$bool} WHERE supervisor_id='$supervisorID'";
                            mysqli_query( $connection, $query );                          
                        
                        header( "location:cms.php?id=manage_supervisor" );
                }?>
            </div>
            <!-- ---------------------- Supervisor ------------------------ -->

            <!-- ---------------------- Supervisor ------------------------ -->
            <div class="supervisor">
                <?php if ( 'manage_enumerator' == $id ) {?>
                <?php if ( 'supervisor' == $sessionRole ){ ?>
                    <a class = "newButton" href= "cms.php?id=register_enumerator">
                
                <i class= "fas fa-user-plus"> New Enumerator</i>
                <?php } ?>
                </a>  
                    <div class="allEnumerator">
                        <div class="main__table">
                        <table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Avater</th>
                                        <th scope="col">Enumerator ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <?php if ( 'supervisor' == $sessionRole ) {?>
                                            <!-- Only For Admin -->
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                            <th scope="col">Status</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        
                                        $_SESSION['role']=="supervisor"?$getEnumerator = "SELECT * FROM enumerators where supervisor_id='$sessionId'":$getEnumerator = "SELECT * FROM enumerators";
                                            $result = mysqli_query( $connection, $getEnumerator );

                                        while ( $enumerator = mysqli_fetch_assoc( $result ) ) {
                                            $stat=$enumerator['status'];
                                            $bool=$stat?'class="fas fa-check-circle" ':'class="fas fa-minus-circle"';
                                            ?>

                                        <tr>
                                            <td>
                                                <center><img class="rounded-circle" width="40" height="40" src="assets/img/avatar.png" alt=""></center>
                                            </td>
                                            <td><?php printf( "%s", $enumerator['enumerator_id'] );?></td>
                                            <td><?php printf( "%s %s", $enumerator['fname'], $enumerator['lname'] );?></td>
                                            <td><?php printf( "%s", $enumerator['email'] );?></td>
                                            <td><?php printf( "%s", $enumerator['phone'] );?></td>
                                            <td><?php printf( "%s", $enumerator['address'] );?></td>
                                            <?php if ( 'supervisor' == $sessionRole) {?>
                                                <!-- Only For Admn -->
                                                <td><?php printf( "<a href='cms.php?action=editEnumerator&enumerator_id=%s'><i class='fas fa-edit'></i></a>", $enumerator['enumerator_id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='cms.php?action=deleteEnumerator&enumerator_id=%s'><i class='fas fa-trash'></i></a>", $enumerator['enumerator_id'] )?></td>
                                                <td><?php printf( "<a class='onoff' href='cms.php?action=onoffEnumerator&enumerator_id=%s'><i $bool'></i></a>", $enumerator['enumerator_id'] )?></td>
                                            <?php }?>
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                <?php }?>
                                      
                <?php if ( 'register_enumerator' == $id ) {?>
                    <div class="addEnumerator">
                        <div class="main__form">
                            <div class="main__form--title text-center">Add New Enumerator</div>
                            <form onSubmit="return validateform()"   action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="enumerator_id" placeholder="Enumerator ID" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="address" name="address" placeholder="Address" required>
                                        </label>
                                    </div>
                                   
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="Phone" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-key"></i>
                                            <input id="pwdinput" type="password" name="password" placeholder="Password" required>
                                            <i id="pwd" class="fas fa-eye right"></i>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="addEnumerator">
                                    <div class="col col-12">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                <?php }?>
                <?php if ( 'editEnumerator' == $action ) {
                        $enumeratorId = $_REQUEST['enumerator_id'];
                        $selectEnumerators = "SELECT * FROM enumerators WHERE enumerator_id='{$enumeratorId}'";
                        $result = mysqli_query( $connection, $selectEnumerators );

                    $enumerator = mysqli_fetch_assoc( $result );?>
                    <div class="addEnumerator">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update Enumerator</div>
                            <form action="add.php" method="POST" onSubmit="return validateform()">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" value="<?php echo $enumerator['fname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $enumerator['lname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $enumerator['email']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="Phone" value="<?php echo $enumerator['phone']; ?>" required>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="editEnumerator">
                                    <input type="hidden" name="enumerator_id" value="<?php echo $enumeratorId; ?>">
                                    <div class="col col-12">
                                        <input type="submit" name="submit" value="Update">
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }?>
                <?php if ( 'editPerson' == $action ) {
                        $personID = $_REQUEST['person_id'];
                        $selectPerson = "SELECT * FROM person WHERE person_id='{$personID}'";
                        $result = mysqli_query( $connection, $selectPerson );

                    $person = mysqli_fetch_assoc( $result );?>
                    <div class="container2">
    <div class="title">Edit form</div>
    <div class="content">
      <form onSubmit="return validate()"   enctype="multipart/form-data" action="add.php?action=editPerson" method="POST">
        <div class="user-details">
        
									<div id = "picture">
										<img  height = "200px" width = "200px" id="pic" src="./assets/img/avatar.png" />
                                        
									
                                </div>
								<input type="hidden" name="person_id" value="<?php echo $personID; ?>">	
									
        <div class="input-box">
            <span class="details">Name</span>
            <input type="text" name="name" value="<?php echo $person['name']; ?>" placeholder="" required>
          
            <span class="details">Father Name</span>
            <input type="text" value="<?php echo $person['fname']; ?>"name="fname" placeholder="" required>
            
            <span class="details">Grand father Name</span>
            <input type="text" name="gname" value="<?php echo $person['gfname']; ?>" placeholder="" required>
            <div class="gender-details">
                   <span class="gender-title">Gender</span> 
                   <select name="gender" placeholder="" required>
                    
                   <option value="m">Male</option>
                    <option value="f">Female</option>
                    
                </select>
                    
                    
                    <br />
                    
                    </div>
          </div>
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <div class="input-box">
          <span class="details" >Marriage Status</span>
            <select name="married" placeholder="" required>
                    <option value=single>Single</option>
                    <option value=married>Married</option>
                    <option value=divorced>Divorced</option>
                </select>
            <span class="details" >Disability</span>
            <select name="disability" placeholder="" required>
                    <option value=yes>Yes</option>
                    <option value=no>No</option>
                   
                </select>
            
            
            <span class="details">House number</span>
            <div>
            <select style="float:left;" name="house_no" placeholder="" required>
                    <?php 
                    $sql="select house_id from house";
                    $query=mysqli_query($connection,$sql);
                    while($row=mysqli_fetch_assoc($query))
                    {

                     $house_no=$row['house_id'];   
                     
                     echo "<option value=$house_no>$house_no</option>";


                    }                
                    
                    ?>
                    
                  
                </select>
                <a class="newButton" style="display:inline-block;float:right;" href="cms.php?id=fill_house_form">+ New House</a></div>
                <div></br></br></br></br></div>
            <span class="details">Phone</span>
            <input type="text" name="phone" value="<?php echo $person['phone']; ?>"  placeholder="" required>
            <span class="details">Email</span>
            <input type="text" name="email" value="<?php echo $person['email']; ?>"  placeholder="" required>
          </div>
          
          <div class="input-box">
          <span class="details">Date of birth</span>
            <input type="date" name="age" value="<?php echo $person['age']; ?>"  placeholder="" required>
          <span class="details">Birth place</span>
            <input type="text" name="birth_place"  value="<?php echo $person['birth_place']; ?>"  placeholder="" required>
            <span class="details" >Job status</span>
            <select name="job" placeholder="" required>
                    <option value=unemployed>unemployed</option>
                    <option value=governmental>governmental</option>
                    <option value=non-governmental>non-governmental</option>
                </select>
            <span class="details" >Education Level</span>
            <select name="education" placeholder="" required>
                    <option value=illiterate>Illiterate</option>
                    <option value=certificate>Certificate</option>
                    <option value=school>School</option>

                    <option value=degree>Degree</option>
                    <option value=masters>Masters</option>
                    <option value=phd>PHD</option>
                </select>
            
            <span class="details" >Religion</span>
            <select name="religion" placeholder="" required>
                    <option value=hindu>Hindu</option>
                    <option value=christian>Christian</option>
                    <option value=muslim>Muslim</option>
                    <option value=other>Others</option>
                    
                </select>
          
            
          </div>
          
          
        </div>
        
        <div class="button">
          <input type="submit" name="register" value="REGISTER">
        </div>
      </form>
    </div>
  </div>
                <?php }?>

                <?php if ( 'deletePerson' == $action ) {
                        $personID = $_REQUEST['person_id'];
                        $deletePerson = "DELETE FROM person WHERE person_id ='{$personID}'";
                        $result = mysqli_query( $connection, $deletePerson );
                        header( "location:cms.php?id=view_registered" );
                }?>
                <?php if ( 'deleteEnumerator' == $action ) {
                        $enumeratorID = $_REQUEST['enumerator_id'];
                        $deleteEnumerator = "DELETE FROM enumerators WHERE enumerator_id ='{$enumeratorID}'";
                        $result = mysqli_query( $connection, $deleteEnumerator );
                        header( "location:cms.php?id=manage_enumerator" );
                }?>
                <?php if ( 'onoffEnumerator' == $action ) {
                        $enumeratorID = $_REQUEST['enumerator_id'];
                        
                        $deleteEnumerator = "select status FROM enumerators WHERE enumerator_id ='{$enumeratorID}'";
                        $result = mysqli_query( $connection, $deleteEnumerator );
                        $enumerator = mysqli_fetch_assoc( $result );
                        $stat=$enumerator['status'];
                        $bool=$stat?0:1;
                            $query = "UPDATE enumerators SET status={$bool} WHERE enumerator_id='$enumeratorID'";
                            mysqli_query( $connection, $query );                          
                        
                        header( "location:cms.php?id=manage_enumerator" );
                }?>
            </div>
            <div class="supervisor">
                <?php if ( 'manage_guest' == $id ) {?>
                <!-- <a href= "cms.php?id=register_guest">
                <i class= "fas fa plus"> New guest</i>
                </a>   -->
                    <div class="allGuest">
                        <div class="main__table">
                        <table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Avater</th>
                                        <th scope="col">Guest ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <?php if ( 'admin' == $sessionRole ) {?>
                                            <!-- Only For Admin -->
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                            <th scope="col">Status</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $getGuest = "SELECT * FROM guests";
                                            $result = mysqli_query( $connection, $getGuest );

                                        while ( $guest = mysqli_fetch_assoc( $result ) ) {
                                            $stat=$guest['status'];
                                            $bool=$stat?'class="fas fa-check-circle" ':'class="fas fa-minus-circle"';
                                            ?>
                                        
                                        <tr <?php echo  $guest['isnew']? "style=\"font-weight:bold\"":""; ?>>
                                            <td>
                                                <center><img class="rounded-circle" width="40" height="40" src="assets/img/avatar.png" alt=""></center>
                                            </td>
                                            <td><?php printf( "%s", $guest['guest_id'] );?></td>
                                            <td><?php printf( "%s %s", $guest['fname'], $guest['lname'] );?></td>
                                            <td><?php printf( "%s", $guest['email'] );?></td>
                                            <td><?php printf( "%s", $guest['phone'] );?></td>
                                            
                                            <?php if (  'admin' == $sessionRole) {?>
                                                <!-- Only For Admin -->
                                                <td><?php printf( "<a href='cms.php?action=editGuest&guest_id=%s'><i class='fas fa-edit'></i></a>", $guest['guest_id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='cms.php?action=deleteGuest&guest_id=%s'><i class='fas fa-trash'></i></a>", $guest['guest_id'] )?></td>
                                                <td><?php printf( "<a class='onoff' href='cms.php?action=onoffGuest&guest_id=%s'><i $bool'></i></a>", $guest['guest_id'] )?></td>
                                            <?php }?>
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                <?php 
                include_once "config.php";
                $connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
                $query = "UPDATE guests SET isnew=0";
                
                mysqli_query( $connection, $query )or die (mysqli_error($connection));
            }?>
                

                <?php if ( 'editGuest' == $action ) {
                        $guestId = $_REQUEST['guest_id'];
                        $selectGuests = "SELECT * FROM guests WHERE guest_id='{$guestId}'";
                        $result = mysqli_query( $connection, $selectGuests );

                    $guest = mysqli_fetch_assoc( $result );?>
                    <div class="addGuest">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update Guest</div>
                            <form onSubmit="return validateform()"   action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" value="<?php echo $guest['fname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $guest['lname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $guest['email']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="number" name="phone" placeholder="Phone" value="<?php echo $guest['phone']; ?>" required>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="editGuest">
                                    <input type="hidden" name="guest_id" value="<?php echo $guestId; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php 
                
            }?>

                <?php if ( 'deleteGuest' == $action ) {
                        $guestId = $_REQUEST['guest_id'];
                        $deleteGuest = "DELETE FROM guests WHERE guest_id ='{$guestId}'";
                        $result = mysqli_query( $connection, $deleteGuest );
                        header( "location:cms.php?id=manage_guest" );
                }?>
                <?php if ( 'onoffGuest' == $action ) {
                        $guestID = $_REQUEST['guest_id'];
                        
                        $deleteGuest = "select status FROM guests WHERE guest_id ='{$guestID}'";
                        $result = mysqli_query( $connection, $deleteGuest );
                        $guest = mysqli_fetch_assoc( $result );
                        $stat=$guest['status'];
                        $bool=$stat?0:1;
                            $query = "UPDATE guests SET status={$bool} WHERE guest_id='$guestID'";
                            mysqli_query( $connection, $query );                          
                        
                        header( "location:cms.php?id=manage_guest" );
                }?>
            </div>
            <?php
            if(isset($_POST['approve'])){
                $sql="update person inner join enumerators on enumerators.enumerator_id = person.enum_id set person.isapproved = b'1' where enumerators.supervisor_id='$sessionId';";
                //echo $sql;
                mysqli_query( $connection, $sql ) or die(mysqli_error($connection));
                echo "<script type=\"text/javascript\">
                alert(\"Approved Succesfully\"); 
                window.location = \"cms.php?id=view_census_report\";
                </script>";
            }

            ?>