
<?php
    include("head.html");
    include("common.php");
    #All current singles registered to site
    #Reads entire file into an array
    $singles = file("./singles2.txt");

    $user_name = $_GET["name"];
    $user_gender = $user_age = $user_p_type = $user_os = $user_min = $user_max = $user_seeking = "";
    $other_name = $other_gender = $other_age = $other_p_type = $other_os = $other_min = $other_max = $other_seeking ="";

    #Find current user info from "singles.txt"
    foreach($singles as $line)
    {
        $info = explode(',', $line);

        if($user_name == $info[0])
        {
            $user_gender = $info[1];
            $user_age = (int)$info[2];
            $user_p_type = $info[3];
            $user_os = $info[4];
            $user_min = (int)$info[5];
            $user_max = (int)$info[6];
            $user_seeking = $info[7];
            #echo "user is seeking: " .$user_seeking."\n";
            break;
        }
    }

    $matches = 0;
    echo "<strong class=\"pleft\">Matches for {$user_name}</strong><br>"; 
    foreach($singles as $line)
    {
     
        $info = explode(',', $line);
        $other_name = $info[0];
        $other_gender = $info[1];
        $other_age = (int)$info[2];
        $other_p_type = $info[3];
        $other_os = $info[4];
        $other_min = (int)$info[5];
        $other_max = (int)$info[6];
        $other_seeking = $info[7];
        $gen_match = check_genders($user_gender, $user_seeking, $other_gender, $other_seeking);
        #Skip if matching ourselves or if other gender does not equal seeking gender
        #strcmp($seeking_gender, $other_gender) != 0 
        if( ($other_name == $user_name) || (!$gen_match) )
        {
            continue;
        }

        $check_os = match_os($other_os, $user_os);
        $check_otherAge = match_otherAgeChoice($other_max, $other_min, $user_age);
        $check_userAge =  match_userAgeChoice($user_max, $user_min, $other_age);
        $check_pMatch =  match_ptype($other_p_type, $user_p_type);
        #echo "{$check_os} {$check_pMatch}";
        #If user and other match in 4 criteria, post the match details
        if($check_otherAge && $check_userAge && $check_os && $check_pMatch)
        {   
            ++$matches;
            echo <<<EOT
                <div class="match">
                    <img src="user.jpg" alt="photo">
                    <div>
                        <ul>
                            <li>
                                <p>{$other_name}</p>
                            </li>
                            <li>
                                <strong>gender:</strong> {$other_gender}
                            </li>
                            <li>
                                <strong> age:</strong> {$other_age}
                            </li>
                            <li>
                                <strong> type:</strong> {$other_p_type}
                            </li>
                            <li>
                            <strong> OS:</strong> {$other_os}
                            </li>
                        </ul>
                    </div>
                </div>
            EOT;
        }
    }
    if($matches == 0) {
        echo "<div><p> Sorry! 0 matches found, we're still improving our algorithm!</p></div>";
    }
?>
    
<?php include("foot.html"); 