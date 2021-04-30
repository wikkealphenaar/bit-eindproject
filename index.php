<!--
    1. Make New storyboard -> create new storyboard ID and save to storyboard tabel.
    2. Create panel -> krijg huidie storyboard id mee.
    3. panel input naar panel tabel.
    4. panel tabel gekoppeld aan storyboard tabel
    5. Save Storyboard -> save storyboard tabel

    7. Make storyboard names visible index page
     -------
    6. Print panels on storyboardpage
   
    8. make storyboard clickable on index page.
    9. Create SVG illustration options.
    10. Make textinput appear in SVG (on storyboard page)

    LATER:
    maak foutmelding als er geen titel is ingevoerd 

-->

<?php
include_once './dbh.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<h1> Your Storyboards</h1> 

<ol>
    <?php printStoryboards($pdo); ?>
</ol>
<!-- TO DO: maak foutmelding als er geen titel is ingevoerd -->
<form action="/storyboard.php" method="get">
    <label for="title"><b>Name your new storyboard</b></label><br>
            <input type="text" id="title" name="title"/>
            <br>
            <input type="submit" value="Make new storyboard" />
</form>
</body>
</html>

