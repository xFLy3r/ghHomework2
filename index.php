<?php

session_start();
require __DIR__ . '/vendor/autoload.php';


use Gregwar\Captcha\CaptchaBuilder;
use Respect\Validation\Validator as v;

$builder = new CaptchaBuilder;
$msg = '';

if (isset($_POST['phrase'])) {
    if($_POST['phrase'] == $_SESSION['phrase']) {

    }
    else {
        $msg = 'Wrong or empty captcha';
    }
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
            <label for="name">Your name</label>
            <input class="u-full-width" placeholder="My Name" name="name" id="name" type="text" >
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="email">Your email</label>
            <input class="u-full-width" placeholder="myemail@example.com" name="email" id="email" type="email">
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="phrase">Enter the Captcha</label>
            <p><img src="<?=$builder->inline(); ?>" /><br>
            <?=$msg?></p>
            <input class="u-full-width" name="phrase" id="phrase" type="text" value="">
        </div>
    </div>

    <input class="button-primary" value="Submit" type="submit">
</form>
</body>
</html>
