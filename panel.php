<?php 
include_once './dbh.php';
extractStoryboardId();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Create your panel</title>
    </head>
    <body>
        <form action="/storyboard.php" method="post">
            <label for="illustration"><b>Select your image</b></label><br>
            <select name="illustration" id="illustration">
                <option value="Option_1">Optie 1</option>
                <option value="Option_2">Optie 2</option>
                <option value="Option_3">Optie 3</option>
            </select>

            <br /><br />
            <label for="textballoon"><b>What should the textballoon say?</b></label><br>
            <input type="text" id="textballoon" name="textballoon" />
            <br><br>

            <label for="textarea"><b> Write your caption text </b></label><br>
            <textarea
                id="textarea"
                name="textarea"
                placeholder="Type your text"
            ></textarea>
            <br /><br />
            <input type="hidden" id="storyboard_id" name="storyboard_id" value="<?php echo extractStoryboardId() ?>">
            <input type="submit" value="Save Panel"/>
    
        </form>
    </body>
</html>
