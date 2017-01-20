<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Comments</title>
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
										$newComment = "$name,$email,$comment\n";
										
										$handle = fopen("comments.txt","at");
										if($handle == false){
											echo "The directory text file does not exist.";
										}else if(flock($handle,LOCK_EX && LOCK_SH)){
													
													//$currStringLine = fgets($handle);
													$arrayOfLines = file("comments.txt");
													
													//while(!feof($handle)){	
																											
														//$currArrayLine = explode(",", $currStringLine);	
														
														//if(strcmp($name,$currArrayLine[0]) == 0){
														for($x = 0; $x < count($arrayOfLines); $x++){
															
															$currLine = explode(",",$arrayOfLines[$x]);
															if(in_array($name,$currLine)){
																echo "<h1>Comments Not Added</h1>
																	 <hr/>
																	 <p>One per person! You have already left comments for this posting.</p>";
																	break;
															}else{
																if(fwrite($handle, $newComment) > 0){
																	echo "<h1>Comments Added</h1>
																	 <hr/>
																	 <p>Name: <a class = 'aComments' href='mailto:$email'>$name</a>
																	 <br/>Comments: $comment.</p>"; 
																	 break;
																}
															}
														}
														//$currStringLine = fgets($handle);													
													//}
												
												 flock($handle, LOCK_UN);
											    }else{
													echo "<p>Cannot lock and write to the file, please try again later</p>";
												}
												
										fclose($handle);										
						
						}else{
								echo "<p>You must enter a value in each field. Click your browser's Back button to return to the form.</p>";		
							}						
					}
						
				?>
					<hr/>
					<a class = "aComments" href="index.php">Someone Else Wants to Comment?</a>
					<br/><a class = "aComments" href="viewpostingcomments.php">View Posting Comments</a>
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

																	