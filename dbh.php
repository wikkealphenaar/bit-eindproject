<?php

//set up
$host = '192.168.64.2';
$db   = 'storyboard';
$user = 'root';
$pass = 'vifsaw-banfo5-wIgryj';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    ];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
};

//functions

//create quotes for seperate strings as values in databse
function komma($no)
{
    return  "'$no'";
};


// visit storyboard page from index page (with get-method)
function getTitle()
{
    $getTitle = $_GET["title"];
    return $getTitle;
};
    

// print Title
function printTitle($pdo)
{
    if (isset($_POST["storyboard_id"])) {
        $storyboardIdFromPanels = $_POST["storyboard_id"];
        $query = "SELECT title FROM storyboards WHERE id = $storyboardIdFromPanels";
        $title = $pdo->query($query)->fetch();
        echo $title['title'];
    } else {
        echo getTitle();
    }
}

// Save Title in storyboard table and give id to panel page
function saveStoryboardData($pdo) 
{
    if (!isset($_POST["storyboard_id"])) {
        $getTitle = getTitle();
        $query = "INSERT INTO storyboards (title) VALUES ('$getTitle')";
        $pdo->exec($query);
    }
};

// Get storyboard ID from database
function getStoryboardId($pdo)
{
    if (isset($_POST["storyboard_id"])) {
        $storyboardIdFromPanels = $_POST["storyboard_id"];
        $getStoryboardId = $storyboardIdFromPanels;
        return $getStoryboardId;
    } else {
        $storyboardId =  $pdo->lastInsertId("storyboards.id");
        return $storyboardId;
    }
};

// Bring storyboard ID to panels page
function extractStoryboardId()
{
    $getStoryboardId = $_GET["storyboard_id"];
    return $getStoryboardId;
};

// visit storyboard page from panal page (with post-method)
function savePanelData($pdo)
{
    if (array_key_exists('storyboard_id', $_POST)) {
        $columnNames = implode(", ", array_keys($_POST));
        $values = implode(", ", array_map('komma', array_values($_POST)));
        $query = "INSERT INTO panels ($columnNames) VALUES ($values)";
        $pdo->exec($query);
        return ($titleFromDatabase);
    }
};

// print paneldata from database on storyboard page.
function printPanels($pdo){
    $query = "SELECT * FROM panels";
    $panelData = $pdo->query($query)->fetchAll();
    foreach ($panelData as $panel) {
        $panelNumber = $panel['id'];
        echo "
        <h3> Panel $panelNumber </h3>
        <li> $panel[illustration] </li>
        <li> $panel[textballoon] </li>
        <li> $panel[textarea] </li>
        ";

    };
}

// print storyboardnames from database on index page.
function printStoryboards($pdo){
    $query = "SELECT title FROM storyboards";
    $title = $pdo->query($query)->fetchAll();
    foreach ($title as $storyboard) {
        $titleStoryboard = $storyboard['title'];
        echo "<li>$titleStoryboard</li>";
    }
}
