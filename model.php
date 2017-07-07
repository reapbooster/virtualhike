<?php

// Returns the image URL of the corresponding img_id
function getImageURL( $img_id, $image_list){    
    return $image_list[$img_id]["image"];
}

// Returns the preview URL of the corresponding img_id
function getPreviewURL( $img_id, $image_list){    
    return $image_list[$img_id]["preview"];
}


// Returns the titleof the corresponding img_id
function getImageTitle( $img_id, $image_list){    
    return $image_list[$img_id]["title"];
}

// Returns the description of the corresponding img_id
function getImageDescription( $img_id, $image_list){    
    return $image_list[$img_id]["description"];
}

// Returns the img_url_list
function getImageList( $album ){
    // in the future this should be a db query 
    if( $album == "hiking" ){
        $image_list= array(
            "petra" =>  array( "image" => "img/petra.jpg", "preview" => "img/petra-preview.jpg", "title" => "Petra", "description" => "Petra temple in Jordan."),
            "angels_landing" =>  array( "image" => "img/angels_landing.jpg", "preview" => "img/angels_landing-preview.jpg", "title" => "Angel's Landing 1", "description" => "Angel's Landing at the very edge of the cliff."),
            "angels_landing_2" =>  array( "image" => "img/angels_landing_2.jpg", "preview" => "img/angels_landing_2-preview.jpg", "title" => "Angel's Landing 2", "description" => "Angel's Landing at the very top.")
        );
    }
    elseif( $album == "family" ){
        $image_list= array(
            "graduation" => array( "image" => "img/graduation.jpg", "preview" => "img/graduation-preview.jpg", "title" => "Graduation", "description" => "My aunt's graduation.")
        );
    }
    else if( $album == "labiomed" ){
        $image_list= array(
            "RBA1_pano" =>  array( "image" => "img/RBA1_pano.jpg", "preview" => "img/RBA1_pano-preview.jpg", "title" => "RBA 1", "description" => "Panorama of RBA construction."),
            "RBA2_pano" =>  array( "image" => "img/RBA2_pano.jpg", "preview" => "img/RBA2_pano-preview.jpg", "title" => "RBA 2", "description" => "Panorama of RBA construction.")
        );
    }
    else{
        $image_list= array(
            "petra" =>  array( "image" => "img/petra.jpg", "preview" => "img/petra-preview.jpg", "title" => "Petra", "description" => "Petra temple in Jordan.")
        );
    }
        
    
    return $image_list;
}    

function getCarouselListItems( $image_list ){
    $first = true;
    $carousel_list_items = '';
    foreach( $image_list as $image_id => $image_attributes ){
        if($first === true){
            $first_image_selector = "id=\"first_360_image\"";
        }
        else{
            $first_image_selector = '';
        }
        $carousel_list_items .= "<li>";
        $carousel_list_items .= "<a href=\"#$image_id\" $first_image_selector >";
        $carousel_list_items .= "<img src=\"" . $image_attributes["image"] . "\">";
        $carousel_list_items .= "<small>" . $image_attributes["title"] . "</small>";
        $carousel_list_items .= "</a>";
        $carousel_list_items .= "</li>";
    }
    
    return $carousel_list_items;
}