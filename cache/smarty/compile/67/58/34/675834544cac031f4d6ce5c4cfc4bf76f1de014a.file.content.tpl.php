<?php /* Smarty version Smarty-3.1.19, created on 2016-06-02 10:48:32
         compiled from "/var1/www/pshop.dev/admin487s7cfrc/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1473924603574fe4d0a67ba5-28123919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '675834544cac031f4d6ce5c4cfc4bf76f1de014a' => 
    array (
      0 => '/var1/www/pshop.dev/admin487s7cfrc/themes/default/template/content.tpl',
      1 => 1460102676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1473924603574fe4d0a67ba5-28123919',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_574fe4d0a71152_26998675',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574fe4d0a71152_26998675')) {function content_574fe4d0a71152_26998675($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
