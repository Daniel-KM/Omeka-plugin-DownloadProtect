<?php
/**
 * Download Protect
 *
 * Protect original files with a copyright warning and avoid file hotlinking.
 *
 * @copyright Copyright Daniel Berthereau, 2012-2019
 * @license http://www.cecill.info/licences/Licence_CeCILL_V2.1-en.txt
 * @package DownloadProtect
 */

/**
 * The Download Protect plugin.
 * @package Omeka\Plugins\DownloadProtect
 */
class DownloadProtectPlugin extends Omeka_Plugin_AbstractPlugin
{
    /**
     * @var array This plugin's hooks.
     */
    protected $_hooks = array(
        'install',
        'uninstall',
        'config_form',
        'config',
        'define_routes',
    );

    /**
     * @var array This plugin's options.
     */
    protected $_options = array(
        // Max download without captcha (default to 10 MB).
        'download_protect_max_free_download' => 10000000,
        'download_protect_legal_text' => 'I agree with terms of use.',
    );

    /**
     * Installs the plugin.
     */
    public function hookInstall()
    {
        $this->_installOptions();
    }

    /**
     * Uninstalls the plugin.
     */
    public function hookUninstall()
    {
        $this->_uninstallOptions();
    }

    /**
     * Shows plugin configuration page.
     */
    public function hookConfigForm($args)
    {
        $view = get_view();
        echo $view->partial(
            'plugins/download-protect-config-form.php'
        );
    }

    /**
     * Saves plugin configuration page.
     *
     * @param array Options set in the config form.
     */
    public function hookConfig($args)
    {
        $post = $args['post'];
        $params = array_intersect_key($post, $this->_options);
        foreach ($params as $name => $value) {
            set_option($name, $value);
        }
    }

    /**
     * Defines route for direct download count.
     */
    public function hookDefineRoutes($args)
    {
        // ".htaccess" always redirects direct downloads to a public url.
        if (is_admin_theme()) {
            return;
        }

        $args['router']->addConfig(new Zend_Config_Ini(dirname(__FILE__) . '/routes.ini', 'routes'));
    }
}
