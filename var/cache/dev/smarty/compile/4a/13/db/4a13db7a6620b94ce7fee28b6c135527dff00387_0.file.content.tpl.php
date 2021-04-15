<?php
/* Smarty version 3.1.34-dev-7, created on 2021-04-16 00:02:41
  from 'C:\laragon\www\prestashop\admin308ucwfqy\themes\default\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6078a9f1b772d2_92474636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a13db7a6620b94ce7fee28b6c135527dff00387' => 
    array (
      0 => 'C:\\laragon\\www\\prestashop\\admin308ucwfqy\\themes\\default\\template\\content.tpl',
      1 => 1618156337,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6078a9f1b772d2_92474636 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>

<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
