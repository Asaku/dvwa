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
$page[ 'title' ]   = 'Vulnerability: Serialisation' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'serialisation';
$page[ 'help_button' ]   = 'serialisation';
$page[ 'source_button' ] = 'serialisation';

dvwaDatabaseConnect();

$method            = 'GET';
$vulnerabilityFile = 'low.php';

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/serialisation/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
<div class=\"body_padded\" class='col-md-6'>
	<h1>Vulnerability: Serialization</h1>

	<div class=\"vulnerable_code_area\">";

	$page[ 'body' ] .= "
		<form action=\"#\" method=\"{$method}\" >
			<p>
				User ID:";
	$page[ 'body' ] .= field("Info", "info", "text");

	$page[ 'body' ] .= "\n				<input type=\"submit\" class='btn btn-primary' name=\"Submit\" value=\"Submit\">
			</p>\n";

	$page[ 'body' ] .= "
		</form>";

	$page[ 'body' ] .= "
			{$html}
		</div>


	</div>\n";

dvwaHtmlEcho( $page );

?>
