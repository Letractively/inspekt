<?php
/**
 * Demonstration of:
 * - use of static filter methods on arrays
 * - creating a cage on an arbitrary array
 * - accessing a deep key in a multidim array with the "Array Query" approach
 */


set_include_path(get_include_path().PATH_SEPARATOR.dirname(dirname(__FILE__)));

require_once('Inspekt.php');

echo "<p>Filtering an arbitrary array using Inspekt::noTags()</p>\n\n";

$d = array();
$d['input'] = '<img id="475">yes</img>';
$d[] = array('foo', 'bar<br />', 'yes<P>', 1776);
$d['x']['woot'] = array('booyah'=>'meet at the bar at 7:30 pm',
						'ultimate'=>'<strong>hi there!</strong>',
						);

$d['lemon'][][][][][][][][][][][][][][] = 'far';

echo "<pre>BEFORE:"; echo var_dump($d); echo "</pre>\n";

$newd = Inspekt::noTags($d);

echo "<pre>noTags:"; echo var_dump($newd); echo "</pre>\n";

$newd = Inspekt::getDigits($d);

echo "<pre>getDigits:"; echo var_dump($newd); echo "</pre>\n";

$d_cage = Inspekt_Cage::Factory($d);

echo "<pre>getAlpha('/x/woot/utimate') "; echo var_export($d_cage->getAlpha('/x/woot/ultimate')); echo "</pre>\n";

echo "<pre>getAlpha('lemon/0/0/0/0/0/0/0/0/0/0/0/0/0') "; echo var_export($d_cage->getAlpha('lemon/0/0/0/0/0/0/0/0/0/0/0/0/0')); echo "</pre>\n";

$x = $d_cage->getAlpha('x');
echo "<pre>"; echo var_export($x); echo "</pre>\n";
