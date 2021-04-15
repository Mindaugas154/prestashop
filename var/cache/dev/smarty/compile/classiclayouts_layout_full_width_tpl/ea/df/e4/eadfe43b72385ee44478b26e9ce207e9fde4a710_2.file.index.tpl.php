<?php
/* Smarty version 3.1.34-dev-7, created on 2021-04-15 08:48:10
  from 'C:\laragon\www\prestashop\themes\classic\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6077d39a43c746_42530361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eadfe43b72385ee44478b26e9ce207e9fde4a710' => 
    array (
      0 => 'C:\\laragon\\www\\prestashop\\themes\\classic\\templates\\index.tpl',
      1 => 1618156404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6077d39a43c746_42530361 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9788558196077d39a427ef0_79836602', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_4200432626077d39a42a6c5_86419072 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_11694093936077d39a431057_88590533 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_19931662536077d39a42ddf4_94815655 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11694093936077d39a431057_88590533', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_9788558196077d39a427ef0_79836602 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_9788558196077d39a427ef0_79836602',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_4200432626077d39a42a6c5_86419072',
  ),
  'page_content' => 
  array (
    0 => 'Block_19931662536077d39a42ddf4_94815655',
  ),
  'hook_home' => 
  array (
    0 => 'Block_11694093936077d39a431057_88590533',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4200432626077d39a42a6c5_86419072', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19931662536077d39a42ddf4_94815655', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
}
