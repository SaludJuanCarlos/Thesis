    <?php chdir("..");
	require_once 'controllers/authController.php';
	
	//verify usertoken
	if (isset($_GET['token'])){
		$token = $_GET['token'];
		verifyUser($token);
	}

	if (!isset($_SESSION['id'])) {
		header('location: ../login.php');
		exit();
	}

	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<link rel="stylesheet" href="../styles.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	
	<script>
		$(document).ready(function(){
			$(".siderbar_menu li").click(function(){
			  $(".siderbar_menu li").removeClass("active");
			  $(this).addClass("active");
			});

			$(".hamburger").click(function(){
			  $(".wrapper").addClass("active");
			});

			$(".close, .bg_shadow").click(function(){
			  $(".wrapper").removeClass("active");
			});
		});
	</script>
</head>
<body class="body body1" id="body">

<div class="wrapper">
  <div class="sidebar">
    <div class="bg_shadow"></div>
    <div class="sidebar_inner">
        <div class="close">
          <i class="fas fa-times"></i>
        </div>
        
        <div class="profile_info">
            <div class="profile_img">
             <a href="#Dashboard" id="dashboard1"><img class="img1" src="../img/logo.png" width=40px height=100%></a>
            </div>
            <div class="profile_data">
                <p class="name">Manage</p>
            </div>
        </div>
      
        <ul class="siderbar_menu">
			<li class="active" id="btn"><a href="#Dashboard" id="dashboard">
              <div class="icon"><i class="fas fa-clipboard"></i></div>
              <div class="title">Dashboard</div>
              </a> 
			</li>  
          <li><a href="#">
              <div class="icon"><i class="fas fa-user"></i></div>
              <div class="title">Consumer</div>
              <div class="arrow"><i class="fas fa-chevron-down"></i></div>
              </a>
            <ul class="accordion">
			
                 <li><a href="#Add" class="active" id="adduser">Add</a></li>
                 <li><a href="#Manage" id="updateuser">Manage</a></li>
                 <li><a href="#Delete" id="deleteuser"></a></li>
              </ul>
          </li>  
          <li><a href="#">
              <div class="icon"><i class="fas fa-receipt"></i></div>
              <div class="title">Manage</div>
              <div class="arrow"><i class="fas fa-chevron-down"></i></div>
              </a>
            <ul class="accordion">
                 <li><a href="#Manage1">Manage1</a></li>
                 <li><a href="#Manage2" class="active">Manage2</a></li>
                 <li><a href="#Manage3">Manage3</a></li>
              </ul>
          </li>  
          <li><a href="#">
              <div class="icon"><i class="fas fa-credit-card"></i></div>
              <div class="title">Permissions</div>
              <div class="arrow"><i class="fas fa-chevron-down"></i></div>
              </a>
              <ul class="accordion">
                 <li><a href="#Permissions1">Permissions1</a></li>
                 <li><a href="#Permissions2" class="active">Permissions2</a></li>
              </ul>
            
          </li>  
        </ul>
       <div class="logout_btn">
            <?php if (isset($_SESSION['email'])): ?>
				<a href="../main.php?logout='1'">Logout</a>
				<?php endif ?> 
        </div>
      
    </div>
  </div>
  <div class="main_container">
    <div class="navbar navbar1">
       <div class="hamburger">
         <i class="fas fa-bars"></i>
       </div>
       <div class="logo">
         <a href="#Dashboard" id="home">Administration</a>
      </div>
    </div>
	
    <div class="content" id="content">
    </div>

	
  </div>
</div>
	<script type="text/javascript" src="../jquery.js"></script>
	<script type="text/javascript" src="../custom.js"></script>
</body>
</html>