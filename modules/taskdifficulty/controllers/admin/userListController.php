<?php

namespace MyModule\Controller;

use PrestaShop\PrestaShop\Adapter\Entity\ModuleAdminController;

class userListController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
    }

//    public function init()
//    {
//        parent::init();
//    }
//
    public function initContent()
    {
        parent::initContent();
        $this->setTemplate($this->module->template_dir . 'configure.tpl');
    }

    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */

        $this->context->smarty->assign('module_dir', $this->_path);

        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        return $output.$this->difficultytList();
    }

//    public function viewAccess($disable = false)
//    {
//        return true;
//    }

    /**
     * Generuojama lentele atvaizduoti modules sukurtos db table duomenis
     */
    private function difficultytList()
    {
        $this->fields_list = array(
            'id_taskdifficulty' => array(
                'title' => $this->l('Id'),
                'width' => 15,
                'type' => 'text',
            ),
            'first_name' => array(
                'title' => $this->l('Vardas'),
                'width' => 100,
                'type' => 'text',
            ),
            'last_name' => array(
                'title' => $this->l('Pavardė'),
                'width' => 100,
                'type' => 'text',
            ),
            'email' => array(
                'title' => $this->l('El. Paštas'),
                'width' => 100,
                'type' => 'text',
            ),
        );
        $helper = new HelperList();

        $helper->shopLinkType = '';

        $helper->simple_header = true;

        $helper->actions = array('edit', 'delete', 'view');

        $helper->identifier = 'id_taskdifficulty';
        $helper->show_toolbar = true;
        $helper->title = 'HelperList';
        $helper->table = $this->name.'_taskdifficulty';

        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        return $helper;
    }
}