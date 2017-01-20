<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>View Database Comments A-Z</title>
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
					<p><h2>Huh?</h2>
							Kirschner and Karpinski report that:
							<br/>Students who used social networking sites while studying 
								scored 20% lower on tests and students who used social media had an average
							<br/>GPA of 3.06 versus non-users who had an average GPA of 3.82.
							<br/>Source: Paul A. Kirschner and Aryn C. Karpinski, "Facebook and Academic Performance,"
								 Computers in Human Behavior, Nov. 2010.
						<h1>Comments</h1>
						
				<?php
						
					$connection = mysqli_connect("helios.ite.gmu.edu","dvacasot","ceetoa");
					if($connection === FALSE){
						echo "<p>Connection Error: ".mysqli_error()."</p>\n";
					}else{
						if(mysqli_query($connection,"USE dvacasot") === FALSE){
							echo "<p>Could not select the \"dvacasot\" "."database: " . mysqli_error($connection) . "</p>\n";
						 }else{
														
							$SQLstring = "SELECT * FROM comments ORDER BY Name";
							$queryResult = mysqli_query($connection,$SQLstring);
							if($queryResult === FALSE){
								echo "<p>Unable to execute the query.</p>" . "<p>Error code: " . mysqli_errno($connection). ": " 
										. mysqli_error($connection) . "</p>";				
							}else{
								echo "<hr/>";
								while($row = mysqli_fetch_row($queryResult)){	
									
									echo "$row[0]. &nbsp&nbsp&nbsp&nbsp&nbspName: <a class = 'aComments' href = 'mailto:$row[2]'>$row[1]</a><br/>";								
									echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspComment: $row[3]<br/>";
									echo "<hr/>";
								}
							}
						 }
							mysqli_free_result($queryResult);
							mysqli_close($connection);
						}								
				?>
					
					<p><a class = "aComments" href="dbindex.php">Add new Comment</a>
					</p>
					
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<p>Delete Comment Number: <input type = "text" name= "commentToDelete"/>&nbsp<input type = "submit" name="Delete" value = "Delete" />
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

																	