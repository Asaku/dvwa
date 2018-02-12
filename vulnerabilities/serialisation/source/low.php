<?php

include("Cache.php");

if( isset( $_REQUEST[ 'Submit' ] ) ) {
    $cache = new Cache($_REQUEST["info"]);

    unset($cache);
}

?>
