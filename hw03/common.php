<?php 
    function match_os($s1, $s2)
    {
       return (strcmp($s1,$s2) === 0) ? true : false;
    }

    #true if user's age is within other member's age preference
    function match_otherAgeChoice($max, $min, $user_age)
    {
        return ($user_age >= $min && $user_age <= $max) ? true : false;
    }

    #true if other user's age is within range of user age preference
    function match_userAgeChoice($max, $min, $other_age)
    {
        return ($other_age >= $min && $other_age <= $max) ? true : false;
    }

    #true if atleast one personality type letter is the same as another in the same index in each string
    function match_ptype ($other_ptype, $user_ptype)
    {
        $p_reg = "/[".$user_ptype."]/";
        return (preg_match($p_reg, $other_ptype) === 1) ? true : false;
    }

    # return true only if $pos1 && $pos2 == true
    # $pos1 = false if other member's gender is not found in gender(s) user is seeking
    # $pos2 = false if user's gender is not found in gender(s) other member is seeking
    function check_genders ($ugen, $useek, $ogen, $oseek)
    {
        $pos1 = strrpos($useek, $ogen);
        $pos2 = strrpos($oseek, $ugen);

        return ($pos1 === false || $pos2 === false) ? false : true;
        #return (str_contains($useek, $ogen) && str_contains($oseek, $ugen));
    }

    // function get_seeking ($input)
    // {
    //     $seeking ="";
    //     foreach($input as $value)
    //     {
    //         $seeking = $seeking.$value;
    //     }
    //     echo "user is seeking: " .$seeking."\n";
    //     return $seeking;
    // }
    
   
    
?>