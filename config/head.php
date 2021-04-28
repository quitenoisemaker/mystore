<!DOCTYPE html>
<html lang="en">
<?php 
require "db.php"; 
if(isset($_SESSION['student_log'])){
    $uid=$_SESSION['student_log'];
    $ck_user=mysqli_query($tutor, "SELECT * FROM users WHERE uid='$uid' AND utype='2' ");
    $row_uid=mysqli_fetch_array($ck_user);
}else{
    echo("<script>location.href = 'login';</script>");
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets\vendors\core\core.css">
    <link rel="stylesheet" href="assets\vendors\bootstrap-datepicker\bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets\fonts\feather-font\css\iconfont.css">
    <link rel="stylesheet" href="assets\vendors\flag-icon-css\css\flag-icon.min.css">
    <link rel="stylesheet" href="assets\vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="assets\css\style.css">
    <link rel="shortcut icon" href="assets\images\eoc2.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <?php echo $extra_links; ?>
    <title><?php echo $page_title; ?> | <?php echo $setup['sitename']; ?></title>
    
    <style>
    #authors img{
      margin-top: -50px;

    }
    #authors .fa{
      font-size: 25px;
      color: #3292a6;
    }
     
    #authors .card:hover{
      background: #3292a6;
      color: #fff;
    }

</style>
</head>

<body>
    <div class="main-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="./" class="sidebar-brand">
                    <img src="https://eoc.mentapps.com/online/tutor/img3/eoc3.png" class="w-80">
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a href="./" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Streams</li>
                    <li class="nav-item">
                        <a href="live" class="nav-link">
                            <i class="link-icon" data-feather="airplay"></i>
                            <span class="link-title">Live Meeting</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="my-courses" class="nav-link">
                            <i class="link-icon" data-feather="book-open"></i>
                            <span class="link-title">My Courses</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#student_chats" role="button" aria-expanded="false" aria-controls="advancedUI">
                            <i class="link-icon" data-feather="inbox"></i>
                            <span class="link-title">Chat Participant
                            <?php
                                $sql = "SELECT * FROM support_ticket_student where receiver_id ='$uid'";
                            $result = $tutor->query($sql);
                        if($result->num_rows>0){
                          while($row=$result->fetch_assoc()){
                            $status=$row["status"];

                            if($status==0) {
                                
                                echo "<span class='badge badge-info text-white'>new</span></span>";
                            }
                            
                             }
                            }
                            
                            ?>
                            </span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="student_chats">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="student_chat" class="nav-link">Chats</a>
                                </li>
                                <li class="nav-item">
                                    <a href="student_chat_start" class="nav-link">Start Chat</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Participant Document</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#doc_uploads" role="button" aria-expanded="false" aria-controls="advancedUI">
                            <i class="link-icon" data-feather="file"></i>
                            <span class="link-title">Document Uploads</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="doc_uploads">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="document-new" class="nav-link">New Document</a>
                                </li>
                                <li class="nav-item">
                                    <a href="document-list" class="nav-link">Document List</a>
                                </li>
                            </ul>
                        </div>
                        <li class="nav-item">
                        <a href="list_participant?" class="nav-link">
                            <i class="link-icon" data-feather="users"></i>
                            <span class="link-title">Course Participant</span>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item nav-category">Tutors</li>
                    <li class="nav-item">
                        <a href="tutor-docs" class="nav-link">
                            <i class="link-icon" data-feather="users"></i>
                            <span class="link-title">Tutor Documents</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="previous-streams" class="nav-link">
                            <i class="link-icon" data-feather="arrow-left-circle"></i>
                            <span class="link-title">Video Uploads</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#chats" role="button" aria-expanded="false" aria-controls="advancedUI">
                            <i class="link-icon" data-feather="inbox"></i>
                            <span class="link-title">Message Tutor <?php
                                $sql = "SELECT * FROM support_ticket where receiver_id ='$uid'";
                            $result = $tutor->query($sql);
                        if($result->num_rows>0){
                          while($row=$result->fetch_assoc()){
                            $status=$row["status"];

                            if($status==0) {
                                
                                echo " <span class='badge badge-info text-white'>new</span></span>";
                            }
                            
                             }
                            }
                            
                            ?>  </span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="chats">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="tutor_chat" class="nav-link">Chats</a>
                                </li>
                                <li class="nav-item">
                                    <a href="tutor_chat_start" class="nav-link">Start Chat</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- partial -->
        <div class="page-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown nav-profile">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="thumb-pic" src="uploads/account/<?php echo $row_uid['img']; ?>" alt="profile">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="figure mb-3">
                                        <img class="thumb-pic" src="uploads/account/<?php echo $row_uid['img']; ?>" alt="profile">
                                    </div>
                                    <div class="info text-center">
                                        <p class="name font-weight-bold mb-0"><?php echo $row_uid['fname'].' '.$row_uid['lname']; ?></p>
                                        <p class="email text-muted mb-3"><?php echo $row_uid['em']; ?></p>
                                    </div>
                                </div>
                                <div class="dropdown-body">
                                    <ul class="profile-nav p-0 pt-3">
                                        <li class="nav-item">
                                            <a href="setting" class="nav-link">
                                                <i data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="logout" class="nav-link">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>