<?php 
    session_start();
    if( empty($_SESSION["email_emp"]) ){
        header("Location: ./login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> MineIt</title>
    
    <link href="../resorce/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>

</head>

<body>
     
    <!-- Main wrapper start-->
    <div id="main-wrapper">

        <!-- Nav header start-->
        <div class="nav-header">

             <div class="brand-logo">
                <a >
                    <span class="brand-title"><strong style="color:black; font-size:30px;">MineIt</strong></span>
                </a>
            </div> 
        </div>
        <!--Nav header end-->

        <!--Header start-->
        <div class="header">    
            <div class="header-content">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
               <div class="text-center">
                <h2 class="pt-3">Employee Dashboard </h2>
                 </div>
                
            </div>
        </div>
        <!--Header end -->

        <!-- Sidebar start-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                   <br> <br>       
                    <li>
                        <a href="./dashboard.php"  >
                            <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="./leave-status.php" >
                            <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Leave Status</span>
                        </a>
                    </li>

                    <li>
                        <a href="./apply-leave.php" >
                            <i class="fa fa-paper-plane menu-icon"></i><span class="nav-text">Apply for Leave</span>
                        </a>
                    </li>

                    <li>
                        <a href="./profile.php"  >
                         
                            <i class="fa fa-user menu-icon"></i><span class="nav-text">Profile</span>
                        </a>
                    </li> 

                    <li>
                        <a href="./logout.php" >
                            <i class="icon-logout menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>               
                </ul>
            </div>
        </div>
        <!--Sidebar end-->

        <!--Content body start-->
        <div class="content-body">

        <div class="modal fade" id="showModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="modalHead" class="modal-header">
                    <button id="modal_cross_btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span  aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p id="addMsg" class="text-center font-weight-bold"></p>
                </div>
                <div class="modal-footer ">
                    <div class="mx-auto">
                        <a type="button" id="linkBtn" href="#" class="btn btn-primary" >Add Expense For the Day</a>
                        <a type="button" id="closeBtn" href="#" data-dismiss="modal" class="btn btn-primary">Close</a>
                    </div>
                </div>
            </div>
        </div> 
    </div>

            