<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
<?php
require_once("../RRPhpLibrary/RRPhpLibrary.php");
$pCrud = new PhpCrud();
if(isset($_POST['cancelled']))
{
	$pCrud = null;
	header("Location: userscontroller.php");
}

else if(isset($_POST['userSubmitted']))
{		
	$user_customer_id = 0;
	
		
	
	$user_code = $_REQUEST['user_code'];
	$user_role = $_REQUEST['user_role'];
	$user_fname = $_REQUEST['user_fname'];
	$user_lname = $_REQUEST['user_lname'];
	$pass = $_REQUEST['password'];
	$user_resident_status = $_REQUEST['user_resident_status'];
	$user_nric = $_REQUEST['user_nric'];
	$user_employment_type = $_REQUEST['user_employment_type'];
	$user_type = $_REQUEST['user_type'];
	$user_date_of_joining = $_REQUEST['user_date_of_joining'];
	$user_bank_name = $_REQUEST['user_bank_name'];
	$user_bank_account = $_REQUEST['user_bank_account'];
	$user_home_phone = $_REQUEST['user_home_phone'];
	$user_mobile = $_REQUEST['user_mobile'];
	$user_email_id = $_REQUEST['user_email_id'];
	$user_residential_address = $_REQUEST['user_residential_address'];
	$user_notes = $_REQUEST['user_notes'];
	
	/*
	if(isset($_REQUEST['user_access_privileges1']))
	{
		$user_access_privileges = "1;";
	}
	else
	{
		$user_access_privileges = "0;";
	}
	if(isset($_REQUEST['user_access_privileges2']))
	{
		$user_access_privileges .= "1;";
	}
	else
	{
		$user_access_privileges .= "0;";
	}
	if(isset($_REQUEST['user_access_privileges3']))
	{
		$user_access_privileges .= "1;";
	}
	else
	{
		$user_access_privileges .= "0;";
	}
	if(isset($_REQUEST['user_access_privileges4']))
	{
		$user_access_privileges .= "1;";
	}
	else
	{
		$user_access_privileges .= "0;";
	}
	if(isset($_REQUEST['user_access_privileges5']))
	{
		$user_access_privileges .= "1;";
	}
	else
	{
		$user_access_privileges .= "0;";
	}
	if(isset($_REQUEST['user_access_privileges6']))
	{
		$user_access_privileges .= "1;";
	}
	else
	{
		$user_access_privileges .= "0;";
	}
	if(isset($_REQUEST['user_access_privileges7']))
	{
		$user_access_privileges .= "1;";
	}
	else
	{
		$user_access_privileges .= "0;";
	}
	*/
	//echo "User Privileges".$user_access_privileges;
	$user_user_access_privileges = "0000000";
	/*if($is_active == "")
	{
		$is_active = 0;
	}
	*/
	$user_is_active = 1;
	
	$tableList = new TableList();
	$tbname = "users";
	/*
	* Getting the list of columns of a table using the TableList class to save time on mysql statement
	*/
	$fieldlist = array();
	$con = $pCrud->connection($servername,$username,$password,$dbname);

            $fieldlist = $tableList->getFieldList($tbname."_add");
            $values = array($user_customer_id,$user_code,$user_role,$user_fname,$user_lname,md5($pass),$user_resident_status,$user_nric,$user_employment_type,$user_type,$user_date_of_joining,$user_bank_name,$user_bank_account,$user_home_phone,$user_mobile,$user_email_id,$user_residential_address,$user_notes,$user_access_privileges,$user_is_active);
	
	$result = $pCrud->SimpleInsert($con,$tbname,$fieldlist,$values);
	if($result==1)	
	{
		$pCrud->disconnection($con);
		
		//send the email here	
		$to = $user_email_id;	
		$subject = "Account created for you";
		$message = "Your account for Ace Success Admin Panel has been created.<br>You can access the Admin Panel by clicking the link - http://www.ace-success.com.sg/dashboard/controller/login.php 
		<br> Kindly login using your NRIC. Your password is-".$pass;
		mail($to,$subject,$message);
		
		header("Location: userscontroller.php");
	}
	
}

?>
<div class="row-fluid sortable">		
        <div class="box span12">
                <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon user"></i><span class="break"></span>Users</h2>
                        <div class="box-icon">
                                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                        </div>
                </div>
                <div class="box-content">

                        <?php
                                $tableList = new TableList();
                                $tbname = "users";

                                $characters = "dkgfdgfd_)#5h_gf6575688#6ytty6gtg549gujrigjyjerot4(_tvfg()5656576_6y65u6yt549g#jg_3243r4t5460948fjeofjr2322sdfdfgtret7786tgjkolgxxawwe";
                                $min = 0;
                                $max = strlen($characters) - 10;
                                $randomNumber = rand($min,$max);
                                $randomstring = substr($characters,$randomNumber,10);


                                //echo "ID-".$id;
                                //echo "Prev url-".$prev_url;

                                ?>
                            <form name="theForm" class="form-horizontal" action="userscontroller.php?action=Add" method="post" onsubmit="return validate_form(this);">

                                    <fieldset>
                            <table border="0" width="70%">
                                    <tr>
                                            <td width="30%">
                                                    <div class="control-group">
                                                             <label class="control-label" for="focusedInput">User code*</label>
                                                             <div class="controls">
                                                                    <input required name="user_code" type="text" class="input-xlarge focused" id="user_code" value="" required>
                                                                    <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                            </div>
                                                    </div>			

                                            </td>
                                            <td width="30%">
                                               <div class="control-group">
                                                              <label class="control-label" for="focusedInput">Role</label>
                                                              <div class="controls">
                                                                    <input required name = "user_role" type="text" class="input-xlarge focused" id="focusedInput"  value="" required>
                                                                    <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                              </div>
                                                    </div>

                                            </td>
                                    </tr>
                                    <tr>
                                            <td colspan="2"> 
                                                    <div class="control-group">
                                                            <div class="controls">
                                                                    <input type="checkbox" name="same_as_nric" value="same_as_nric" checked id="same_as_nric">Same as NRIC
                                                            </div>
                                                    </div>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">First name #*</label>
                                                      <div class="controls">
                                                            <input required name="user_fname" type="text" class="input-xlarge focused" id="focusedInput"   value="" required>
                                                            <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                      </div>
                                            </div>
                                            </td>
                                            <td>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Last name*</label>
                                                      <div class="controls">
                                                            <input required name="user_lname" type="text" class="input-xlarge focused" id="focusedInput"  value="" required>
                                                            <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                      </div>
                                            </div>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                    <div class="control-group">

                                                            <label class="control-label" for="selectError2">Resident Status</label>
                                                            <div class="controls">
                                                              <select name="user_resident_status" id="selectError2" data-rel="chosen">
                                                              <?php 
                                                                    $myfile = fopen("../controller/resident_type.txt","r+")  or die("Unable to open file!");
                                                                    $text = fread($myfile,filesize("resident_type.txt"));
                                                                    //echo "Text-".$text;
                                                                    fclose($myfile);
                                                                    $resident_status = explode(',',$text);

                                                                    //$resident_status = $tableList->getFieldList("user_resident_status");

                                                                    for($i = 0;$i < count($resident_status);$i++)
                                                                    {
                                                                            echo '<option>'.$resident_status[$i].'</option>';
                                                                    }

                                                              ?>
                                                              </select>
                                                            </div>
                                            </div>
                                            </td>
                                            <td>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">NRIC number*</label>
                                                      <div class="controls">
                                                            <input required name="user_nric" type="text" class="input-xlarge focused" id="user_nric"  value="" onkeyup="copyNRIC();">
                                                            <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                      </div>
                                            </div>
                                            </td>
                                    </tr>

                                    <tr>
                                            <td>
                                                    <div class="control-group">
                                                            <label class="control-label" for="selectError">Employment Type</label>
                                                            <div class="controls">
                                                              <select name="user_employment_type" id="selectError" data-rel="chosen">
                                                              <?php 

                                                                    $myfile = fopen("employment_type.txt","r+")  or die("Unable to open file!");
                                                                    $text = fread($myfile,filesize("employment_type.txt"));
                                                                    //echo "Text-".$text;
                                                                    fclose($myfile);
                                                                    $user_employment_type = explode(',',$text);
                                                                    //$user_employment_type = $tableList->getFieldList("user_employment_type");

                                                                    for($i = 0;$i < count($user_employment_type);$i++)
                                                                    {
                                                                            echo '<option>'.$user_employment_type[$i].'</option>';
                                                                    }
                                                                    $user_employment_type = null;
                                                              ?>
                                                              </select>
                                                            </div>
                                            </div>
                                            </td>
                                            <td>
                                                    <div class="control-group">
                                                      <label class="control-label" for="date01">Date of joining</label>
                                                      <div class="controls">
                                                            <input name="user_date_of_joining" type="text" class="input-xlarge datepicker" id="date01" value="">
                                                      </div>
                                            </div>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focussedInput">Bank Name</label>
                                                      <div class="controls">
                                                            <input name="user_bank_name" type="text" class="input-xlarge focused" id="user_bank_name" value="">
                                                      </div>
                                            </div>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Bank Account#</label>
                                                      <div class="controls">
                                                            <input name="user_bank_account" type="text" class="input-xlarge focused" id="focusedInput"   value="">
                                                            <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                      </div>
                                            </div>
                                            </td>
                                            <td>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Home Phone</label>
                                                      <div class="controls">
                                                            <input name="user_home_phone" type="tel" class="input-xlarge focused" id="focusedInput"   value="">
                                                            <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                      </div>
                                            </div>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Mobile*</label>
                                                      <div class="controls">
                                                            <input required name="user_mobile" type="tel" class="input-xlarge focused" id="focusedInput"  value="" required>
                                                            <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                      </div>
                                            </div>
                                            </td>
                                            <td>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Email id*</label>
                                                      <div class="controls">
                                                            <input required name="user_email_id" type="text" class="input-xlarge focused" id="focusedInput"   value="">
                                                            <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                      </div>
                                            </div>
                                            </td>
                                    </tr>
                                    <tr>

                                            <td>

                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                    <div class="control-group hidden-phone">
                                                      <label class="control-label" for="textarea2">Residential Address</label>
                                                      <div class="controls">
                                                            <input name="user_residential_address" type="text" class="input-xlarge focused" id="focusedInput"   value="" >
                                                      </div>
                                                    </div>
                                            </td>
                                            <td>
                                                    <div class="control-group">
                                                            <label class="control-label" for="selectError1">User Type</label>
                                                            <div class="controls">
                                                              <select name="user_type" id="selectError1" data-rel="chosen">
                                                              <?php 

                                                                    $user_type = $tableList->getFieldList("user_type_staff");



                                                                    for($i = 0;$i < count($user_type);$i++)
                                                                    {
                                                                            echo '<option >'.$user_type[$i].'</option>';
                                                                    }
                                                                    $user_types = null;
                                                              ?>
                                                              <!--
                                                                    <option>Full time</option>
                                                                    <option>Part time</option>
                                                                    <option>Contract</option>-->

                                                              </select>
                                                            </div>
                                                    </div>
                                            </td>

                                    </tr>
                                    <tr>
                                            <td>
                                                    <div class="control-group hidden-phone">
                                                      <label class="control-label" for="textarea2">Password*</label>
                                                      <div class="controls">
                                                            <input required name="password" type="text" class="input-xlarge focused" id="password"   value="<?php echo $randomstring; ?>" required>
                                                      </div>
                                                    </div>
                                            </td>
                                            <td>
                                                    <div class="control-group hidden-phone">
                                                      <label class="control-label" for="textarea2">Confirm Password*</label>
                                                      <div class="controls">
                                                            <input required name="conPassword" type="text" class="input-xlarge focused" id="conPassword"   value="<?php echo $randomstring; ?>" required>
                                                      </div>
                                                    </div>
                                            </td>
                                    <tr>
                                            <td colspan="2">
                                                    <div class="control-group hidden-phone">
                                                      <label class="control-label" for="textarea2">Notes</label>
                                                      <div class="controls">
                                                            <textarea name="user_notes" class="cleditor" id="textarea2" rows="3"></textarea>
                                                      </div>
                                            </div>
                                            </td>

                                    </tr>
                            </table>
                            <?php 
                            /*
                             * Processing the 7 privileges by parsing the string
                             */

                            ?>
                                    <!--	<div class="control-group">
                                            <label class="control-label" for="textarea2">Access Privileges</label>
                                                    <div class="controls">
                                                    <label class="checkbox inline">
                                                            <input name="user_access_privileges1" type="checkbox" id="inlineCheckbox1" value="edit_invoice" > Edit Invoice
                                                    </label>
                                                    <label class="checkbox inline">
                                                            <input name="user_access_privileges2" type="checkbox" id="inlineCheckbox3" value="option3"  > Update payment history
                                                     </label>
                                                     <label class="checkbox inline">
                                                            <input name="user_access_privileges3" type="checkbox" id="inlineCheckbox3" value="option3" > Edit Service Pricing
                                                     </label>
                                                     <label class="checkbox inline">
                                                            <input name="user_access_privileges4" type="checkbox" id="inlineCheckbox2" value="option2" > Add Client
                                                    </label>
                                                    </div>
                                            </div>

                                    <div class="controls">
                                            <label class="checkbox inline">
                                                    <input name="user_access_privileges5" type="checkbox" id="inlineCheckbox2" value="option2" > Add Company
                                            </label>
                                            <label class="checkbox inline">
                                                    <input name="user_access_privileges6" type="checkbox" id="inlineCheckbox1" value="option1"> Client Payment history
                                            </label>
                                            <label class="checkbox inline">
                                                    <input name="user_access_privileges7" type="checkbox" id="inlineCheckbox3" value="option3" > Access Fin. Reports
                                             </label>

                                    </div> -->
                                            <div class="form-actions">
                                                      <button name = "userSubmitted" type="submit" class="btn btn-primary">Save changes</button>
                                                      <a href="usercontroller.php"><button name="cancelled" formnovalidate class="btn">Cancel</button></a>
                                                    </div>
                                            </fieldset>

                                    </form>

                </div>
        </div><!--/span-->
			
    </div><!--/row-->
<script type="text/javascript">
	var input = document.getElementById('city');
	var options = {	
		componentRestrictions: {}
	};
	var autocomplete = new google.maps.places.Autocomplete(input, options);
</script>
<script type="text/javascript">
	function validate_form(theForm){
		if (theForm.password.value != theForm.conPassword.value)
		{
			alert("The passwords don\'t match!");
			document.getElementById("password").style.backgroundColor = "#e52213";
			return false;
		} else {
			return true;
		}
	}
	function copyNRIC()
	{
		
		if(document.getElementById("same_as_nric").checked == true)
		{
					
			document.getElementById("user_code").value = document.getElementById("user_nric").value;
			return true;
		}
		
	}
	
	
</script>
