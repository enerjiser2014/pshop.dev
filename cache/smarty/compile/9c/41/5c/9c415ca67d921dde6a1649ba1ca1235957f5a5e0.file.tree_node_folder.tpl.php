<?php /* Smarty version Smarty-3.1.19, created on 2016-06-02 10:39:16
         compiled from "/var1/www/pshop.dev/admin/themes/default/template/helpers/tree/tree_node_folder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:701803458574fe2a4b1d1e6-10307186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c415ca67d921dde6a1649ba1ca1235957f5a5e0' => 
    array (
      0 => '/var1/www/pshop.dev/admin/themes/default/template/helpers/tree/tree_node_folder.tpl',
      1 => 1460102676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '701803458574fe2a4b1d1e6-10307186',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'node' => 0,
    'children' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_574fe2a4b273f3_79295594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574fe2a4b273f3_79295594')) {function content_574fe2a4b273f3_79295594($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var1/www/pshop.dev/tools/smarty/plugins/modifier.escape.php';
?>
<li class="tree-folder">
	<span class="tree-folder-name">
		<i class="icon-folder-close"></i>
		<label class="tree-toggler"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</label>
	</span>
	<ul class="tree">
		<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['children']->value, 'UTF-8');?>

	</ul>
</li><?php }} ?>
