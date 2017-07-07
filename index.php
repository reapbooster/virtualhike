<?php
error_reporting(E_ALL);
include "model.php";

if( isset($_GET["thisisaverylongpassword"]) && isset($_GET["album"]) ){
    //$view_variables["img_url"] = getImageURL( $_GET["img_id"], getImageList() );
    $view_variables["carousel_list_items"] = getCarouselListItems( getImageList( $_GET["album"] ) );
}
else die("NOT AUTHORIZED");

include "view.php";

?>