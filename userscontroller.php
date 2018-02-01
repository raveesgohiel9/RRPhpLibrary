<?php
			ob_start();
			session_start();
			$user_code=$_SESSION['user_code'];
			$user_type=$_SESSION['user_type'];
			$customer_client_code = $_SESSION['user_customer_code'];
			$customer_id = $_SESSION['customer_id'];
			$customer_company_name = $_SESSION['customer_company_name'];
			$user_id = $_SESSION['user_id'];
			$user_role = $_SESSION['user_role'];
			$user_fname = $_SESSION['user_fname'];
			$user_email_id = $_SESSION['user_email_id'];
			$module = "Users";
			if(!isset($user_code))
			{
				header("Location: ../login.php");
			}

/*
 * Metronic Template file
 * Calling the topbar from template
*/
if(!isset($_POST['userSubmitted']))
{
	require_once("../templates/ams/views/header.php");
	require_once("../templates/ams/views/topbar.php");
}
?>
<!-- Start of container and row fluid -->
<div class="container-fluid-full">
	<div class="row-fluid">
	<?php
	/*
	 * Place the sidebar menu here
	 */
require_once("../templates/ams/views/menu.php");
?>
<!-- start: Content -->
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.php">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
	<li><a href="userscontroller.php">Users</a></li>
</ul>

<?php
/*
 * 3 Types of actions in the user
 * 1.View
 * 2.Edit
 * 3.Add
 */
 
 if(isset($_REQUEST['action']))
 {
	 $action = $_REQUEST['action'];
	 
 }
 else
 {
	 $action = 'View';
 }
 
 //echo "Action-".$action;
 if(strcmp($action,'View')==0)
 {
	require_once("../views/usersview.php");
 }
 else if(strcmp($action,'Edit')==0)
 {
	 $id = $_REQUEST['id'];
	 
	 require_once("../views/usersedit.php");
 }
 else if(strcmp($action,'Add')==0)
 {
	 require_once("../views/usersadd.php");
 }
 else if(strcmp($action,'Customer_Add')==0)
 {
	 require_once("../views/customerusersadd.php");
 }
 else if(strcmp($action,'Customer_Edit')==0)
 {
	  $id = $_REQUEST['id'];
	 require_once("../views/customerusersedit.php");
 }
 else if(strcmp($action,'Customer_user')==0)
 {
	 
	 require_once("../views/customerusersview.php");
 }


?>
</div>
</div>
</div>
<!-- End of container and row fluid-->
<?php

/* 
* Place Footer Content Here
*/
require_once("../templates/ams/views/footer.php");
?>