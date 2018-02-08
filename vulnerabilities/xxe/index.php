<?php

function field($label, $name, $type)
{
	return "
		<div class='form-group'>
			<label>".$label."</label>
			<input type=".$type." class='form-control' name=".$name.">
		</div>
	";
}


define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerability: XXE (XML External Entity)' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'xxe';
$page[ 'help_button' ]   = 'xxe';
$page[ 'source_button' ] = 'xxe';

dvwaDatabaseConnect();

$method            = 'GET';
$vulnerabilityFile = 'low.php';
/*
switch( $_COOKIE[ 'security' ] ) {
	case 'low':
		$vulnerabilityFile = 'low.php';
		break;
	case 'medium':
		$vulnerabilityFile = 'medium.php';
		$method = 'POST';
		break;
	case 'high':
		$vulnerabilityFile = 'high.php';
		break;
	default:
		$vulnerabilityFile = 'impossible.php';
		break;
}
*/

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/xxe/source/{$vulnerabilityFile}";


$page[ 'body' ] .= "
<div class=\"body_padded\" class='col-md-6'>
	<h1>Vulnerability: XXE (XML External Entity)</h1>

	<div class=\"vulnerable_code_area\">";

	$page[ 'body' ] .= "
		<form action=\"#\" method=\"{$method}\" >
			<p>";
	$page[ 'body' ] .= "<div class='form-group'>
			<label>Data</label>
			<textarea class='form-control' name='data' rows='10'><?xml version='1.0' standalone='yes'?>
				<creds>
					<user>mehdi</user>
					<pass>mypass</pass>
				</creds>
			</textarea>
		</div>";

	$page[ 'body' ] .= "\n				<input type=\"submit\" class='btn btn-primary' name=\"Submit\" value=\"Submit\">
			</p>\n";

	$page[ 'body' ] .= "
		</form>";

if (isset($user)){
	$page[ 'body' ] .= "$user";
}

	$page[ 'body' ] .= "
			{$html}
		</div>


	</div>\n";


$page[ 'body' ] .= 
"<div>
		<div class='info'>
			<div>

			</div>
		</div>
		<h2>More Information</h2>
		<ul>
			<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Mass_Assignment_Cheat_Sheet' ) . "</li>
			<li>" . dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/Mass_assignment_vulnerability' ) . "</li>
			<li>" . dvwaExternalLinkUrlGet( 'http://www.yiiframework.com/wiki/161/understanding-safe-validation-rules/' ) . "</li>
			<li>" . dvwaExternalLinkUrlGet( 'https://laracasts.com/discuss/channels/general-discussion/model-mass-assignment' ) . "</li>
		</ul>
</div>";
dvwaHtmlEcho( $page );

?>
