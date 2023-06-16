<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT id,ename,email,dob,hiredate,gender,job,salary,address FROM employee where dnum=1 ORDER BY salary desc";
$result = mysqli_query($conn , $sql);

$i = 1;
?>

<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
  align-items:centre;
}
table {
  border-spacing: 10px;
}
</style>

<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>Production(MINES) Employee Data</h4></div>
    <table style="width:100%" class="table table-responsive-lg table-bordered table-hover text-center ">
    <tr class="bg-dark">
        <th>Serial.No.</th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date of Birth</th>
        <th>Date of Joining</th>
        <th>Gender</th>
        <th>Designation</th>
        <th>Salary</th>
        <th>Address</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $month= $rows["id"];
            $exp= $rows["ename"];
            $rev= $rows["email"];
            $birth= $rows["dob"];
            $hire= $rows["hiredate"];
            $sex= $rows["gender"];
            $jobs= $rows["job"];
            $sal= $rows["salary"];
            $addr= $rows["address"];
            ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $month; ?></td>
        <td><?php echo $exp; ?></td>
        <td><?php echo $rev; ?></td>
        <td><?php echo $birth; ?></td>
        <td><?php echo $hire; ?></td>
        <td><?php echo $sex; ?></td>
        <td><?php echo $jobs; ?></td>
        <td><?php echo $sal; ?></td>
        <td><?php echo $addr; ?></td>
    <?php 
            $i++;
            }
        }else{
        echo "no financeemp found";
        }
    ?>
     </tr>
    </table>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>