<?php
/*
Plugin Name: 测试计划任务
Plugin URI: http://www.ecjia.com/plugins/ecjia.cron_testlog/
Description: 测试计划任务，生成日志
Author: ECJIA TEAM
Version: 1.0.0
Author URI: http://www.ecjia.com/
Plugin App: cron
*/
defined('IN_ECJIA') or exit('No permission resources.');
class plugin_cron_ipdel {

	public static function install() {
		$config = include(RC_Plugin::plugin_dir_path(__FILE__) . 'config.php');
		$param = array('file' => __FILE__, 'config' => $config);
		return RC_Api::api('cron', 'plugin_install', $param);
	}


	public static function uninstall() {
		$config = include(RC_Plugin::plugin_dir_path(__FILE__) . 'config.php');
		$param = array('file' => __FILE__, 'config' => $config);
		return RC_Api::api('cron', 'plugin_uninstall', $param);
	}

}

Ecjia_PluginManager::extend('cron_testlog', function() {
    require_once RC_Plugin::plugin_dir_path(__FILE__) . 'cron_testlog.class.php';
    return new cron_testlog();
});

RC_Plugin::register_activation_hook(__FILE__, array('plugin_cron_ipdel', 'install'));
RC_Plugin::register_deactivation_hook(__FILE__, array('plugin_cron_ipdel', 'uninstall'));

// end
