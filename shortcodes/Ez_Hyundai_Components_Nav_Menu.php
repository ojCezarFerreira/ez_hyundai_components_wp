<?php

namespace shortcodes;

class Ez_Hyundai_Components_Nav_Menu {
	public function __construct()
	{
		add_shortcode('ez_hyundai_components_nav_menu', array($this, 'add_shortcode'));
	}

	public function add_shortcode($atts = array(), $content = null, $tag = ''): bool|string {
		ob_start();
		require_once(EZ_HYUNDAI_COMPONENTS_PATH . 'views/shortcodes/nav_menu.php');
		return ob_get_clean();
	}
}