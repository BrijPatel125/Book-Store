<?php
	require_once("../CRUD/php/component.php");
	require_once("../CRUD/php/operations.php");
				
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!--Stylesheet-->
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://kit.fontawesome.com/1277935501.js" crossorigin="anonymous"></script>


  </head>
  <body>
    

    <main>
    	<div class="container text-center">
    		<h1 class="py-4 bg-dark text-light rounded"><i class="fa fa-book" style="font-size:42px;color:#F9BE37;"></i> Book Store</h1>


    		<div class="d-flex justify-content-center">
    		<form action="" method="POST" class="w-50">

    			<!-- All inputs text box start here -->
    			<div class="py-2">
    				<?php
    					inputElement('<i class="fa fa-id-badge" style="font-size:24px"></i>',"ID","book_id","");
    				?>
    			</div>

    			<div class="">
    				<?php
    					inputElement('<i class="fa fa-book" style="font-size:24px"></i>',"Book Name","book_name","");
    				?>
    			</div>

    			<div class="row pt-2">
    				<div class="col">
	    				<?php
	    					inputElement('<i class="fas fa-book-reader" style="font-size:24px"></i>',"Publisher","book_publisher","");
	    				?>
    				</div>

    				<div class="col">
	    				<?php
	    					inputElement('<i class="fa fa-rupee" style="font-size:24px"></i>',"Price","book_price","");
	    				?>
    				</div>	
    			</div>
    			<!-- All inputs text box ends here -->


    			<!-- All buttons start here -->
    			<div class="d-flex justify-content-center">
    				<div class="row">
    					<div class="col">
    						<?php
	    					buttonElement("btn-create","btn btn-dark",'<i class="fa fa-plus" style="font-size:18px; color:#F9BE37;"></i>',"create",'data-toggle="tooltip" data-placement="bottom" title="Create"');
	    					?>
    					</div>

    					<div class="col">
    						<?php
	    					buttonElement("btn-retrieve","btn btn-dark",'<i class="fa fa-sync" style="font-size:18px; color:#F9BE37;"></i>',"retrieve",'data-toggle="tooltip" data-placement="bottom" title="Retrieve Record"');
	    					?>
    					</div>

    					<div class="col">
    						<?php
	    					buttonElement("btn-update","btn btn-dark",'<i class="fa fa-pen-alt" style="font-size:18px; color:#F9BE37;"></i>',"update",'data-toggle="tooltip" data-placement="bottom" title="Update Record"');
	    					?>
    					</div>

    					<div class="col">
    						<?php
	    					buttonElement("btn-delete","btn btn-dark",'<i class="fas fa-trash-alt" style="font-size:18px; color:#F9BE37;"></i>',"delete",'data-toggle="tooltip" data-placement="bottom" title="Delete Record"');
	    					?>
    					</div>

    					<div class="col">
    						<?php
	    						deleteBtn();
	    					?>
    					</div>

    				</div>	    			
    			</div>
    			<!-- All buttons ends here -->
    		</form>	
    	</div>

    	<!-- Bootstrap Table-->
    	<div class="d-flex table-data">
    		<table class="table table-striped table-dark">
    			<thead class="thead-dark">
    				<tr>
    					<th>ID</th>
    					<th>Book Name</th>
    					<th>Publisher</th>
    					<th>Book Price</th>
    					<th>Edit</th>
    				</tr>
    			</thead>
    			<tbody id="tbody">

    				<?php
    					if (isset($_POST['retrieve'])) 
						{
							$result = retrieveData();
							if ($result) 
							{
								while ($row = mysqli_fetch_assoc($result)) 
								{?>
									<tr>
				    					<td data-id="<?php echo $row['id'];?>"><?php echo $row['id'];?></td>
				    					<td data-id="<?php echo $row['id'];?>"><?php echo $row['book_name'];?></td>
				    					<td data-id="<?php echo $row['id'];?>"><?php echo $row['book_publisher'];?></td>
				    					<td data-id="<?php echo $row['id'];?>"><?php echo '$'.$row['book_price'];?></td>
				    					<td><i class="fa fa-edit btnedit" data-id="<?php echo $row['id'];?>" style="font-size:18px; color:#F9BE37; cursor: pointer;"></i></td>
				    				</tr>

								<?php
								}
							}
						}	
    				?>
    				<!--
    				<tr>
    					<td>1</td>
    					<td>Book Name</td>
    					<td>Daily Tution</td>
    					<td>44.99</td>
    					<td><i class="fa fa-edit btnedit" style="font-size:18px; color:#F9BE37; cursor: pointer;"></i></td>
    				</tr>-->
    			</tbody>
    		</table>
    	</div>

    	</div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../CRUD/php/main.js" type="text/javascript"></script>
  </body>
</html>