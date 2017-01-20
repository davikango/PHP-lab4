<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Database Comments</title>
	<link rel="stylesheet" type="text/css" href="website.css"/>
	<link rel="stylesheet" type="text/css" href="comments.css"/>
</head>
<body>
<div id="container">
	<div id="header">
	 
			<?php 
				define(ROOT, '../');
				include_once ROOT. 'header.php';
			?>
		

	</div>

	<div id="labspractica">
	
		 <?php 
			include_once ROOT. 'menu.inc';
		?>
			
		
	</div>
	
	<div id="labcontent">
			<div class="comments">
				<?php
					if(isset($_POST['Sign'])){				
						if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comment'])){
							
										$name = $_POST['name'];
										$email = $_POST['email'];
										$comment = $_POST['comment'];
								
										$connection = mysqli_connect("helios.ite.gmu.edu","dvacasot","ceetoa");
										if($connection === FALSE){
											echo "<p>Connection Error: ".mysqli_error()."</p>\n";
										}else{
											if(mysqli_query($connection,"USE dvacasot") === FALSE){
												echo "<p>Could not select the \"dvacasot\" "."database: " . mysqli_error($connection) . "</p>\n";
											}else{
												$SQLstring = "INSERT INTO comments (Name,Email,Comment) VALUES('$name','$email','$comment')";
												$queryResult = mysqli_query($connection,$SQLstring);
												if($queryResult === FALSE){
													echo "<p>Unable to execute the query.</p>" . "<p>Error code: " . mysqli_errno($connection) . ": " . 
															mysqli_error($connection) . "</p>";
												}else{
													echo "<h1>Comments Added</h1>
																	 <hr/>
																	 <p>Name: <a class = 'aComments' href='mailto:$email'>$name</a>
																	 <br/>Comments: $comment.</p>"; 
												}
											}
											mysqli_close($connection);
										}
		
						}else{
								echo "<p>You must enter a value in each field. Click your browser's Back button to return to the form.</p>";		
							}						
					}
						
				?>
					<hr/>
					<a class = "aComments" href="dbindex.php">Someone Else Wants to Comment?</a>
					<br/><a class = "aComments" href="dbviewpostingcomments.php">View Posting Comments</a>
			</div>
	</div>
		
	<div id="footer">
		 
		<?php 
			include_once ROOT. 'footer.inc';
		?>	
		
	</div>

</div>

</body>
</html>

																	