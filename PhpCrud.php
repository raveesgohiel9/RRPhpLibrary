<?php


class PhpCrud
{
	
	function PhpCrud()
	{
		
	}
	
	function connection($server,$user,$pass,$database)
	{
		$servername = $server;
		$username = $user;
		$password = $pass;
		$dbname = $database;
		
		$dbq = mysql_connect($servername,$username,$password)  or die("Cannot connect to Mysql Server");
		$db = mysql_select_db($dbname,$dbq) or die("Cannot select DB");
		
		// Check connection
		if (mysqli_connect_errno())
        {
		 	//$this->display("Cannot connect");
		}
		else
		{
			//$this->display("Connected");
		}
		//return $dbq;
	}
	
	function disconnection($dbLink)
	{
		
		//mysql_close($dbLink);
		mysql_close();
		//$this->display("Disconnected");
	}
	function display($str)
	{
		echo "\n".$str;
	}
	function getColumns($dbq,$dbname,$tbname)
	{
		$result = array();
		$q = "Show COLUMNS from ".$tbname." from ".$dbname;
		$r = mysql_query($q);
		//print_r($r);
		if (mysql_num_rows($r)>0) 
		{
			$i = 0;
			
			while ($row = mysql_fetch_assoc($r)) 
			{
				//print_r($row);
				
				if(isset($row['Default']))
				{
					$this->display("Not assigning");
				}
				else
				{
					
					$result[$i] = $row['Field'];
					//$this->display($result[$i]);
					$i++;
				}
			}
			
		}
		return $result;
	}
	function getColumnsPrint($dbq,$dbname,$tbname)
	{
		$result = array();
		$q = "Show COLUMNS from ".$tbname." from ".$dbname;
		$r = mysql_query($q);
		//print_r($r);
		if (mysql_num_rows($r)>0) 
		{
			$i = 0;
			
			while ($row = mysql_fetch_assoc($r)) 
			{
				echo $row['Field']."','";
				
				if(isset($row['Default']))
				{
					//$this->display("Not assigning");
				}
				else
				{
					
					$result[$i] = $row['Field'];
					//$this->display($result[$i]);
					$i++;
				}
			}
			
		}
		return $result;
	}
	function getColumnsAll($dbq,$dbname,$tbname)
	{
		$result = array();
		$q = "Show COLUMNS from ".$tbname." from ".$dbname;
		$r = mysql_query($q);
		//print_r($r);
		if (mysql_num_rows($r)>0) 
		{
			$i = 0;
			
			while ($row = mysql_fetch_assoc($r)) 
			{
				//print_r($row);
				$result[$i] = $row['Field'];
				//$this->display($result[$i]);
				$i++;
				
			}
			
		}
		return $result;
	}
	function SimpleInsert($dbq,$tbname,$fields,$values)
	{
		/*
		 * Generating a dynamic query for insert
		*/
		$q = "Insert into ".$tbname." SET ";
		for($i = 0;$i < count($fields);$i++)
		{
			if($i < count($fields)-1)
			{
				$q .="".$fields[$i]."='".$values[$i]."',";
			}
			else
			{
				$q .="".$fields[$i]."='".$values[$i]."'";
			}
			
		}	
		//$this->display("Query-".$q);	
		$r = mysql_query($q);
			
		if($r)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function SimpleInsertPrint($dbq,$tbname,$fields,$values)
	{
		/*
		 * Generating a dynamic query for insert
		*/
		$q = "Insert into ".$tbname." SET ";
		for($i = 0;$i < count($fields);$i++)
		{
			if($i < count($fields)-1)
			{
				$q .="".$fields[$i]."='".$values[$i]."',";
			}
			else
			{
				$q .="".$fields[$i]."='".$values[$i]."'";
			}
			
		}	
		$this->display("Query-".$q);	
		$r = mysql_query($q);
			
		if($r)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	/*
	* This function gives the result in a raw format
	*/	
	function SimpleSelect($dbq,$tbname,$fields)
	{
		$q = "SELECT * from ".$tbname;
		$r = mysql_query($q);
		//print_r($r);
		
		if (mysql_num_rows($r)>0) 
		{
			return $r;	
		}
		else
		{
			return 0;
		}
		
	}
	/*
	* This function gives the result in a raw format with only selected column names
	*/	
	function SimpleSelectColumns($dbq,$tbname,$fields)
	{
		
		$q = "SELECT ";
		for($i = 0;$i < count($fields);$i++)
		{
			if($i < count($fields)-1)
			{
				$q .= "".$fields[$i].",";
			}
			else
			{
				$q .= "".$fields[$i];
			}
		}
		$q .= " from ".$tbname;
		//echo "Query-".$q;
		$r = mysql_query($q);
		//print_r($r);
		
		//if (mysql_num_rows($r)>0) 
		//{
		//	return $r;	
		//}
		//else
		//{
			return $r;
		//}
		
	}
	/*
	* This function gives the result in a raw format with only selected column names
	*/	
	function SimpleSelectColumnsPrint($dbq,$tbname,$fields)
	{
		
		$q = "SELECT ";
		for($i = 0;$i < count($fields);$i++)
		{
			if($i < count($fields)-1)
			{
				$q .= "".$fields[$i].",";
			}
			else
			{
				$q .= "".$fields[$i];
			}
		}
		$q .= " from ".$tbname;
		echo "Query-".$q;
		$r = mysql_query($q);
		print_r($r);
		
		//if (mysql_num_rows($r)>0) 
		//{
		//	return $r;	
		//}
		//else
		//{
			return $r;
		//}
		
	}
	
	
	/*
	* This function gives the result in a raw format with only selected column names using the where clause
	*/	
	function SimpleSelectColumnsWhere($dbq,$tbname,$fields,$where)
	{
		
		$q = "SELECT ";
		for($i = 0;$i < count($fields);$i++)
		{
			if($i < count($fields)-1)
			{
				$q .= "".$fields[$i].",";
			}
			else
			{
				$q .= "".$fields[$i];
			}
		}
		$q .= " from ".$tbname.$where;
		//echo "Query-".$q;
		$r = mysql_query($q);
		//print_r($r);
		
		//if (mysql_num_rows($r)>0) 
		//{
		//	return $r;	
		//}
		//else
		//{
			return $r;
		//}
		
	}
	function SimpleSelectColumnsWherePrint($dbq,$tbname,$fields,$where)
	{
		
		$q = "SELECT ";
		for($i = 0;$i < count($fields);$i++)
		{
			if($i < count($fields)-1)
			{
				$q .= "".$fields[$i].",";
			}
			else
			{
				$q .= "".$fields[$i];
			}
		}
		$q .= " from ".$tbname.$where;
		echo "Query-".$q;
		$r = mysql_query($q);
		print_r($r);
		
		//if (mysql_num_rows($r)>0) 
		//{
		//	return $r;	
		//}
		//else
		//{
			return $r;
		//}
		
	}
	/*
	* This function gives the result in a raw format. 
	* The result is selected by where clause
	*/	
	function SimpleSelectWhere($dbq,$tbname,$where)
	{
		$q = "SELECT * from ".$tbname." ".$where;
		//echo "Query-".$q;
		$r = mysql_query($q);
		//print_r($r);
		
		if (mysql_num_rows($r)>0) 
		{
			return $r;	
		}
		else
		{
			return 0;
		}
		
	}
	
	/*
	* This function gives the result in a raw format. 
	* The result is selected by where clause. This function prints the query and result
	*/	
	function SimpleSelectWherePrint($dbq,$tbname,$where)
	{
		$q = "SELECT * from ".$tbname." ".$where;
		echo "Query-".$q;
		$r = mysql_query($q);
		print_r($r);
		
		if (mysql_num_rows($r)>0) 
		{
			return $r;	
		}
		else
		{
			return 0;
		}
		
	}
	
	/*
	* This function gives the result in a sorted array
	*/
	function SimpleSelectSorted($dbq,$tbname,$fields)
	{
		$result = array();
		$q = "SELECT * from ".$tbname;
		$r = mysql_query($q);
		//print_r($r);
		
		if (mysql_num_rows($r)>0) 
		{
			$i = 0;
			
			while ($row = mysql_fetch_assoc($r)) 
			{
				//print_r($row);
				$subresult = array();
				for($j = 0;$j < count($fields);$j++)
				{
					
					$subresult[$j] = $row[$fields[$j]];
					//$this->display($subresult[$j]);
				}
				
				$result[$i] = $subresult;
				$i++;
			}
			
		}
		return $result;
	}
	
	/*
	* This function gives the result in a sorted array but using where clause
	*/
	function SimpleSelectSortedWhere($dbq,$tbname,$fields,$where)
	{
		$result = array();
		$q = "SELECT * from ".$tbname." ".$where;
		$r = mysql_query($q);
		//print_r($r);
		
		if (mysql_num_rows($r)>0) 
		{
			$i = 0;
			
			while ($row = mysql_fetch_assoc($r)) 
			{
				//print_r($row);
				$subresult = array();
				for($j = 0;$j < count($fields);$j++)
				{
					
					$subresult[$j] = $row[$fields[$j]];
					//$this->display($subresult[$j]);
				}
				
				$result[$i] = $subresult;
				$i++;
			}
			
		}
		return $result;
	}
	
	/*
	* This function gives the result in a sorted array that can just be encoded to JSON
	*/
	
	function SimpleSelectJSON($dbq,$tbname,$fields)
	{
		
		$result = array();
		$q = "SELECT * from ".$tbname;
		$r = mysql_query($q);
		//print_r($r);
		
		if (mysql_num_rows($r)>0) 
		{
			$i = 0;
			
			while ($row = mysql_fetch_assoc($r)) 
			{
				//print_r($row);
				$subresult = array();
				
				for($j = 0;$j < count($fields);$j++)
				{
					
					$subresult[$fields[$j]] = $row[$fields[$j]];
					//$this->display($subresult[$j]);
				}
				
				$result[$i] = $subresult;
				$i++;
			}
			
		}
		//$result['result'] = $subresult;
		return $result;
	}
	
	/*
	* This function gives the result in a sorted array that can just be encoded to JSON.
	* The results are returned based on where condition
	*/
	
	function SimpleSelectJSONWhere($dbq,$tbname,$fields,$where)
	{
		
		$result = array();
		$q = "SELECT * from ".$tbname." ".$where;
		$r = mysql_query($q) or die("Cannot execute query");
		//print_r($r);
		
		if (mysql_num_rows($r)>0) 
		{
			$i = 0;
			
			while ($row = mysql_fetch_assoc($r)) 
			{
				//print_r($row);
				$subresult = array();
				
				for($j = 0;$j < count($fields);$j++)
				{
					
					$subresult[$fields[$j]] = $row[$fields[$j]];
					//$this->display($subresult[$j]);
				}
				
				$result[$i] = $subresult;
				$i++;
			}
			
		}
		else
		{
			//echo "No rows";
			//$result="0";
		}
		//$result['result'] = $subresult;
		return $result;
	}
	/*
	* This function gives the result in a sorted array that can just be encoded to JSON.
	* The results are returned based on where condition
	*/
	
	function SimpleSelectJSONWherePrint($dbq,$tbname,$fields,$where)
	{
		
		$result = array();
		$q = "SELECT * from ".$tbname." ".$where;
		$r = mysql_query($q);
		echo "Query-".$q;
		//print_r($r);
		
		if (mysql_num_rows($r)>0) 
		{
			$i = 0;
			
			while ($row = mysql_fetch_assoc($r)) 
			{
				//print_r($row);
				$subresult = array();
				
				for($j = 0;$j < count($fields);$j++)
				{
					
					$subresult[$fields[$j]] = $row[$fields[$j]];
					$this->display($subresult[$j]);
				}
				
				$result[$i] = $subresult;
				$i++;
			}
			
		}
		else
		{
			echo "No rows";
		}
		//$result['result'] = $subresult;
		return $result;
	}
	function UpdateWhere($dbq,$tbname,$where)
	{
		$q = "UPDATE ".$tbname." SET ".$where;
		//$this->display("Query-".$q);	
		$r = mysql_query($q);
			
		if($r)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function UpdateWherePrint($dbq,$tbname,$where)
	{
		$q = "UPDATE ".$tbname." SET ".$where;
		$this->display("Query-".$q);	
		$r = mysql_query($q);
			
		if($r)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function UpdateAllWhere($dbq,$tbname,$fields,$values,$where)
	{
		//var_dump($fields);
		$q = "UPDATE ".$tbname." SET ";
		for($i = 0;$i < count($fields);$i++)
		{
			if($i < count($fields)-1)
			{
				$q .= " ".$fields[$i]."='".$values[$i]."',";
			}
			else
			{
				$q .= " ".$fields[$i]."='".$values[$i]."'";
			}
			
		}
		$q .= $where;
		
		//$this->display("Query-".$q);	
		$r = mysql_query($q);
		
		if($r)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function UpdateAllWherePrint($dbq,$tbname,$fields,$values,$where)
	{
		//var_dump($fields);
		$q = "UPDATE ".$tbname." SET ";
		for($i = 0;$i < count($fields);$i++)
		{
			if($i < count($fields)-1)
			{
				$q .= " ".$fields[$i]."='".$values[$i]."',";
			}
			else
			{
				$q .= " ".$fields[$i]."='".$values[$i]."'";
			}
			
		}
		$q .= $where;
		
		$this->display("Query-".$q);	
		
		$r = mysql_query($q);
		
		print_r($r);
		if($r)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function DeleteRowWhere($dbq,$tbname,$where)
	{
		$q = "DELETE FROM ".$tbname." ".$where;
		//$this->display("Query-".$q);	
		$r = mysql_query($q);
			
		if($r)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function DeleteRowWherePrint($dbq,$tbname,$where)
	{
		$q = "DELETE FROM ".$tbname." ".$where;
		$this->display("Query-".$q);	
		$r = mysql_query($q);
			
		if($r)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
}


?>