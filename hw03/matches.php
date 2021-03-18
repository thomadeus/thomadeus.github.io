<?php include("head.html"); ?>
<div>
    <form action="matches-submit.php" method="GET">
        <fieldset>
            <legend> Returning User: </legend>
            <strong class="column"> Name: </strong>
            <input type="text" name="name" maxlength="16" required><br><br>
            <input type="submit" value="View My Matches">
        </fieldset>
    </form>
</div>
<?php include("foot.html"); ?>