<?php
	require_once("../CRUD/php/db.php");
	require_once("../CRUD/php/component.php");
	$con = Createdb();

	//create button click(To insert data into database)
	if (isset($_POST['create'])) 
	{
			# code...
		//echo "Create Button Clicked..!!";
		createData();
	}

	//update button
	if (isset($_POST['update'])) 
	{
			# code...
		//echo "Update Button Clicked..!!";
		updateData();
	}

	//delete button
	if (isset($_POST['delete'])) 
	{
			# code...
		//echo "Delete Button Clicked..!!";
		deleteData();
	}

	//deleteAll button
	if (isset($_POST['deleteAll'])) 
	{
			# code...
		//echo "Delete Button Clicked..!!";
		deleteAll();
	}


		


	function createData()
	{
		$bookname = textboxValue("book_name");
		$bookpublisher = textboxValue("book_publisher");
		$bookprice = textboxValue("book_price");

		if ($bookname && $bookpublisher && $bookprice) 
		{
			$sql = "INSERT INTO books(book_name,book_publisher,book_price)VALUES('$bookname','$bookpublisher','$bookprice')";

			//to execute query
			if (mysqli_query($GLOBALS['con'],$sql)) {
				# code...
				//echo "Record Insterted Succesfully..!!";
				TextNode("success","Record Insterted Succesfully..!!");
			}else{
				//echo "Something went wrong Error..!!";
				TextNode("error","Error Occured..!!");
			}
		}
		else
		{
			//echo "Please enter data in text box";
			TextNode("error","Please Enter Data In Text Field");
		}
	}

	function textboxValue($value)
	{
		$textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
		if (empty($textbox)) {
			# code...
			return false;
		}
		else
		{
			return $textbox;
		}
	}

	//messages
	function TextNode($classname,$msg)
	{
		$element = "<h5 class='$classname'>$msg</h5>";
		echo $element;
	}



	//To Retrieve Data From Database
	function retrieveData()
	{
		$sql = "SELECT * FROM books";

		$result = mysqli_query($GLOBALS['con'],$sql);

		if (mysqli_num_rows($result)>0) 
		{
			/*while ($row = mysqli_fetch_assoc($result)) 
			{
				echo "ID : ".$row['id']."- Book Name : ".$row['book_name'];
			}*/
			return $result;
		}
	}

	//To Update Database
	function updateData()
	{
		$bookid = textboxValue("book_id");
		$bookname = textboxValue("book_name");
		$bookpublisher = textboxValue("book_publisher");
		$bookprice = textboxValue("book_price");

		if ($bookname && $bookpublisher && $bookprice) 
		{
			$sql = "UPDATE books SET book_name='$bookname',book_publisher='$bookpublisher',book_price='$bookprice' WHERE id='$bookid'";

			//to execute query
			if (mysqli_query($GLOBALS['con'],$sql)) 
			{
				# code...
				//echo "Record Updated Succesfully..!!";
				TextNode("success","Record Updated Succesfully..!!");
			}else
			{
				//echo "Something went wrong Error..!!";
				TextNode("error","Enable to Update Record..!!");
			}
		}
		else
		{
			//echo "Please enter data in text box";
			TextNode("error","Select Data Using Edit Icon..!!");
		}

	}

	//To delete the record

	function deleteData()
	{
		$bookid = (int)textboxValue("book_id");

		$sql = "DELETE FROM books WHERE id='$bookid'";

		if (mysqli_query($GLOBALS['con'],$sql)) 
		{
				# code...
				//echo "Record Deleted Succesfully..!!";
				TextNode("success","Record Deleted Succesfully..!!");
		}else
		{
				//echo "Something went wrong Error..!!";
				TextNode("error","Enable to Delete Record..!!");
		}
	}

	//To delete all data
	function deleteBtn()
	{
		$result = retrieveData();
		$i=0;
		if ($result) 
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$i++;
				if ($i>3) 
				{
					buttonElement("btn-deleteAll","btn btn-dark",'<i class="fas fa-trash-alt" style="font-size:18px; color:#F9BE37;"></i>Delete All',"deleteAll",'data-toggle="tooltip" data-placement="bottom" title="Delete All Record"');
					return;
				}
			}
		}
	}


	function deleteAll()
	{
		$sql = "DROP TABLE books";

		if (mysqli_query($GLOBALS['con'],$sql)) 
		{
				# code...
				//echo "Record Deleted Succesfully..!!";
				TextNode("success","All Record Deleted Succesfully..!!");
				Createdb();

		}
		else
		{
				//echo "Something went wrong Error..!!";
				TextNode("error","Enable to Delete All Record..!!");
		}

	}
?>