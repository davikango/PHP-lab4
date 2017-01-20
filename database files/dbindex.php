<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Add Comment to database</title>
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
				<h1>Add Comments</h1>
				<hr />
				<form method="post" action="dbcomments.php">
					<p>Name: <input type = "text" name= "name"/><br/><br />
					E-mail: <input type = "text" name= "email"/><br/><br/>
					Comments: <textarea name = "comment" rows="2" cols="50"></textarea></p><br />
					<input type = "submit" name="Sign" value = "Sign" />
					<input type = "reset" value = "Reset Form"/>
				</form>
				<hr />
				<a class = "aComments" href="dbviewpostingcomments.php">View Database Posting Comments</a>
				<br/><br/><a class = "aComments" href="index.php">Text File Version Home Page</a>
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