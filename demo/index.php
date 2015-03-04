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

$str_usdi = <<<EOT
When in the course of human Events, it becomes necessary for one People to dissolve the Political Bands which have connected them with another, and to assume among the Powers of the Earth, the separate and equal Station to which the Laws of Nature and of Nature’s God entitle them, a decent Respect to the Opinions of Mankind requires that they should declare the causes which impel them to the Separation.

We hold these Truths to be self-evident, that all Men are created equal, that they are endowed by their Creator with certain unalienable Rights, that among these are Life, Liberty, and the pursuit of Happiness—-That to secure these Rights, Governments are instituted among Men, deriving their just Powers from the Consent of the Governed, that whenever any Form of Government becomes destructive of these Ends, it is the Right of the People to alter or abolish it, and to institute a new Government, laying its Foundation on such Principles, and organizing its Powers in such Form, as to them shall seem most likely to effect their Safety and Happiness. Prudence, indeed, will dictate that Governments long established should not be changed for light and transient Causes; and accordingly all Experience hath shewn, that Mankind are more disposed to suffer, while Evils are sufferable, than to right themselves by abolishing the Forms to which they are accustomed. But when a long Train of Abuses and Usurpations, pursuing invariably the same Object, evinces a Design to reduce them under absolute Despotism, it is their Right, it is their Duty, to throw off such Government, and to provide new Guards for their future Security. Such has been the patient Sufferance of these Colonies; and such is now the Necessity which constrains them to alter their former Systems of Government. The History of the Present King of Great-Britain is a History of repeated Injuries and Usurpations, all having in direct Object the Establishment of an absolute Tyranny over these States. To prove this, let Facts be submitted to a candid World.

He has refused his Assent to Laws, the most wholesome and necessary for the public Good.

He has forbidden his Governors to pass Laws of immediate and pressing Importance, unless suspended in their Operation till his Assent should be obtained; and when so suspended, he has utterly neglected to attend to them.

He has refused to pass other Laws for the Accommodation of large Districts of People; unless those People would relinquish the Right of Representation in the Legislature, a Right inestimable to them, and formidable to Tyrants only.

He has called together Legislative Bodies at Places unusual, uncomfortable, and distant from the Depository of their public Records, for the sole Purpose of fatiguing them into Compliance with his Measures.

He has dissolved Representative Houses repeatedly, for opposing with manly Firmness his Invasions on the Rights of the People.

He has refused for a long Time, after such Dissolutions, to cause others to be elected; whereby the Legislative Powers, incapable of Annihilation, have returned to the People at large for their exercise; the State remaining in the mean time exposed to all the Dangers of Invasion from without, and Convulsions within.

He has endeavoured to prevent the Population of these States; for that Purpose obstructing the Laws for Naturalization of Foreigners; refusing to pass others to encourage their Migrations hither, and raising the Conditions of new Appropriations of Lands.

He has obstructed the Administration of Justice, by refusing his Assent to Laws for establishing Judiciary Powers.

He has made Judges dependent on his Will alone, for the Tenure of their Offices, and Amount and Payment of their Salaries.

He has erected a Multitude of new Offices, and sent hither Swarms of Officers to harass our People, and eat out their Substance.

He has kept among us, in Times of Peace, Standing Armies, without the consent of our Legislature.

He has affected to render the Military independent of and superior to the Civil Power.

He has combined with others to subject us to a Jurisdiction foreign to our Constitution, and unacknowledged by our Laws; giving his Assent to their Acts of pretended Legislation:

For quartering large Bodies of Armed Troops among us:

For protecting them, by a mock Trial, from Punishment for any Murders which they should commit on the Inhabitants of these States:

For cutting off our Trade with all Parts of the World:

For imposing taxes on us without our Consent:

For depriving us, in many Cases, of the Benefits of Trial by Jury:

For transporting us beyond Seas to be tried for pretended Offences:

For abolishing the free System of English Laws in a neighbouring Province, establishing therein an arbitrary Government, and enlarging its Boundaries, so as to render it at once an Example and fit Instrument for introducing the same absolute Rule in these Colonies:

For taking away our Charters, abolishing our most valuable Laws, and altering fundamentally the Forms of our Governments:

For suspending our own Legislatures, and declaring themselves invested with Powers to legislate for us in all Cases whatsoever.

He has abdicated Government here, by declaring us out of his Protection and waging War against us.

He has plundered our Seas, ravaged our Coasts, burnt our Towns, and destroyed the Lives of our People.

He is, at this Time, transporting large Armies of foreign Mercenaries to compleat the Works of Death, Desolation, and Tyranny, already begun with circumstances of Cruelty and Perfidy, scarcely paralleled in the most barbarous Ages, and totally unworthy the Head of a civilized Nation.

He has constrained our fellow Citizens taken Captive on the high Seas to bear Arms against their Country, to become the Executioners of their Friends and Brethren, or to fall themselves by their Hands.

He has excited domestic Insurrections among us, and has endeavoured to bring on the Inhabitants of our Frontiers, the merciless Indian Savages, whose known Rule of Warfare, is an undistinguished Destruction, of all Ages, Sexes and Conditions.

In every stage of these Oppressions we have Petitioned for Redress in the most humble Terms: Our repeated Petitions have been answered only by repeated Injury. A Prince, whose Character is thus marked by every act which may define a Tyrant, is unfit to be the Ruler of a free People.

Nor have we been wanting in Attentions to our British Brethren. We have warned them from Time to Time of Attempts by their Legislature to extend an unwarrantable Jurisdiction over us. We have reminded them of the Circumstances of our Emigration and Settlement here. We have appealed to their native Justice and Magnanimity, and we have conjured them by the Ties of our common Kindred to disavow these Usurpations, which, would inevitably interrupt our Connections and Correspondence. They too have been deaf to the Voice of Justice and of Consanguinity. We must, therefore, acquiesce in the Necessity, which denounces our Separation, and hold them, as we hold the rest of Mankind, Enemies in War, in Peace, Friends.

We, therefore, the Representatives of the United States of America, in General Congress, Assembled, appealing to the Supreme Judge of the World for the Rectitude of our Intentions, do, in the Name, and by the Authority of the good People of these Colonies, solemnly Publish and Declare, That these United Colonies are, and of Right ought to be, Free and Independent States; that they are absolved from all Allegiance to the British Crown, and that all political Connection between them and the State of Great-Britain, is and ought to be totally dissolved; and that as Free and Independent States, they have full Power to levy War, conclude Peace, contract Alliances, establish Commerce, and to do all other Acts and Things which Independent States may of right do. And for the support of this Declaration, with a firm Reliance on the Protection of the divine Providence, we mutually pledge to each other our Lives, our Fortunes, and our sacred Honor.
EOT;
?>

            <p>The example string used for these demonstrations is:</p>

            <blockquote><?php echo $str_long; ?></blockquote>

            <p>Or the shorten version:</p>

            <blockquote><?php echo $str; ?></blockquote>

            <p>The plain text key used is: "<code><?php echo $plain; ?></code>"</p>

            <h3><code>SubstitutionCipher\Simple</code></h3>

            <pre>
<?php

echo "> plain text key is : '$plain'".PHP_EOL;
$key = \Cryptography\Helper::randomize($plain);
echo "> ciphered key is : '$key'".PHP_EOL;

$c = new \Cryptography\SubstitutionCipher\Simple($plain, $key);
echo "> Simple object is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString().PHP_EOL;
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

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString().PHP_EOL;
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

            <h3><code>SubstitutionCipher\Affine</code></h3>

            <pre>
<?php

echo "> plain text key is : '$plain'".PHP_EOL;
$a = 3;
$b = 5;
echo "> a is : '$a' & b is : '$b'".PHP_EOL;

$c = new \Cryptography\SubstitutionCipher\Affine($a, $b, $plain);
echo "> Affineobject is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
//$crypted = $c->crypt('ELECTION'); // => RMRLKDVS
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString().PHP_EOL;

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

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString().PHP_EOL;

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

            <h3><code>SubstitutionCipher\Square</code></h3>

            <pre>
<?php

echo "> plain text key is : '$plain'".PHP_EOL;

$c = new \Cryptography\SubstitutionCipher\Square($plain);
echo "> Square is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString().PHP_EOL;

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

            <h3><code>SubstitutionCipher\Homophonic</code></h3>

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

$c = new \Cryptography\SubstitutionCipher\Homophonic($keys);
echo "> Homophonic is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString().PHP_EOL;

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

            <h3><code>SubstitutionCipher\Repertory</code></h3>

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

$c = new \Cryptography\SubstitutionCipher\Repertory($keys);
echo "> Repertory is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString().PHP_EOL;

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

            <h3><code>SubstitutionCipher\Book</code></h3>

            <pre>
<?php

echo "> the text used is the US Declaration of Independence (see below) ".PHP_EOL;

$c = new \Cryptography\SubstitutionCipher\Book($str_usdi);

$crypted = str_replace('  ', ' ', implode(' ', $c->crypt($str, true)));
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt(explode(' ', $crypted));
echo "> decrypted string is : ".$decrypted.PHP_EOL;

?>
            </pre>

            <h3><code>SubstitutionCipher\PolyAlphabetic</code></h3>

            <pre>
<?php

echo "> plain text key is : '$plain'".PHP_EOL;
$freq = 5;
echo "> frequency value is : '$freq'".PHP_EOL;
$rot = 3;
echo "> rotation value is : '$rot'".PHP_EOL;

$c = new \Cryptography\SubstitutionCipher\PolyAlphabetic($plain, $freq, $rot);
echo "> PolyAlphabetic is : ".PHP_EOL;
echo var_export($c,1).PHP_EOL;

$crypted = $c->crypt($str);
echo "> crypted string is : ".$crypted.PHP_EOL;

$decrypted = $c->decrypt($crypted);
echo "> decrypted string is : ".$decrypted.PHP_EOL;

echo "> substitution table is:".PHP_EOL.$c->substitutionTableToString().PHP_EOL;

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

<?php
$str = "All human beings are born free and equal in dignity and rights. They are endowed with reason and conscience and should act towards one another in a spirit of brotherhood. Everyone is entitled to all the rights and freedoms set forth in this Declaration, without distinction of any kind, such as race, colour, sex, language, religion, political or other opinion, national or social origin, property, birth or other status. Furthermore, no distinction shall be made on the basis of the political, jurisdictional or international status of the country or territory to which a person belongs, whether it be independent, trust, non-self-governing or under any other limitation of sovereignty.";
$plaintext_key = \Cryptography\Cryptography::ALPHABET_UPPER.',-.'.\Cryptography\Cryptography::ALPHABET_LOWER;
?>

            <p>The example string used for these presets demonstrations is:</p>

            <blockquote><?php echo $str; ?></blockquote>

            <p>The plaintext key used for these demonstrations is:</p>

            <pre><?php echo $plaintext_key; ?></pre>

            <h4><code>Preset\CaesarCipher</code></h4>
<?php
$c = new \Cryptography\Preset\CaesarCipher(13, $plaintext_key);
$crypted = $c->crypt($str);
$decrypted = $c->decrypt($crypted);
?>
            <h5>Crypted version is:</h5>

            <bockquote><?php echo $crypted.PHP_EOL; ?></bockquote>

            <h5>Decrypted version is:</h5>

            <bockquote><?php echo $decrypted.PHP_EOL; ?></bockquote>

            <h4><code>Preset\AtbashCipher</code></h4>
<?php
$c = new \Cryptography\Preset\AtbashCipher($plaintext_key);
$crypted = $c->crypt($str);
$decrypted = $c->decrypt($crypted);
?>
            <h5>Crypted version is:</h5>

            <bockquote><?php echo $crypted.PHP_EOL; ?></bockquote>

            <h5>Decrypted version is:</h5>

            <bockquote><?php echo $decrypted.PHP_EOL; ?></bockquote>

            <h4><code>Preset\PolybeSquareCipher</code></h4>
<?php
$c = new \Cryptography\Preset\PolybeSquareCipher($plaintext_key);
$crypted = $c->crypt($str);
$decrypted = $c->decrypt($crypted);
?>
            <h5>Crypted version is:</h5>

            <bockquote><?php echo $crypted.PHP_EOL; ?></bockquote>

            <h5>Decrypted version is:</h5>

            <bockquote><?php echo $decrypted.PHP_EOL; ?></bockquote>

            <h4><code>Preset\BealeCipher</code></h4>
<?php
$c = new \Cryptography\Preset\BealeCipher($str_usdi);
$crypted = $c->crypt($str);
$decrypted = $c->decrypt($crypted);
?>
            <h5>Crypted version is:</h5>

            <bockquote><?php echo $crypted.PHP_EOL; ?></bockquote>

            <h5>Decrypted version is:</h5>

            <bockquote><?php echo $decrypted.PHP_EOL; ?></bockquote>

            <h4><code>Preset\VigenereCipher</code></h4>

<?php
$key = strtoupper('ateliers pierrot cryptography');
$c = new \Cryptography\Preset\VigenereCipher($key, \Cryptography\Cryptography::ALPHABET_UPPER);
$crypted = $c->crypt($str);
$decrypted = $c->decrypt($crypted);
?>
            <p>This Vigenère cipher demonstration uses the following key: <code><?php echo $key; ?></code></p>

            <h5>Crypted version is:</h5>

            <bockquote><?php echo $crypted.PHP_EOL; ?></bockquote>

            <h5>Decrypted version is:</h5>

            <bockquote><?php echo $decrypted.PHP_EOL; ?></bockquote>

            <h4><code>SubstitutionTable\TabulaRecta</code></h4>

            <pre>
<?php
$c = new \Cryptography\SubstitutionTable\TabulaRecta(\Cryptography\Cryptography::ALPHABET_UPPER);
echo "> TabulaRecta is :".PHP_EOL.$c->substitutionTableToString().PHP_EOL;
?>
            </pre>

            <h2>Namespace <code>Analysis</code></h2>

            <p>For this part, we will use the original text of the United States Declaration of Independence (<a href="https://en.wikisource.org/wiki/United_States_Declaration_of_Independence">source on <em>Wikisource</em></a>).</p>

            <h3><code>Analysis\Frequency</code></h3>

            <p>Frequency analysis of letters:</p>

            <pre>
<?php
$c = new \Cryptography\Analysis\Frequency(\Cryptography\Cryptography::SCOPE_LETTER);
$c->process($str_usdi);
var_dump($c->analysis);
?>
            </pre>

            <p>Frequency analysis of words:</p>

            <pre>
<?php
$c = new \Cryptography\Analysis\Frequency(\Cryptography\Cryptography::SCOPE_WORD);
$c->process($str_usdi);
var_dump($c->analysis);
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
                <a href="http://github.com/atelierspierrot/cryptography">atelierspierrot/cryptography</a> package by <a href="https://github.com/piwi">@piwi</a> under <a href="http://www.apache.org/licenses/LICENSE-2.0">Apache 2.0</a> license.
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
