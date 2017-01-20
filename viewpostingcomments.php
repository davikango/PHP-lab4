<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>View Comments</title>
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
			
							
							
								$commentsArray = file("comments.txt");
								if(filesize("comments.txt") == 0){
									echo "<p>There are no posted comments to show.</p>\n";
								}else{
									for($x = 0; $x < count($commentsArray); $x++){
										if(isset($_POST['Delete'])){
											if(isset($_POST['commentToDelete'])){
												$delete = $_POST['commentToDelete'];				
												array_splice($commentsArray,$delete,1);
												$currComment = explode(",",$commentsArray[$x]);																	
												echo "<hr/>";
												echo ($x), ".&nbsp&nbsp&nbsp&nbspName: <a class = 'aComments' href='mailto:{$currComment[1]}'>$currComment[0]</a><br/>";
												echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspComments: $currComment[2]<br/>";
												
												$currComment = implode(",",$currComment);
												$currComment = str_replace($currComment,'',$commentsArray[$x]);
												
											}
										}else{
												$currComment = explode(",",$commentsArray[$x]);																	
												echo "<hr/>";
												echo ($x), ".&nbsp&nbsp&nbsp&nbspName: <a class = 'aComments' href='mailto:{$currComment[1]}'>$currComment[0]</a><br/>";
												echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspComments: $currComment[2]<br/>";
										}
																		
									}	
								}
										
				?>
					<hr/>
					<p><a class = "aComments" href="index.php">Add new Comment</a>
					<p><a class = "aComments" href="viewpostingcommentsA-Z.php">Sort Comments A-Z(by name)</a>
					<p><a class = "aComments" href="viewpostingcommentsZ-A.php">Sort Comments Z-A(by name)</a>
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

																	