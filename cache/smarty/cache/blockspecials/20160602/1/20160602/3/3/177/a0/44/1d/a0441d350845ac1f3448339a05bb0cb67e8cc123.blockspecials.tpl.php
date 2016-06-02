<?php /*%%SmartyHeaderCode:1903388752574fe5e29f7ed6-16047578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0441d350845ac1f3448339a05bb0cb67e8cc123' => 
    array (
      0 => '/var1/www/pshop.dev/themes/default-bootstrap/modules/blockspecials/blockspecials.tpl',
      1 => 1460102676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1903388752574fe5e29f7ed6-16047578',
  'variables' => 
  array (
    'link' => 0,
    'special' => 0,
    'PS_CATALOG_MODE' => 0,
    'priceDisplay' => 0,
    'specific_prices' => 0,
    'priceWithoutReduction_tax_excl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_574fe5e2ab79d2_83246973',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574fe5e2ab79d2_83246973')) {function content_574fe5e2ab79d2_83246973($_smarty_tpl) {?>
<!-- MODULE Block specials -->
<div id="special_block_right" class="block">
	<p class="title_block">
        <a href="http://pshop.dev/prices-drop" title="Скидки">
            Скидки
        </a>
    </p>
	<div class="block_content products-block">
    		<ul>
        	<li class="clearfix">
            	<a class="products-block-image" href="http://pshop.dev/summer-dresses/5-printed-summer-dress.html">
                    <img 
                    class="replace-2x img-responsive" 
                    src="http://pshop.dev/12-small_default/printed-summer-dress.jpg" 
                    alt="" 
                    title="Printed Summer Dress" />
                </a>
                <div class="product-content">
                	<h5>
                        <a class="product-name" href="http://pshop.dev/summer-dresses/5-printed-summer-dress.html" title="Printed Summer Dress">
                            Printed Summer Dress
                        </a>
                    </h5>
                                        	<p class="product-description">
                            Long printed dress with thin...
                        </p>
                                        <div class="price-box">
                    	                        	<span class="price special-price">
                                                                    34,20 руб                            </span>
                                                                                                                                 <span class="price-percent-reduction">-5%</span>
                                                                                         <span class="old-price">
                                                                    36,00 руб                            </span>
                            
                                            </div>
                </div>
            </li>
		</ul>
		<div>
			<a 
            class="btn btn-default button button-small" 
            href="http://pshop.dev/prices-drop" 
            title="Все скидки">
                <span>Все скидки<i class="icon-chevron-right right"></i></span>
            </a>
		</div>
    	</div>
</div>
<!-- /MODULE Block specials -->
<?php }} ?>
