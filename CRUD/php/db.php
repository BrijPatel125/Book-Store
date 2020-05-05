<?php
	
	function Createdb()
	{
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="bookstore";

		//create connection
		$con = mysqli_connect($servername,$username,$password);

		//Check Connnection

		if (!$con) {
			die("Connection Failed : ".mysqli_connect_error());
		}

		//Create Database
		$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

		if (mysqli_query($con,$sql)) {
			# code...
			//echo "Databse created Successfully";
			$con = mysqli_connect($servername,$username,$password,$dbname);

			$sql = "
					CREATE TABLE IF NOT EXISTS books(
						id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
						book_name VARCHAR(50) NOT NULL,
						book_publisher VARCHAR(25) NOT NULL,
						book_price FLOAT
					);
			";

			if(mysqli_query($con,$sql))
			{
				//echo "Table Created Successfully";
				return $con;
			}
			else
			{
				echo "Cannot Created Table....!!";
			}

		}else{
			echo "Something went wrong while creating databse".mysqli_error($con);
		}
	}
?>