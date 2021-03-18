<?php include("./head.html"); ?>
<div>
    <form action="signup-submit.php" method="POST">
        <fieldset>
            <legend>New User Signup:</legend>
            
            <!-- Name form -->
            <label for="name"><strong class="column">Name:</strong>
                <input type="text" name="name" id="name" size="17" maxlength="16" required><br><br>
            </label>

            <!-- Gender form -->
            <strong class="column">Gender:</strong>
            <label for="male">
                <input type="radio" name="gender" id="male" value="M">
                Male
            </label>
            <label for="female">
                <input type="radio" name="gender" id="female" value="F" checked="checked">
                Female<br><br>
            </label>
            
            <!-- Age form -->
            <label for="age"><strong class="column">Age:</strong>
                <input type="text" name="age" id="age" size="6" maxlength="2" required><br><br>
            </label>

            <!-- Personality type form -->
            <label for="p_type"><strong class="column">Personality type:</strong>
                <input type="text" name="p_type" id="p_type" size="6" maxlength="4" required>
                <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type?)</a><br><br>
            </label>

            <!-- Favorite os form -->
            <strong class="column">Favorite OS:</strong>
            <select name="os">
                <option selected="selected">Windows</option>
                <option>Mac OS X</option>
                <option>Linux</option>
            </select><br><br>

            <!-- Seeking age form -->
            <strong class="column">Seeking Age:</strong>
            <input type="text" name="seek_min" size="6" maxlength="2" placeholder="min" required> to
            <input type="text" name="seek_max" size="6" maxlength="2" placeholder="max" required><br><br>

            <!-- Seeking gender form -->
            <strong class="column">Seeking Gender(s):</strong>
            <label for="seeking_male">
                <input type="checkbox" name="seeklist[]" id="seeking_male" value="M">
                Male
            </label>
            <label for="seeking_female">
                <input type="checkbox" name="seeklist[]" id="seeking_female" value="F" checked="checked">
                Female<br>
            </label>

            <input type="submit" value="Sign Up">
        </fieldset>
    </form>
</div>

<?php include("./foot.html"); ?>
