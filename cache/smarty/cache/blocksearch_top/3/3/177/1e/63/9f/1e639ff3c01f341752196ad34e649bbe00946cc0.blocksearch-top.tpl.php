<?php /*%%SmartyHeaderCode:204478922574fe458025587-30685980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e639ff3c01f341752196ad34e649bbe00946cc0' => 
    array (
      0 => '/var1/www/pshop.dev/themes/default-bootstrap/modules/blocksearch/blocksearch-top.tpl',
      1 => 1460102676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204478922574fe458025587-30685980',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_574fe5cdb85536_70658925',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574fe5cdb85536_70658925')) {function content_574fe5cdb85536_70658925($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class="col-sm-4 clearfix">
	<form id="searchbox" method="get" action="//pshop.dev/search" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Поиск" value="" />
		<button type="submit" name="submit_search" class="btn btn-default button-search">
			<span>Поиск</span>
		</button>
	</form>
</div>
<!-- /Block search module TOP --><?php }} ?>
