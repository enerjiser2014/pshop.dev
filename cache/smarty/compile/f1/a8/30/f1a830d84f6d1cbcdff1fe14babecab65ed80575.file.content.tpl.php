<?php /* Smarty version Smarty-3.1.19, created on 2016-06-02 10:39:09
         compiled from "/var1/www/pshop.dev/admin/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1688754653574fe29d68acd6-88994430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1a830d84f6d1cbcdff1fe14babecab65ed80575' => 
    array (
      0 => '/var1/www/pshop.dev/admin/themes/default/template/content.tpl',
      1 => 1460102676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1688754653574fe29d68acd6-88994430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_574fe29d80c2e9_43844535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574fe29d80c2e9_43844535')) {function content_574fe29d80c2e9_43844535($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
