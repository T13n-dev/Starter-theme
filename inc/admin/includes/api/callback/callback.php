<?php
/**
 * 
 * Callback for main page
 * 
 * @package tstarter/inc/admin/includes/api/callback
 */

class Callback {

    public function callIntroduction() {
        return require_once INCLUDE_DIR.'inc/admin/includes/templates/tpl-introduction.php';
    }

}