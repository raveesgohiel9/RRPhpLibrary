<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
<?php
require_once("../RRPhpLibrary/RRPhpLibrary.php");
$pCrud = new PhpCrud();
if(isset($_POST['cancelled']))
{
	$pCrud = null;
	
	
	header("Location: userscontroller.php");
	
}

if(isset($_POST['userSubmitted']))
{		
	$user_user_id = $_REQUEST['id'];
	$user_user_code = $_REQUEST['user_code'];
	$user_user_role = $_REQUEST['user_role'];
	$user_user_fname = $_REQUEST['user_fname'];
	$user_user_lname = $_REQUEST['user_lname'];
	$user_password1 = md5($_REQUEST['password1']);
	$user_user_resident_status = $_REQUEST['user_resident_status'];
	$user_user_nric = $_REQUEST['user_nric'];
	$user_user_employment_type = $_REQUEST['user_employment_type'];
	$user_user_type = $_REQUEST['user_type'];
	$user_user_date_of_joining = $_REQUEST['user_date_of_joining'];
	$user_bank_name = $_REQUEST['user_bank_name'];
	$user_user_bank_account = $_REQUEST['user_bank_account'];
	$user_user_home_phone = $_REQUEST['user_home_phone'];
	$user_user_mobile = $_REQUEST['user_mobile'];
	$user_user_email_id = $_REQUEST['user_email_id'];
	$user_user_residential_address = $_REQUEST['user_residential_address'];
	$user_user_notes = $_REQUEST['user_notes'];
	if(strcmp($user_user_type,"Staff")== 0)
	{
		/*
		if(isset($_REQUEST['user_access_privileges1']))
		{
			$user_user_access_privileges = "1;";
		}
		else
		{
			$user_user_access_privileges = "0;";
		}
		if(isset($_REQUEST['user_access_privileges2']))
		{
			$user_user_access_privileges .= "1;";
		}
		else
		{
			$user_user_access_privileges .= "0;";
		}
		if(isset($_REQUEST['user_access_privileges3']))
		{
			$user_user_access_privileges .= "1;";
		}
		else
		{
			$user_user_access_privileges .= "0;";
		}
		if(isset($_REQUEST['user_access_privileges4']))
		{
			$user_user_access_privileges .= "1;";
		}
		else
		{
			$user_user_access_privileges .= "0;";
		}
		if(isset($_REQUEST['user_access_privileges5']))
		{
			$user_user_access_privileges .= "1;";
		}
		else
		{
			$user_user_access_privileges .= "0;";
		}
		if(isset($_REQUEST['user_access_privileges6']))
		{
			$user_user_access_privileges .= "1;";
		}
		else
		{
			$user_user_access_privileges .= "0;";
		}
		if(isset($_REQUEST['user_access_privileges7']))
		{
			$user_user_access_privileges .= "1;";
		}
		else
		{
			$user_user_access_privileges .= "0;";
		}
		*/
		$user_user_access_privileges = "0000000";
	}
	else if(strcmp($user_user_type,"Customer")== 0 || strcmp($user_user_type,"Customer Admin")== 0)
	{
		$user_user_access_privileges = "0000000";
	}
	$user_access_privileges = "0000000";
	//echo "User Privileges".$user_user_access_privileges;
	
	/*if($is_active == "")
	{
		$is_active = 0;
	}
	*/
	$user_user_is_active = 1;
	
	$tableList = new TableList();
	$tbname = "users";
	/*
	* Getting the list of columns of a table using the TableList class to save time on mysql statement
	*/
	$fieldlist = array();
	$con = $pCrud->connection($servername,$username,$password,$dbname);
	if(!isset($_REQUEST['password1']))
	{
		$fieldlist = $tableList->getFieldList($tbname."_no_password");

		$values = array($user_user_code,$user_user_role,$user_user_fname,$user_user_lname,$user_user_resident_status,$user_user_nric,$user_user_employment_type,$user_user_type,$user_user_date_of_joining,$user_bank_name,$user_user_bank_account,$user_user_home_phone,$user_user_mobile,$user_user_email_id,$user_user_residential_address,$user_user_notes,$user_user_access_privileges,$user_user_is_active);
	}
	else
	{
		$fieldlist = $tableList->getFieldList($tbname."_edit_all");
		$values = array($user_user_code,$user_user_role,$user_user_fname,$user_user_lname,$user_password1,$user_user_resident_status,$user_user_nric,$user_user_employment_type,$user_user_type,$user_user_date_of_joining,$user_bank_name,$user_user_bank_account,$user_user_home_phone,$user_user_mobile,$user_user_email_id,$user_user_residential_address,$user_user_notes,$user_user_access_privileges,$user_user_is_active);		
	}
	$where = " where user_id=".$id;
	//$result = $pCrud->UpdateAllWhere($con,$tbname,$fieldlist,$values,$where);
        $result = $pCrud->UpdateAllWherePrint($con,$tbname,$fieldlist,$values,$where);
	if($result==1)	
	{
		$pCrud->disconnection($con);
		//header("Location: ".$prev_url);
		
		
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

                            //echo "ID-".$id;
                            //echo "Prev url-".$prev_url;

                            $con = $pCrud->connection($servername,$username,$password,$dbname);
                            $where = " where user_id=".$id;
                            $result = $pCrud->SimpleSelectWhere($con,$tbname,$where);
                            //$result = $pCrud->SimpleSelectWherePrint($con,$tbname,$where);
                            $rowcount = mysql_num_rows($result);
                            if($rowcount>0)
                            {
                                    while($row = mysql_fetch_assoc($result))
                                    {?>
                                <form class="form-horizontal" action="userscontroller.php?action=Edit&id=<?php echo $id;?>" method="post" onsubmit="return validate_form(this);">

                                <fieldset>
                                <table border="0" width="70%">
                                        <tr>
                                                <td width="30%">
                                                        <div class="control-group">
                                                                 <label class="control-label" for="focusedInput">User code*</label>
                                                                 <div class="controls">
                                                                        <input required name="user_code" type="text" class="input-xlarge focused" id="focusedInput" value="<?php echo $row['user_code']; ?>" >
                                                                        <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                                </div>
                                                        </div>			

                                                </td>
                                                <td width="30%">
                                                   <div class="control-group">
                                                                  <label class="control-label" for="focusedInput">Role*</label>
                                                                  <div class="controls">
                                                                        <input required name = "user_role" type="text" class="input-xlarge focused" id="focusedInput"  value="<?php echo $row['user_role'];  ?>" >
                                                                        <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                                  </div>
                                                        </div>

                                                </td>
                                        </tr>
                                        <tr>
                                                <td>
                                                        <div class="control-group">
                                                          <label class="control-label" for="focusedInput">First name #*</label>
                                                          <div class="controls">
                                                                <input required name="user_fname" type="text" class="input-xlarge focused" id="focusedInput"   value="<?php echo $row['user_fname'];  ?>">
                                                                <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                          </div>
                                                </div>
                                                </td>
                                                <td>
                                                        <div class="control-group">
                                                          <label class="control-label" for="focusedInput">Last name*</label>
                                                          <div class="controls">
                                                                <input required name="user_lname" type="text" class="input-xlarge focused" id="focusedInput"  value="<?php echo $row['user_lname'];  ?>" >
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
                                                                                echo '<option ';
                                                                                if(strcmp($row['user_resident_status'],$resident_status[$i]) == 0)
                                                                                {
                                                                                        echo "selected";
                                                                                }
                                                                                echo'>'.$resident_status[$i].'</option>';
                                                                        }
                                                                        $resident_status = null;
                                                                  ?>
                                                                  </select>
                                                                </div>
                                                </div>
                                                </td>
                                                <td>
                                                        <div class="control-group">
                                                          <label class="control-label" for="focusedInput">NRIC number*</label>
                                                          <div class="controls">
                                                                <input required name="user_nric" type="text" class="input-xlarge focused" id="focusedInput"  value="<?php echo $row['user_nric'];  ?>" >
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
                                                                                echo '<option value="'.$user_employment_type[$i].'"';
                                                                                if(strcmp($row['user_employment_type'],$user_employment_type[$i]) == 0)
                                                                                {
                                                                                        echo "selected";
                                                                                }
                                                                                echo'>'.$user_employment_type[$i].'</option>';
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
                                                                <input name="user_date_of_joining" type="text" class="input-xlarge datepicker" id="date01" value="<?php echo $row['user_date_of_joining']; //$date=explode("/",$row['user_date_of_joining']); echo $date[1]."/".$date[2]."/".$date[0]; ?>">
                                                          </div>
                                                </div>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td>
                                                        <div class="control-group">
                                                          <label class="control-label" for="focussedInput">Bank Name</label>
                                                          <div class="controls">
                                                                <input name="user_bank_name" type="text" class="input-xlarge focused" id="user_bank_name" value="<?php echo $row['user_bank_name'];  ?>">
                                                          </div>
                                                </div>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td>
                                                        <div class="control-group">
                                                          <label class="control-label" for="focusedInput">Bank Account#</label>
                                                          <div class="controls">
                                                                <input name="user_bank_account" type="text" class="input-xlarge focused" id="focusedInput"   value="<?php echo $row['user_bank_account'];  ?>">
                                                                <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                          </div>
                                                </div>
                                                </td>
                                                <td>
                                                        <div class="control-group">
                                                          <label class="control-label" for="focusedInput">Home Phone</label>
                                                          <div class="controls">
                                                                <input maxlength="9"  name="user_home_phone" type="tel" class="input-xlarge focused" id="focusedInput"   value="<?php echo $row['user_home_phone'];  ?>">
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
                                                                <input maxlength="9"  required name="user_mobile" type="tel" class="input-xlarge focused" id="focusedInput"  value="<?php echo $row['user_mobile'];  ?>" >
                                                                <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                                          </div>
                                                </div>
                                                </td>
                                                <td>
                                                        <div class="control-group">
                                                          <label class="control-label" for="focusedInput">Email id*</label>
                                                          <div class="controls">
                                                                <input required name="user_email_id" type="email" class="input-xlarge focused" id="focusedInput"   value="<?php echo $row['user_email_id'];  ?>">
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
                                                                <input name="user_residential_address" type="text" class="input-xlarge focused" id="focusedInput"   value="<?php echo $row['user_residential_address']; ?>" >
                                                          </div>
                                                        </div>
                                                </td>
                                                <td>
                                                        <div class="control-group">
                                                                <label class="control-label" for="selectError1">User Type</label>
                                                                <div class="controls">
                                                                  <select name="user_type" id="selectError1" data-rel="chosen">
                                                                  <?php 
                                                                        //echo "USer type=".$row['user_type'];
                                                                        if(strcmp($row['user_type'],'Customer')== 0 || strcmp($row['user_type'],'Customer Admin')== 0)
                                                                        {
                                                                                $user_type = $tableList->getFieldList("user_type_customer");
                                                                        }
                                                                        else
                                                                        {
                                                                                $user_type = $tableList->getFieldList("user_type_staff");
                                                                        }


                                                                        for($i = 0;$i < count($user_type);$i++)
                                                                        {
                                                                                echo '<option ';
                                                                                if(strcmp($row['user_type'],$user_type[$i]) == 0)
                                                                                {
                                                                                        echo "selected";
                                                                                }
                                                                                echo'>'.$user_type[$i].'</option>';
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
                                                          <label class="control-label" for="focusedInput">Password</label>
                                                          <div class="controls">
                                                                <input name="password1" type="text" class="input-xlarge focused" id="password"   value="" >
                                                          </div>
                                                        </div>
                                                </td>
                                                <td>
                                                        <div class="control-group hidden-phone">
                                                          <label class="control-label" for="focusedInput">Confirm Password</label>
                                                          <div class="controls">
                                                                <input name="confirm_password" type="text" class="input-xlarge focused" id="confirm_password"   value="" >
                                                          </div>
                                                        </div>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td colspan="2">
                                                        <div class="control-group hidden-phone">
                                                          <label class="control-label" for="textarea2">Notes</label>
                                                                  <div class="controls">
                                                                                <textarea name="user_notes" class="cleditor" id="textarea2" rows="3"><?php echo $row['user_notes']; ?></textarea>
                                                                  </div>
                                                        </div>
                                                </td>
                                        </tr>
                                </table>
                                <?php 
                                        /*
                                         * Processing the 7 privileges by parsing the string
                                         */
                                        $access_privileges = explode(";",$row['user_access_privileges']);
                                        $i = 0;

                                if(strcmp($action,"Add") == 0)
                                {
                                        echo'
                                        <div class="control-group">
                                                <label class="control-label" for="textarea2">Access Privileges</label>
                                                        <div class="controls">
                                                        <label class="checkbox inline">
                                                                <input name="user_access_privileges1" type="checkbox" id="inlineCheckbox1" value="edit_invoice" <?php if($access_privileges[$i]=="1" ){ echo "checked";} $i++; ?> > Edit Invoice
                                                        </label>
                                                        <label class="checkbox inline">
                                                                <input name="user_access_privileges2" type="checkbox" id="inlineCheckbox3" value="option3" <?php if($access_privileges[$i]=="1" ){ echo "checked";} $i++; ?>> Update payment history
                                                         </label>
                                                         <label class="checkbox inline">
                                                                <input name="user_access_privileges3" type="checkbox" id="inlineCheckbox3" value="option3" <?php if($access_privileges[$i]=="1" ){ echo "checked";} $i++; ?>> Edit Service Pricing
                                                         </label>
                                                         <label class="checkbox inline">
                                                                <input name="user_access_privileges4" type="checkbox" id="inlineCheckbox2" value="option2" <?php if($access_privileges[$i]=="1" ){ echo "checked";} $i++; ?>> Add Client
                                                        </label>
                                                        </div>
                                                </div>


                                        <div class="controls">
                                                <label class="checkbox inline">
                                                        <input name="user_access_privileges5" type="checkbox" id="inlineCheckbox2" value="option2" <?php if($access_privileges[$i]=="1" ){ echo "checked";} $i++; ?>> Add Company
                                                </label>
                                                <label class="checkbox inline">
                                                        <input name="user_access_privileges6" type="checkbox" id="inlineCheckbox1" value="option1" <?php if($access_privileges[$i]=="1" ){ echo "checked";} $i++; ?>> Client Payment history
                                                </label>
                                                <label class="checkbox inline">
                                                        <input name="user_access_privileges7" type="checkbox" id="inlineCheckbox3" value="option3" <?php if($access_privileges[$i]=="1" ){ echo "checked";} $i++; ?>> Access Fin. Reports
                                                 </label>

                                        </div>';
                                }
                                ?>
                                                <div class="form-actions">
                                                          <button name = "userSubmitted" type="submit" class="btn btn-primary">Save changes</button>
                                                          <button formnovalidate name="cancelled" class="btn">Cancel</button></a>
                                                        </div>
                                                </fieldset>

                                        </form>
                                      <?php
                                    }
                            }
                    ?>           
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
		if (document.getElementById("password").value != document.getElementById("confirm_password").value)
		{
			alert("The passwords don\'t match!");
			document.getElementById("password").style.backgroundColor = "#e52213";
			return false;
		} else {
			return true;
		}
	}
</script>
<?php
$pCrud->disconnection($con);
?>