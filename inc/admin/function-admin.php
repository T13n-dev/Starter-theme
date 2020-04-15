<?php
    // Custom slider
    require_once 'includes/hooks.php';
    require_once 'includes/cpt-slider.php';
    require_once 'includes/ajax.php';
    require_once 'includes/shortcode.php';

    // api admin
    require_once 'includes/api/callback/callback.php';
    require_once 'includes/api/settingApi.php';

    // redux framework
    require_once 'redux-framework/t-functions.php';
    require_once 'redux-framework/t-options.php';
    require_once 'redux-framework/hooks.php';

    class Admin {
        public $setting;

        public $pages, $subpage;

        public function register() {

            $this->setting = new SettingApi();

            $this->callback = new Callback();

            $this->setPages();
            $this->setSubpages();

            $this->setting->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages( $this->subpage )->register();

        }

        public function setPages () {
            $this->pages = array (
                array (
                    'page_title' => 'Theme Options',
                    'menu_title' => 'Theme Setting',
                    'capability' => 'manage_options',
                    'menu_slug' => 'theme_options',
                    'callback' => array($this->callback, 'callIntroduction'),
                    'icon_url' => 'dashicons-smiley',
                    'position' => 3
                )
            );
        }

        /**
         ** add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'] );
         */
        public function setSubpages() {
            $this->subpage = array (
                array (
                    'parent_slug' => 'theme_options',
                    'page_title' => 'Theme Options',
                    'menu_title' => 'Slider Options',
                    'capability' => 'manage_options',
                    'menu_slug' => 'edit.php?post_type=cpt-slider'
                ),
                array (
                    'parent_slug' => 'theme_options',
                    'page_title' => 'Theme Options',
                    'menu_title' => 'Main Options',
                    'capability' => 'manage_options',
                    'menu_slug' => 'themes.php?page=main_options'
                )
            );
        }
    }

    $obj = new Admin();
    $obj->register();