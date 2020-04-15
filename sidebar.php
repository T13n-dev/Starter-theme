<?php 

    /**
     * Sidebar template
     * 
     * @package Tstarter
     */

    if ( is_active_sidebar('archive-blog') ) {
        dynamic_sidebar('archive-blog');
    }