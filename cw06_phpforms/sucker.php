
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!-- 
    Authors: Tommy Lim
    Webprogramming Spring 2021
	03/07/21
    CW05: PHP Forms
 -->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php
			$required = [];
			
			$valid = true;
			#$name = $cardnumber = $section = $cardtype = "";
			foreach($_POST as $field => $value) 
			{
				if (!(isset($_POST[$field])) || (empty($_POST[$field]))) 
				{
					header("location: https://codd.cs.gsu.edu/~tlim3/web/cw/5/sorry_page.html");
					$valid = false;
					exit();
				}
				else
				{
					#header("location: https://codd.cs.gsu.edu/~tlim3/web/cw/5/sorry_page.html");
					#$valid = false;
					$required[$field] = $value;
				}
			}

			if($valid) {
				file_put_contents("./suckers.txt",$required['name'].";".$required['section'].";".$required['cardnumber'].";".$required['cardtype']."\n",FILE_APPEND);
			}
		?>
		
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<!-- <dd><?php echo $name;?> </dd> -->
			<dd><?php echo $required['name'];?> </dd>

			<dt>Section</dt>
			<!-- <dd><?php echo $section;?> </dd> -->
			<dd><?php echo $required['section'];?> </dd>

			<dt>Credit Card</dt>
			<!-- <dd><?php echo "$cardnumber ($cardtype)";?></dd> -->
			<dd><?php echo $required['cardnumber']."(".$required['cardtype'].")";?></dd>
		</dl>

		<p> Here are all the suckers who have submitted here: </p>
		<?php
			$suckers = file_get_contents("./suckers.txt");
			echo "<pre>".$suckers."</pre>";
		?>
	</body>
</html> 