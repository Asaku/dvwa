<?php

function field($label, $name, $type, $id = null)
{
	return "
		<div class='form-group'>
			<label>".$label."</label>
			<input type=".$type." class='form-control' name=".$name." id=".$id.">
		</div>
	";
}

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerability: Target Blank' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'target_blank';
$page[ 'help_button' ]   = 'target_blank';
$page[ 'source_button' ] = 'target_blank';

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

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/target_blank/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
<div class=\"body_padded\" class='col-md-6'>
	<h1>Vulnerability: Target Blank</h1>

	<div class=\"vulnerable_code_area\">";

	$page[ 'body' ] .= "
		<form action=\"#\" method=\"{$method}\">";
	$page[ 'body' ] .= field("Link", "link", "text", "target_url");

	$page[ 'body' ] .= "<a href=\"#\" class='btn btn-primary' onclick='addLink()'>Submit</a>
			";

	$page['body'] .= "<div id='target_blank'><a href='#' class='text-right' target='blank'>Target</a></div>";

	$page[ 'body' ] .= "
		</form>";

	$page[ 'body' ] .= "
			{$html}
		</div>
	</div>\n";

$page[ 'body' ] .= 
"<div>
		<h2>More Information</h2>
		<ul>
			<li>" . dvwaExternalLinkUrlGet( 'https://davidebove.com/blog/2016/05/05/target_blank-the-vulnerability-in-your-browser/' ) . "</li>
			<li>" . dvwaExternalLinkUrlGet( 'https://www.jitbit.com/alexblog/256-targetblank---the-most-underestimated-vulnerability-ever/' ) . "</li>
			<li>" . dvwaExternalLinkUrlGet( 'https://www.w3schools.com/tags/att_a_target.asp' ) . "</li>
		</ul>
</div>";
dvwaHtmlEcho( $page );

?>
