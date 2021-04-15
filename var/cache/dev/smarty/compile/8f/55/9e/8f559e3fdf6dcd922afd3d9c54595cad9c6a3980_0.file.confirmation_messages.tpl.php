<?php
/* Smarty version 3.1.34-dev-7, created on 2021-04-16 00:01:57
  from 'C:\laragon\www\prestashop\admin308ucwfqy\themes\new-theme\template\components\layout\confirmation_messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6078a9c5891fe2_35193477',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f559e3fdf6dcd922afd3d9c54595cad9c6a3980' => 
    array (
      0 => 'C:\\laragon\\www\\prestashop\\admin308ucwfqy\\themes\\new-theme\\template\\components\\layout\\confirmation_messages.tpl',
      1 => 1618156329,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6078a9c5891fe2_35193477 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['confirmations']->value) && count($_smarty_tpl->tpl_vars['confirmations']->value) && $_smarty_tpl->tpl_vars['confirmations']->value) {?>
  <div class="bootstrap">
    <div class="alert alert-success" style="display:block;">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['confirmations']->value, 'conf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['conf']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>
<?php }
}
}
