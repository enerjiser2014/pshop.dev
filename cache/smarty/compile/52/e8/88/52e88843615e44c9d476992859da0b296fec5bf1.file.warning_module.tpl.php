<?php /* Smarty version Smarty-3.1.19, created on 2016-06-02 10:50:59
         compiled from "/var1/www/pshop.dev/admin487s7cfrc/themes/default/template/controllers/modules/warning_module.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1666085532574fe5636a1f97-85207726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52e88843615e44c9d476992859da0b296fec5bf1' => 
    array (
      0 => '/var1/www/pshop.dev/admin487s7cfrc/themes/default/template/controllers/modules/warning_module.tpl',
      1 => 1460102676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1666085532574fe5636a1f97-85207726',
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
  'unifunc' => 'content_574fe5636fcd59_89816531',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574fe5636fcd59_89816531')) {function content_574fe5636fcd59_89816531($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module_link']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</a><?php }} ?>
