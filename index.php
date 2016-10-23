<?php

session_start();
require __DIR__ . '/vendor/autoload.php';


use Gregwar\Captcha\CaptchaBuilder;
use Respect\Validation\Validator as v;

$builder = new CaptchaBuilder;
$msgCaptcha = '';
$msgName = '';
$msgEmail = '';

$usernameValidator = v::alnum()->noWhitespace()->length(3, 15);

if (isset($_POST['name'])) {
    if ($usernameValidator->validate($_POST['name'])) {
        $validName = TRUE;
    }
    else {
        $msgName = 'Wrong name or empty name';
    }
}

if (isset($_POST['email'])) {
    if(v::email()->validate($_POST['email'])) {
        $validEmail = TRUE;
    }
    else {
        $msgEmail = 'Wrong or empty email';
    }

}

if (isset($_POST['phrase'])) {
    if($_POST['phrase'] == $_SESSION['phrase']) {
        $validCaptcha = TRUE;
    }
    else {
        $msgCaptcha = 'Wrong or empty captcha';
    }
}

if (isset($validName) && isset($validEmail) && isset($validCaptcha)) {
    header('Location: helloworld.php');
    exit();
}

$builder->build();
$_SESSION['phrase'] = $builder->getPhrase();
?>

<html>
<head>
    <title>GeekHub Homework #2</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form method="post">
    <h3>GeekHub Homerwork #2</h3>
    <div class="row">
        <div class="four columns">
            <label class='label' for="name">Your name <span class="customText">(no whitespace and length between 3 and 15.)</span></label>
            <input class="u-full-width" placeholder="My Name" name="name" id="name" type="text" >
            <?=$msgName?></p>
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="email">Your email</label>
            <input class="u-full-width" placeholder="myemail@example.com" name="email" id="email" type="text">
            <?=$msgEmail?></p>
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="phrase">Enter the Captcha</label>
            <p><img src="<?=$builder->inline(); ?>" /><br>
            <?=$msgCaptcha?></p>
            <input class="u-full-width" name="phrase" id="phrase" type="text" value="">
        </div>
    </div>

    <input class="button-primary" value="Submit" type="submit">
</form>
</body>
</html>
