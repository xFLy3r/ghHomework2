<?php

require __DIR__ . '/vendor/autoload.php';


use Gregwar\Captcha\CaptchaBuilder;
use Respect\Validation\Validator as v;

$builder = new CaptchaBuilder;
$builder->build();

$number = 123 . 's';
echo v::numeric()->validate($number);

?>

<html>
<head>
    <title>GeekHub Homework #2</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form>
    <h3>GeekHub Homerwork #2</h3>
    <div class="row">
        <div class="four columns">
            <label for="nameInput">Your name</label>
            <input class="u-full-width" placeholder="My Name" name="nameInput" id="nameInput" type="text">
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="emailInput">Your email</label>
            <input class="u-full-width" placeholder="myemail@example.com" name="emailInput" id="emailInput" type="email">
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="Enter the captcha:">Enter the Captcha:</label>
            <p><img src="<?php echo $builder->inline(); ?>" /></p>
            <input class="u-full-width" placeholder="captcha" name="captchaInput" id="captchaInput" type="text">
        </div>
    </div>

    <input class="button-primary" value="Submit" type="submit">
</form>
</body>
</html>
