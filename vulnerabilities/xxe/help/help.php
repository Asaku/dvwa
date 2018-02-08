<div class="body_padded">
	<h1>Help - XXE (XML External Entity)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>About</h3>
		<p>
			An XML External Entity (XXE) attack[1][2] is a type of computer security vulnerability typically found in Web applications. XXE enables attackers to disclose normally protected files from a server or connected network.

			The XML standard includes the idea of an external general parsed entity (an external entity). During parsing of the XML document, the parser will expand these links and include the content of the URI in the returned XML document.

			The Open Web Application Security Project (OWASP) listed XML External Entity attacks as 4th on their 2017 Top 10 Web Security Risks.[3] The risk rating is a combination of likelihood and impact, not necessarily how commonly this vulnerability has been exploited.[4] The previous OWASP Top 10, which came out in 2014, did not include XXE.
		</p>

		<h3>Objective</h3>
		<p>Get the secret.txt file in racine of web application.</p>

	</div>
	</td>
	</tr>
	</table>

	</div>

	<br />

	<p>Reference: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/XML_External_Entity_(XXE)_Processing' ); ?></p>
</div>
