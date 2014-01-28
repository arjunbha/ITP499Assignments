<head><LINK href="style.css" rel="stylesheet" type="text/css"></head>
<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 1/21/14
 * Time: 5:30 PM
 */

$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$pass = 'ttrojan';

$title = $_GET['title']; //$_REQUEST['artist']
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$sql = "
    SELECT DISTINCT title, rating, genre, format
    FROM dvd_titles
        INNER JOIN formats
        ON dvd_titles.format_id = formats.id
        INNER JOIN genres
        ON dvd_titles.genre_id = genres.id
        INNER JOIN ratings
        ON dvd_titles.rating_id = ratings.id
     WHERE title LIKE ?;
";

$statement = $pdo->prepare($sql);

$like = '%'.$title.'%';
$statement->bindParam(1, $like);

$statement->execute();
$movies = $statement->fetchAll(PDO::FETCH_OBJ);

//var_dump($songs);
?>

<?php
if(empty($movies)) {
   echo "<h3>No movies found from your search: \"$title.\"</h3>";
   echo "<a href='search.php'>Click here to return to the search page.</a>";
}
else {
    $count = count($movies);
    echo "<h1>You searched for \"$title\"</h1>";
    echo "<h4>There were $count movies found.</h2>";
    echo "<a href='search.php'>Click here to return to the search page.</a>";
}
?>

<?php foreach ($movies as $movie) : ?>
    <div class="movie">
        <h3><?php echo $movie->title; ?></h3>
        <p>Rating: <?php echo $movie->rating; ?></p>
        <p>Genre: <?php echo $movie->genre; ?></p>
        <p>Format: <?php echo $movie->format; ?></p>
    </div>
<?php endforeach; ?>