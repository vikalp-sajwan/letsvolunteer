<?php
//#### fuctions for the website


// fuction to redirect to a page
function redirect_to( $new_location ){
    header("Location: ".$new_location );
    exit;
}
?>