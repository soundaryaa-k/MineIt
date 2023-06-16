<?php 
require_once "include/header.php";
?>
<?php

        // database connection
        require_once "../connection.php";

        //applied leaves
        $total_accepted = $total_pending = $total_canceled = $total_applied = 0;
        $leave = "SELECT * FROM emp_leave WHERE email = '$_SESSION[email_emp]' ";
        $result = mysqli_query($conn , $leave);

        if(mysqli_num_rows($result) > 0 ){

            $total_applied = mysqli_num_rows($result);

            while( $leave_info = mysqli_fetch_assoc($result) ){
                $status = $leave_info["status"];

                if( $status == "pending" ){
                    $total_pending += 1;
                }elseif( $status == "Accepted" ){
                    $total_accepted += 1;
                }elseif( $status = "Canceled"){
                    $total_canceled += 1;
                }
            }
        }else{
            $total_accepted = $total_pending = $total_canceled = $total_applied = 0;
        }



        // leave status
        $currentDay = date( 'Y-m-d', strtotime("today") );

        $last_leave_status = "No leave applied";
        $upcoming_leave_status = "";

        // for last leave status
        $check_leave = "SELECT * FROM emp_leave WHERE email = '$_SESSION[email_emp]' ";
        $s = mysqli_query($conn , $check_leave);
        if( mysqli_num_rows($s) > 0 ){
            while( $info = mysqli_fetch_assoc($s) ){
               $last_leave_status =  $info["status"] ;
            }
    }


    // for next leave date
    $check_ = "SELECT * FROM emp_leave WHERE email = '$_SESSION[email_emp]' ORDER BY start_date ASC ";
    $e = mysqli_query($conn , $check_); 
    if( mysqli_num_rows($e) > 0 ){
        while( $info = mysqli_fetch_assoc($e) ){
            $date = $info["start_date"] ;
            $last_leave =  $info["status"] ;
           if ( $date > $currentDay && $last_leave == "Accepted" ){
               $upcoming_leave_status = date('jS F', strtotime($date) ) ;
               break;
           }
        }
}
        //department
        $session_email =  $_SESSION["email_emp"];
        $sql2 = "SELECT ename,dname FROM employee E,department D WHERE  E.dnum = D.dnum AND email= '$session_email' ";
        $result2 = mysqli_query($conn , $sql2);
        $rows = mysqli_fetch_assoc($result2);
        $dnum = $rows["dname"];

        //JOB
        $session_email =  $_SESSION["email_emp"];
        $sql1 = "SELECT * FROM employee WHERE email= '$session_email' ";
        $result1 = mysqli_query($conn , $sql1);
        $rows = mysqli_fetch_assoc($result1);
        $jobs = $rows["job"];

        //Employee details
        $session_email =  $_SESSION["email_emp"];
        $sql = "SELECT * FROM employee WHERE email= '$session_email' ";
        $result = mysqli_query($conn , $sql);


?>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-4">
            <div class="container-fluid card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"> <b>Designation</b> </li>
                    <li class="list-group-item text-center"> <?php echo  $jobs ; ?>  </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="container-fluid card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"> <b>Applied leaves</b> </li>
                    <li class="list-group-item">Total Accepted  : <?php echo $total_accepted;  ?> </li>
                    <li class="list-group-item">Total Cancelled  : <?php echo $total_canceled; ?> </li>
                    <li class="list-group-item">Total Pending  : <?php echo $total_pending; ?> </li>
                    <li class="list-group-item">Total Applied  : <?php echo $total_applied; ?> </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="container-fluid card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"> <b>Department Name</b>  </li>
                    <li class="list-group-item text-center"><?php echo ($dnum); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="container row bg-white shadow "> 
    <div class="col ms-auto">
            <div class=" text-center my-4 "> <h4>Details of the Employee</h4> </div>
            <table class="table table-responsive-lg table-bordered table-hover">
        <thead>
            <tr class="bg-dark">
            <th>Employee's Id</t>
            <th>Employee's Name</t>
            <th>Employee's Email</t>
            <th>Gender</t>
            <th>Date of birth</t>
            <th>Hire Date</t>
            <th>Designation</t>
            <th>Salary</t>
            <th>Address</th>
            </tr>
        </thead>
        <tbody>
        <?php  
        if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $name= $rows["ename"];
            $email= $rows["email"];
            $dob = $rows["dob"];
            $gender = $rows["gender"];
            $id = $rows["id"];
            $salary = $rows["salary"];
            $jobs = $rows["job"];
            $address = $rows["address"];
            $hire = $rows["hiredate"];
            ?>
        <tr>
        <td><?php echo $id; ?></td>
        <td> <?php echo $name ; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $gender; ?></td>
        <td><?php echo $dob; ?></td>
        <td><?php echo $hire; ?></td>
        <td><?php echo $jobs; ?></td>
        <td><?php echo $salary; ?></td>
        <td><?php echo $address;?></td>

          <?php  
                } 
            }
        ?>
        </tbody>
        </table>
    </div>
    </div>
    </div>
</div>

<?php 
require_once "include/footer.php";
?>