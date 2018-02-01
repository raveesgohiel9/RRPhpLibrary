<?php


require_once("RRPhpLibrary.php");
//require_once("PhpCrud.php");
//require_once("Connection.php");
//require_once("TableList.php");
$pCrud = new PhpCrud();
$con = $pCrud->connection($servername,$username,$password,$dbname);
//echo "Connection Successful-".$con;
$tableList = new TableList();
$tbname = "users";
/*
 * Getting the list of columns of a table using the TableList class to save time on mysql statement
*/
$fieldlist = array();
//$fieldlist = $tableList->getFieldList($tbname."_all");
//$fieldlistMin = $tableList->getFieldList($tbname);
//print_r($tableList->getFieldList('users'));
//print_r($fieldlist);
//print_r($fieldlistMin);


/*
 * Getting the list of Column name in a specific table to automate the CRUD. 
 * The statement below woll not retrieve the columns with Default values. 
 * This is specifically used for Timestamp values.
*/
$tbname = "menuitems";
//$fieldlist = $pCrud->getColumns($con,$dbname,$tbname);
$fieldlist = $pCrud->getColumnsAll($con,$dbname,$tbname);
//print_r($fieldlist);
/*
 * Inserting into a table. Ignore columns with default values.
*/
//$values = array('',"Moser");
//$result = $pCrud->SimpleInsert($con,$tbname,$fieldlistMin,$values);

/*
 * Retrieving results from the table. This is Select statement and get all the values.
*/
//$result = $pCrud->SimpleSelect($con,$tbname,$fieldlist);
//$result = $pCrud->SimpleSelectColumns($con,$tbname,$fieldlistMin);
//print_r($result);

/*
 * Retrieving results from table. 
 * This is select statement to get values based on where
*/
//$where = " where _user_id=10";
//$result = $pCrud->SimpleSelectWhere($con,$tbname,$fieldlist,$where);
//print_r($result);

/*
 * Retrieving results from the table. 
 * This is Select statement and get all the values for json encode.
*/
//$result['result'] = $pCrud->SimpleSelectJSON($con,$tbname,$fieldlist);
//print_r($result);
//echo json_encode($result);

/*
 * Retrieving results from the table based on where condition. 
 * This is Select statement and get all the values for json encode.
*/
//$where = " where _user_id=10";
//$result['result'] = $pCrud->SimpleSelectJSONWhere($con,$tbname,$fieldlist,$where);
//print_r($result);
//echo json_encode($result);

/*
 * This function is to write the update query for specific columns.
*/
//$where = "_user_name='Cash' where _user_id=11";
//$result['result'] = $pCrud->UpdateWhere($con,$tbname,$fieldlist,$where);
//print_r($result);

/*
 * This function is to write the update query for more than 1 columns.
*/
//$values = array('Mickey');
//$where = " where _user_id=13";
//$result['result'] = $pCrud->UpdateAllWhere($con,$tbname,$values,$where);
//print_r($result);


/* 
 * This function delete's from the table using the where clause
 */
//$where = "where _user_id=19";
//$result = $pCrud->DeleteRowWhere($con,$tbname,$where);
//echo "Result-".$result;
 
 
/*
 * Exception handling functions like Match Expressions
 */
//$result = $pCrud->MatchEmail("ravi_gohil@yahoo.com");
 
 
 
$pCrud->disconnection($con);
//$pCrud->display("The End");

?>
<?php

/* 
* HTML CONTENT HERE 
*/

?>