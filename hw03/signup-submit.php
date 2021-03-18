<?php include("head.html"); ?>
<?php
    $clean = array(
        'name' => "",
        'gender' => "",
        'age' => "",
        'p_type' => "",
        'os' => "",
        'seek_min' => "",
        'seek_max' => "",
        'seek_gender' => ""
    );

    # $seeks will get the value(s) from $seek_list array 
    $seeks = "";
    $valid = true;

    #Validating POST values 
    foreach($_POST as $field => $value) 
    {
	    if (!(isset($_POST[$field])) || (empty($_POST[$field])))
        {
		    $valid = false;
		    break;
		}

        #parsing $seek_list[] 
        elseif ($field == "seeklist")
        {
            foreach($_POST["seeklist"] as $list => $seeking)
            {
                $seeks = $seeks.$seeking;
                #echo $seeks;
            }
        }
		else
        {
		    $clean[$field] = $value;
		}
	}
    $clean["seek_gender"] = $seeks;

    #If all data fields are set and non-empty
    #write user data into singles.txt
    #show welcome page 
    if($valid) 
    {
        $user_info = $clean;
        $write_info = implode(",", $user_info);
        #echo $write_info . "\n";
        file_put_contents("./singles2.txt", PHP_EOL.$write_info, FILE_APPEND);

        echo <<<EOT
            <p><strong>Thank You!</strong></p>
            <p>Welcome to nerdLuv, {$clean['name']}!</p>
            <p>Now <a href="matches.php">log in to see your matches!</a></p><br>
        EOT;
    }
    #If all data fields are not filled out
    #then show invalid data page 
    else
    {
        echo <<<EOT
            <p><strong>Error! Invalid data.</strong></p>
            <p>We're Sorry. You submitted invalid user information. Please go back and try again.<br></p> 
            <pre>
            This page is for single nerds to meet and date each other! 
            Type in your personal information and wait for the nerdly luv to begin! 
            Thank you for using our site.</pre> <br>
        EOT;
    }
?>
<?php include("./foot.html"); ?>
