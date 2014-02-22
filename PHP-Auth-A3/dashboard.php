<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/10/14
 * Time: 7:23 PM
 */

require __DIR__ . '/vendor/autoload.php';
require_once 'db.php';

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Carbon\Carbon;
use ITP\Songs\SongQuery;

$session = new Session();
$session->start();

if(!$session->has('email')) {
    //This is if they have logged in already and the email is stored in the session
    $session->getFlashBag()->add('message','Please log in');
    $redirect = new RedirectResponse('login.php');
    $redirect->send();
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Music Dashboard</title>
</head>
<body>
<?php foreach($session->getFlashBag()->get('login',array()) as $message) {
    echo "<div id='flashMessage' style='color:#008000;'>$message</div>";
}
?>
<div class="pure-g">
<div class="pure-u-4-5">
<h1>Music Dashboard</h1>
</div>
<div class="pure-u-1-5">
    <div id="rightDisplay">
        Username: <?php echo $session->get('username'); ?>
        <br />
        Email: <?php echo $session->get('email'); ?>
        <br />
        Last Login: <?php echo $session->get('timestamp')->diffForHumans(); ?>
        <br />
        <a href="logout.php">Sign Out</a>
    </div>
</div>
</div>

<?php
$songQuery = new SongQuery($pdo);
$songs = $songQuery
    ->withArtist()
    ->withGenre()
    ->orderBy('title')
    ->all();
?>

<table id="musicTable" class="pure-table">
    <thead>
    <tr>
    <th>Title</th>
    <th>Artist</th>
    <th>Genre</th>
    <th>Price</th>
    </tr>
    </thead>
    <?php foreach($songs as $song) : ?>
        <tr>
            <td><?php echo $song->title; ?></td>
            <td><?php echo $song->artist_name; ?></td>
            <td><?php echo $song->genre; ?></td>
            <td><?php echo $song->price; ?></td>
        </tr>
    <?php endforeach ?>
</table>

</body>
</html>