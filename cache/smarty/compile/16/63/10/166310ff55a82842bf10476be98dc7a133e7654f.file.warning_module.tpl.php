<?php /* Smarty version Smarty-3.1.19, created on 2016-06-02 10:39:11
         compiled from "/var1/www/pshop.dev/admin/themes/default/template/controllers/modules/warning_module.tpl" */ ?>
<?php /*%%SmartyHeaderCode:240778497574fe29f7ba421-73653578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '166310ff55a82842bf10476be98dc7a133e7654f' => 
    array (
      0 => '/var1/www/pshop.dev/admin/themes/default/template/controllers/modules/warning_module.tpl',
      1 => 1460102676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '240778497574fe29f7ba421-73653578',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_link' => 0,
    'text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_574fe29f7c1ab4_13513128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574fe29f7c1ab4_13513128')) {function content_574fe29f7c1ab4_13513128($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module_link']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</a><?php }} ?>
