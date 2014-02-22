<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/10/14
 * Time: 7:23 PM
 */

require __DIR__ . "/vendor/autoload.php";
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

$session = new Session();
$session->start();
if($session->has('email')) {
    //This is if they have logged in already and the email is stored in the session
    $session->getFlashBag()->add('login','You are already logged in!');
    $redirect = new RedirectResponse('dashboard.php');
    $redirect->send();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Music Login</title>
</head>
<body>
<?php foreach($session->getFlashBag()->get('message',array()) as $message) {
    echo "<div id='flashMessage' style='color:#A33202'>$message</div>";
}
?>
<h1>Sign In:</h1>
<form method="post" action="login-process.php" class="pure-form">
    <div>
        <input type="text" name="username" placeholder="Username">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="password" placeholder="Password">
    </div>
    <div id="submitButton">
        <input type="submit" value="Submit">
    </div>
</form>
</body>
</html>
