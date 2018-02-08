<?php

if(isset($_REQUEST[ 'Submit' ])) {
    //Désactive le chargement des entités externes
    //libxml_disable_entity_loader(true);
    $xmlfile = $_REQUEST['data'];
    $dom = new DOMDocument();
    $dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
    $creds = simplexml_import_dom($dom);
    $user = $creds->user;
    $pass = $creds->pass;
}

?>
