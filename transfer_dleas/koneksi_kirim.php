<?php

/* Specify the server and connection string attributes. */
$serverName = "10.20.0.40";
 
/* Get UID and PWD from application-specific files.  */
$uid = "sa";
$pwd = "123";
$connectionInfo = array( "UID"=>$uid,
						 "PWD"=>$pwd,
						 "Database"=>"DLEAS");
 
/* Connect using SQL Server Authentication. */
$koneksi = sqlsrv_connect( $serverName, $connectionInfo);
   if( $koneksi === false )
	{
		echo "Could not connect.\n";
		die( print_r( sqlsrv_errors(), true));
	}
	else {
		echo "koneksi berhasil..!";
		
		/**   
		$tsql = "select * from [pemakai]";
		$result = sqlsrv_query($conn, $tsql);
	   
		while($row = sqlsrv_fetch_array($result))
		{
		echo"<hr><p></p><table border=1 cellpadding=4 cellspacing=0>
		<tr bgcolor='#ccc'><td>Id</td><td>Nama</td><td>Email</td></tr>";
		echo"<tr><td>$row[id]</td><td>$row[nama]</td><td>$row[email]</td></tr>";
		sqlsrv_close( $koneksi);
		}**/
		  
	}
 

?>