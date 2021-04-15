<?php
/**
* 2007-2021 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2021 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Taskdifficulty extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'taskdifficulty';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Mindaugas';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('First task');
        $this->description = $this->l('konfiguracinis langas, uzduoties pav. ir sunkumas.');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        //sukuriama db lentele ir nustatomas hook
        Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'taskdifficulty` (
            `id_taskdifficulty` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `first_name` char NOT NULL,
            `last_name` int NOT NULL,
            `email` char NOT NULL,
            PRIMARY KEY  (`id_taskdifficulty`)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;');

        $this->registerHook('actionProductAdd');
        $this->registerHook('actionProductSave');

        Configuration::updateValue('TASKDIFFICULTY_LIVE_MODE', false);
        return parent::install() &&
            $this->installTab() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader');
    }

    public function installTab()
    {

        //meginimas sukurti nauja parent tab

//        $parentTab = new Tab();
//        $parentTab->active = 1;
//        $parentTab->name = array();
//        $parentTab->class_name = "userTabController";
//        foreach (Language::getLanguages(true) as $language) {
//            $parentTab->name[$language['id_lang']] = "User info";
//        }
//        //$parentTab->id_parent = 0;
//        $parentTab->module = '';
//        $parentTab->add();
//
//        $parentTabID = Tab::getIdFromClassName('AdminInspiration');
//        $parentTab = new Tab($parentTabID);


        $tab = new Tab();
        $tab->active = 1;

        $tab->class_name = "userListController";
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $this->l('User List');
        }
        $tab->icon = 'aspect_ratio';
        $tab->id_parent = 2;
        $tab->position = 6;
        $tab->module = $this->name;
        return $tab->add();
    }

    public function uninstall()
    {
        //istrinama db lentele ir istrinami configracijos kintamieji
        Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'taskdifficulty`');
        Configuration::deleteByName('TASKDIFFICULTY_LIVE_MODE');
        Configuration::deleteByName('taskDifficulty');
        Configuration::deleteByName('taskName');
        return parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        if (((bool)Tools::isSubmit('submitTaskdifficultyModule')) == true) {
            $this->postProcess();
        }

        $this->context->smarty->assign('module_dir', $this->_path);

        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        return $output.$this->renderForm();
    }

    /**
     * meginimas testuoti gaunamus duomenis naudojant hook.
     */
    public function HookActionProductSave($params){
        $test=$params->oject;
        return $test;
    }
    public function HookActionProductUpdate($params){
        $test=$params->oject;
        return $test;
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitTaskdifficultyModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' =>  $this->getConfigFormValues(),/* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getdifficultyForm(),$this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getdifficultyForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Sudėtingumas'),
                    'icon' => 'icon-credit-card',
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Užduoties pavadinimas'),
                        'name' => 'taskName',
                        'desc' => $this->l('Use this module in live mode'),
                    ),
                    array(
                        'col' => 1,
                        'type' => 'select',
                        'desc' => $this->l('Enter a valid email address'),
                        'name' => 'taskDifficulty',
                        'label' => $this->l('Užduoties sunkumas'),
                        'options' => array(
                            'query' => array(
                                array('key' => '1', 'name' => 'Lengva'),
                                array('key' => '2', 'name' => 'Vidutiniškai Sunki'),
                                array('key' => '3', 'name' => 'Sunki'),
                            ),
                            'id' => 'key',
                            'name' => 'name'
                        )
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }


    //pavizdys
    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Live mode'),
                        'name' => 'TASKDIFFICULTY_LIVE_MODE',
                        'is_bool' => true,
                        'desc' => $this->l('Use this module in live mode'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-envelope"></i>',
                        'desc' => $this->l('Enter a valid email address'),
                        'name' => 'TASKDIFFICULTY_ACCOUNT_EMAIL',
                        'label' => $this->l('Email'),
                    ),
                    array(
                        'type' => 'password',
                        'name' => 'TASKDIFFICULTY_ACCOUNT_PASSWORD',
                        'label' => $this->l('Password'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getDifficultyFormValues()
    {
        return array(
            'taskDifficulty' => Configuration::get('taskDifficulty'),
            'taskName' => Configuration::get('taskName'),

        );
    }
    protected function getConfigFormValues()
    {
        return array(
            'TASKDIFFICULTY_LIVE_MODE' => Configuration::get('TASKDIFFICULTY_LIVE_MODE', true),
            'TASKDIFFICULTY_ACCOUNT_EMAIL' => Configuration::get('TASKDIFFICULTY_ACCOUNT_EMAIL', 'contact@prestashop.com'),
            'TASKDIFFICULTY_ACCOUNT_PASSWORD' => Configuration::get('TASKDIFFICULTY_ACCOUNT_PASSWORD', null),
            'taskDifficulty' => Configuration::get('taskDifficulty'),
            'taskName' => Configuration::get('taskName'),
        );
    }

    /**
     * Save form data.
     */
    protected function postDifficultyProcess()
    {
        $form_values = $this->getDifficultyFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();
        $this->postDifficultyProcess();
        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            $this->context->controller->addCSS($this->_path.'views/css/back.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }
}
