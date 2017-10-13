<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerability: Massive Assignement' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'massive_assignement';
$page[ 'help_button' ]   = 'massive_assignement';
$page[ 'source_button' ] = 'massive_assignement';

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

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/massive_assignement/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Vulnerability: Massive Assignement</h1>

	<div class=\"vulnerable_code_area\">";

	$page[ 'body' ] .= "
		<form action=\"#\" method=\"{$method}\">
			<p>
				User ID:";
		$page[ 'body' ] .= "\n				<input type=\"text\" size=\"15\" name=\"id\">";

	$page[ 'body' ] .= "\n				<input type=\"submit\" name=\"Submit\" value=\"Submit\">
			</p>\n";

	$page[ 'body' ] .= "
		</form>";

	$page[ 'body' ] .= "
			{$html}
		</div>

		<h2>More Information</h2>
		<ul>
			<li>" . dvwaExternalLinkUrlGet( 'http://www.securiteam.com/securityreviews/5DP0N1P76E.html' ) . "</li>
			<li>" . dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/SQL_injection' ) . "</li>
			<li>" . dvwaExternalLinkUrlGet( 'http://ferruh.mavituna.com/sql-injection-cheatsheet-oku/' ) . "</li>
			<li>" . dvwaExternalLinkUrlGet( 'http://pentestmonkey.net/cheat-sheet/sql-injection/mysql-sql-injection-cheat-sheet' ) . "</li>
			<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/SQL_Injection' ) . "</li>
			<li>" . dvwaExternalLinkUrlGet( 'http://bobby-tables.com/' ) . "</li>
		</ul>
	</div>\n";

dvwaHtmlEcho( $page );

?>
