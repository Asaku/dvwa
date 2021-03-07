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

function updateUserSession() {
	$query  = "SELECT * FROM `users` WHERE user='".dvwaCurrentUser()."';";
	$result = @mysqli_query($GLOBALS["___mysqli_ston"],  $query ) or die( '<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '.<br />Try <a href="setup.php">installing again</a>.</pre>' );

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$_SESSION['user'] = $row;
}


define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerability: Mass Assignment' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'mass_assignment';
$page[ 'help_button' ]   = 'mass_assignment';
$page[ 'source_button' ] = 'mass_assignment';

dvwaDatabaseConnect();

$method            = 'GET';
$vulnerabilityFile = 'low.php';

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/mass_assignment/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
<div class=\"body_padded\" class='col-md-6'>
	<h1>Vulnerability: Mass Assignment</h1>

	<div class=\"vulnerable_code_area\">";

	$page[ 'body' ] .= "
		<form action=\"#\" method=\"{$method}\" >
			<p>
				User ID:";
	$page[ 'body' ] .= field("First Name", "first_name", "text");
	$page[ 'body' ] .= field("Last Name", "last_name", "text");

	$page[ 'body' ] .= "\n				<input type=\"submit\" class='btn btn-primary' name=\"Submit\" value=\"Submit\">
			</p>\n";

	$page[ 'body' ] .= "
		</form>";

	$page[ 'body' ] .= "
			{$html}
		</div>
	</div>\n";

$admin = 'false';

if ($_SESSION['user']['super_admin'] == 1)
	$admin = 'true';

$page[ 'body' ] .= 
"<div>
		<div class='info'>
			<div>
				<div> First Name: ".$_SESSION['user']['first_name']."</div>
			</div>
			<div>
				<div> Last Name: ".$_SESSION['user']['last_name']."</div>
			</div>
			<div>
				<div> Super Admin: ". $admin . "</div>
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
