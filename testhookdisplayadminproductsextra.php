<?php
/**
 * 2007-2020 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

class testhookdisplayadminproductsextra extends Module
{
    public function __construct()
    {
        $this->name = 'testhookdisplayadminproductsextra';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Matt75';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Test hook displayAdminProductsExtra');
        $this->description = $this->l('Test if hook displayAdminProductsExtra is registered if not exist.');
    }

    /**
     * @return bool
     */
    public function install()
    {
        if (false === (bool) parent::install()) {
            PrestaShopLogger::addLog($this->name . ' - Unable to install module', 3, null, 'Module', $this->id);

            return false;
        }

        if (false === (bool) $this->registerHook('displayAdminProductsExtra')) {
            PrestaShopLogger::addLog($this->name . ' - Unable to resgister hook displayAdminProductsExtra', 3, null, 'Module', $this->id);
        }

        if (true === (bool) $this->isRegisteredInHook('displayAdminProductsExtra')) {
            PrestaShopLogger::addLog($this->name . ' - Registered on hook displayAdminProductsExtra', 1, null, 'Module', $this->id);
        }

        return true;
    }

    /**
     * @param array $params
     *
     * @return string
     */
    public function hookDisplayAdminProductsExtra(array $params)
    {
        PrestaShopLogger::addLog($this->name . ' - Hook DisplayAdminProductsExtra', 1, null, 'Module', $this->id);

        return $this->name;
    }
}
