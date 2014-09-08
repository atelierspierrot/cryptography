<?php
/**
 * Show errors at least initially
 *
 * `E_ALL` => for hard dev
 * `E_ALL & ~E_STRICT` => for hard dev in PHP5.4 avoiding strict warnings
 * `E_ALL & ~E_NOTICE & ~E_STRICT` => classic setting
 */
@ini_set('display_errors','1'); @error_reporting(E_ALL);
//@ini_set('display_errors','1'); @error_reporting(E_ALL & ~E_STRICT);
//@ini_set('display_errors','1'); @error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

/**
 * Set a default timezone to avoid PHP5 warnings
 */
$dtmz = @date_default_timezone_get();
date_default_timezone_set($dtmz?:'Europe/Paris');

// -----------------------------------
// NAMESPACE
// -----------------------------------

// get the Composer autoloader
if (file_exists($a = __DIR__.'/../../../autoload.php')) {
    require_once $a;
} elseif (file_exists($b = __DIR__.'/../vendor/autoload.php')) {
    require_once $b;

// else error, classes can't be found
} else {
    die('You need to run Composer on your project to use this interface!');
}

// -----------------------------------
// Page Content
// -----------------------------------

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Test & documentation of PHP "Cryptography" package</title>
<meta name="description" content="A set of PHP classes to crypt and uncrypt" />
<!-- Bootstrap -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" href="assets/styles.css" />
</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Cryptography</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul id="navigation_menu" class="nav navbar-nav" role="navigation">
<!--
                    <li><a href="index.php">Usage</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Tests <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="index.php?page=form">Test of a form field</a></li>
                        </ul>
                    </li>
-->
                </ul>
                <ul class="nav navbar-nav navbar-right" role="navigation">
                    <li><a href="#bottom" title="Go to the bottom of the page">&darr;</a></li>
                    <li><a href="#top" title="Back to the top of the page">&uarr;</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">

        <a id="top"></a>

        <header role="banner">
            <h1>The PHP "<em>Cryptography</em>" package <br><small>A set of PHP classes to crypt and uncrypt</small></h1>
            <div class="hat">
                <p>These pages show and demonstrate the use and functionality of the <a href="http://github.com/atelierspierrot/cryptography">atelierspierrot/cryptography</a> PHP package you just downloaded.</p>
            </div>
        </header>

        <div id="content" role="main">

            <h2>Namespace <code>SubstitutionCipher</code></h2>

<?php
$str = 'True friends stab you in the front';
$str_long = $str.' - Oscar Wilde';
$plain = \Cryptography\Cryptography::ALPHABET_UPPER.\Cryptography\Cryptography::SPACE;
?>

            <p>The example string used for these demonstrations is:</p>

            <blockquote><?php echo $str_long; ?></blockquote>

            <p>Or the shorten version:</p>

            <blockquote><?php echo $str; ?></blockquote>

            <p>The plain text key used is: "<code><?php echo $plain; ?></code>"</p>

            <h3><code>SubstitutionCipher\SimpleSubstitution</code></h3>

            <pre>
<?php

echo "> plain text key is : '$plain'".PHP_EOL;
$key = \Cryptography\Helper::randomize($plain);
echo "> ciphered key is : '$key'".PHP_EOL;

$c = new \Cryptography\SubstitutionCipher\SimpleSubstitution($plain, $key);
echo "> SimpleSubstitution object is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString(true, ' | ', PHP_EOL).PHP_EOL;
?>
            </pre>

            <p>Same example keeping spaces:</p>

            <pre>
<?php
$c->setFlag(\Cryptography\Cryptography::KEEP_SPACES);
$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;
$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;
?>
            </pre>

            <h3><code>SubstitutionCipher\Rotation</code></h3>

            <pre>
<?php

echo "> plain text key is : '$plain'".PHP_EOL;
$rot = 4;
echo "> rotation value is : '$rot'".PHP_EOL;

$c = new \Cryptography\SubstitutionCipher\Rotation($plain, $rot);
echo "> Rotation object is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString(true, ' | ', PHP_EOL).PHP_EOL;
?>
            </pre>

            <p>Same example keeping spaces:</p>

            <pre>
<?php
$c->setFlag(\Cryptography\Cryptography::KEEP_SPACES);
$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;
$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;
?>
            </pre>

            <h3><code>SubstitutionCipher\AffineSubstitution</code></h3>

            <pre>
<?php

echo "> plain text key is : '$plain'".PHP_EOL;
$a = 3;
$b = 5;
echo "> a is : '$a' & b is : '$b'".PHP_EOL;

$c = new \Cryptography\SubstitutionCipher\AffineSubstitution($a, $b, $plain);
echo "> AffineSubstitutionobject is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
//$crypted = $c->crypt('ELECTION'); // => RMRLKDVS
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString(true, ' | ', PHP_EOL).PHP_EOL;

?>
            </pre>

            <p>Same example keeping spaces:</p>

            <pre>
<?php
$c->setFlag(\Cryptography\Cryptography::KEEP_SPACES);
$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;
$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;
?>
            </pre>

            <h3><code>SubstitutionCipher\Inversion</code></h3>

            <pre>
<?php

echo "> plain text key is : '$plain'".PHP_EOL;

$c = new \Cryptography\SubstitutionCipher\Inversion($plain);
echo "> Inversion is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString(true, ' | ', PHP_EOL).PHP_EOL;

?>
            </pre>

            <p>Same example keeping spaces:</p>

            <pre>
<?php
$c->setFlag(\Cryptography\Cryptography::KEEP_SPACES);
$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;
$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;
?>
            </pre>

            <h3><code>SubstitutionCipher\SquareSubstitution</code></h3>

            <pre>
<?php

echo "> plain text key is : '$plain'".PHP_EOL;

$c = new \Cryptography\SubstitutionCipher\SquareSubstitution($plain);
echo "> SquareSubstitution is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString(true, ' | ', PHP_EOL).PHP_EOL;

?>
            </pre>

            <p>Same example keeping spaces:</p>

            <pre>
<?php
$c->setFlag(\Cryptography\Cryptography::KEEP_SPACES);
$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;
$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;
?>
            </pre>

            <h3><code>SubstitutionCipher\HomophonicSubstitution</code></h3>

            <pre>
<?php

$keys = array(
    'A' => array(1,28),
    'B' => array(2),
    'C' => array(3),
    'D' => array(4),
    'E' => array(5,29,33),
    'F' => array(6),
    'G' => array(7),
    'H' => array(8),
    'I' => array(9,30),
    'J' => array(10),
    'K' => array(11),
    'L' => array(12),
    'M' => array(13),
    'N' => array(14),
    'O' => array(15,31),
    'P' => array(16),
    'Q' => array(17),
    'R' => array(18),
    'S' => array(19),
    'T' => array(20),
    'U' => array(21,32),
    'V' => array(22),
    'W' => array(23),
    'X' => array(24),
    'Y' => array(25),
    'Z' => array(26),
    ' ' => array(27,34),
);
echo "> complex key are : ".PHP_EOL;
var_dump($keys);

$c = new \Cryptography\SubstitutionCipher\HomophonicSubstitution($keys);
echo "> HomophonicSubstitution is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString(true, ' | ', PHP_EOL).PHP_EOL;

?>
            </pre>

            <p>Same example keeping spaces:</p>

            <pre>
<?php
$c->setFlag(\Cryptography\Cryptography::KEEP_SPACES);
$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;
$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;
?>
            </pre>

            <h3><code>SubstitutionCipher\RepertorySubstitution</code></h3>

            <pre>
<?php

$keys = array(
    'true' => 1,
    'en' => 5,
    'A' => 28,
    'B' => 2,
    'C' => 3,
    'D' => 4,
    'E' => 29,
    'F' => 6,
    'G' => 7,
    'H' => 8,
    'I' => 30,
    'J' => 10,
    'K' => 11,
    'L' => 12,
    'M' => 13,
    'N' => 14,
    'O' => 31,
    'P' => 16,
    'Q' => 17,
    'R' => 18,
    'S' => 19,
    'T' => 20,
    'U' => 32,
    'V' => 22,
    'W' => 23,
    'X' => 24,
    'Y' => 25,
    'Z' => 26,
    ' ' => 34,
);
echo "> complex key are : ".PHP_EOL;
var_dump($keys);

$c = new \Cryptography\SubstitutionCipher\RepertorySubstitution($keys);
echo "> RepertorySubstitution is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString(true, ' | ', PHP_EOL).PHP_EOL;

?>
            </pre>

            <p>Same example keeping spaces:</p>

            <pre>
<?php
$c->setFlag(\Cryptography\Cryptography::KEEP_SPACES);
$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;
$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;
?>
            </pre>

            <h3><code>SubstitutionCipher\PolyAlphabeticSubstitution</code></h3>

            <pre>
<?php

echo "> plain text key is : '$plain'".PHP_EOL;
$freq = 5;
echo "> frequency value is : '$freq'".PHP_EOL;
$rot = 3;
echo "> rotation value is : '$rot'".PHP_EOL;

$c = new \Cryptography\SubstitutionCipher\PolyAlphabeticSubstitution($plain, $freq, $rot);
echo "> PolyAlphabeticSubstitution is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString(true, ' | ', PHP_EOL).PHP_EOL;

?>
            </pre>

            <p>Same example keeping spaces:</p>

            <pre>
<?php
$c->setFlag(\Cryptography\Cryptography::KEEP_SPACES);
$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;
$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;
?>
            </pre>



            <h3>Substitution presets</h3>

            <h4><code>SubstitutionTable\TabulaRecta</code></h4>

            <pre>
<?php
$c = new \Cryptography\SubstitutionTable\TabulaRecta(\Cryptography\Cryptography::ALPHABET_UPPER);
echo "> TabulaRecta is :".PHP_EOL.$c->substitutionTableToString().PHP_EOL;
?>
            </pre>

        </div>
    </div>

    <footer id="footer">
        <div class="container">
            <div class="text-muted pull-left">
                This page is <a href="" title="Check now online" id="html_validation">HTML5</a> & <a href="" title="Check now online" id="css_validation">CSS3</a> valid.
            </div>
            <div class="text-muted pull-right">
                <a href="http://github.com/atelierspierrot/cryptography">atelierspierrot/cryptography</a> package by <a href="https://github.com/piwi">@piwi</a> under <a href="http://opensource.org/licenses/GPL-3.0">GNU GPL v.3</a> license.
                <p class="text-muted small" id="user_agent"></p>
            </div>
        </div>
    </footer>

    <div id="message_box" class="msg_box"></div>
    <a id="bottom"></a>

<!-- jQuery lib -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<!-- jQuery.tablesorter plugin
<script src="assets/js/jquery.tablesorter.min.js"></script>
-->

<!-- jQuery.highlight plugin -->
<script src="assets/js/highlight.js"></script>

<!-- scripts for demo -->
<script src="assets/scripts.js"></script>

<script>
$(function() {
    getToHash();
    addCSSValidatorLink('assets/styles.css');
    addHTMLValidatorLink();
    $("#user_agent").html( navigator.userAgent );
    $('pre').each(function(i,o) {
        var dl = $(this).attr('data-language');
        if (dl) {
            $(this).addClass('code')
                .highlight({indent:'tabs', code_lang: 'data-language'});
        }
    });
    initHandler('classinfo', true);
    initHandler('plaintext', true);
});
</script>
</body>
</html>
