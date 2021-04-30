<?php
include_once './dbh.php';
saveStoryboardData($pdo);
getStoryboardId($pdo);
savePanelData($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your storyboard</title>
</head>
<body>

<h1> <?php printTitle($pdo); ?> </h1>
<br><br>
<form action="/panel.php" method="get">
    <input type="hidden" id="storyboard_id" name="storyboard_id" value="<?php echo getStoryboardId($pdo) ?>">
    <input type="submit" value="Create panel">
</form>

<br>
<form action="/index.php" method="get">
    <input type="submit" value="Save storyboard">
</form>

<?php printPanels($pdo) ?>
   
</body>
</html>