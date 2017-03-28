<?php
/*
* Hide editor on home page
* Since v1.0.0
*/
function homepage_hide_editor() {
    
    // Determine which admin screen we are in
    $screen = get_current_screen();

    // Ensures we are currently editing
    if ( $screen->base != 'post' ) {
        
        // If not editing then escape function
        return;
        
    } else {
        
        // Get the home page ID
        $frontpage_id = get_option('page_on_front');
        
        // Get current post ID
        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

        // Checks current post ID matches home page ID
        if($post_id == $frontpage_id){
            
            // Removes editor from home page
            remove_post_type_support('page', 'editor');
            
        }
        
    }
    
}
add_action( 'current_screen', 'homepage_hide_editor' );
