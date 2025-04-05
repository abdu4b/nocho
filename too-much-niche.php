<?php

namespace TooMuchNiche;

defined('\ABSPATH') || exit;

/*
  Plugin Name: Too Much Niche
  Plugin URI: https://www.keywordrush.com/toomuchniche
  Description: Your ultimate AI-powered affiliate website builder.
  Version: 4.1.0
  Author: keywordrush.com
  Author URI: https://www.keywordrush.com
  Text Domain: too-much-niche
 */

/*
 * Copyright (c)  www.keywordrush.com  (email: support@keywordrush.com)
 */

defined('\ABSPATH') || die('No direct script access allowed!');

define(__NAMESPACE__ . '\NS', __NAMESPACE__ . '\\');
define(NS . 'PLUGIN_PATH', \plugin_dir_path(__FILE__));
define(NS . 'PLUGIN_FILE', __FILE__);
define(NS . 'PLUGIN_RES', \plugins_url('res', __FILE__));

require_once PLUGIN_PATH . 'loader.php';

\add_action('plugins_loaded', array('\TooMuchNiche\application\Plugin', 'getInstance'));
if (\is_admin())
{
    \register_activation_hook(__FILE__, array(\TooMuchNiche\application\Installer::getInstance(), 'activate'));
    \register_deactivation_hook(__FILE__, array(\TooMuchNiche\application\Installer::getInstance(), 'deactivate'));
    \register_uninstall_hook(__FILE__, array('\TooMuchNiche\application\Installer', 'uninstall'));
    \add_action('init', array('\TooMuchNiche\application\admin\PluginAdmin', 'getInstance'));
}