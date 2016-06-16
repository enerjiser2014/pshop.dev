<?php
/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class FavoriteProduct extends ObjectModel
{
	public $id;

	public $id_product;

	public $id_customer;

	public $id_shop;

	public $date_add;

	public $date_upd;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'favorite_product',
		'primary' => 'id_favorite_product',
		'fields' => array(
			'id_product' =>		array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
			'id_customer' =>	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
			'id_shop' =>		array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
			'date_add' =>		array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
			'date_upd' =>		array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
		),
	);

	public static function guestToCustomerFavoriteProducts($id_customer) {

		$favoriteProducts = (array)json_decode(Context::getContext()->cookie->favoriteProducts);
		$shopId = (int)Context::getContext()->shop->id;
		if ($id_customer !== 0) {
			foreach ($favoriteProducts as $fv) {
				if (!self::getFavoriteProduct($id_customer, $fv)) {
					$favorite_product = new FavoriteProduct();
					$favorite_product->id_customer = $id_customer;
					$favorite_product->id_shop = $shopId;
					$favorite_product->id_product = $fv;
					if (!$favorite_product->add()) {
						echo 'error!';
						die(1);
					}
				}
			}
			Context::getContext()->cookie->favoriteProducts = null;
		}
		//Context::getContext()->cookie->favoriteProducts = null;
//		var_dump($favoriteProducts); exit;
		$id_lang = 1;
		if (count($favoriteProducts)>0) {
			return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT DISTINCT p.`id_product`, fp.`id_shop_default` as `id_shop`, pl.`description_short`, pl.`link_rewrite`,
				pl.`name`, i.`id_image`, CONCAT(p.`id_product`, \'-\', i.`id_image`) as image
			FROM `' . _DB_PREFIX_ . 'product` fp
			LEFT JOIN `' . _DB_PREFIX_ . 'product` p ON (p.`id_product` = fp.`id_product`)
			' . Shop::addSqlAssociation('product', 'p') . '
			LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl
				ON p.`id_product` = pl.`id_product`
				AND pl.`id_lang` = ' . (int)$id_lang
				. Shop::addSqlRestrictionOnLang('pl') . '
			LEFT OUTER JOIN `' . _DB_PREFIX_ . 'product_attribute` pa ON (p.`id_product` = pa.`id_product`)
			' . Shop::addSqlAssociation('product_attribute', 'pa', false) . '
			LEFT JOIN `' . _DB_PREFIX_ . 'image` i ON (i.`id_product` = p.`id_product` AND i.`cover` = 1)
			LEFT JOIN `' . _DB_PREFIX_ . 'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = ' . (int)$id_lang . ')
			WHERE p.`id_product` IN(' . implode(',', $favoriteProducts) . ') AND fp.id_shop_default IN (1)'
			);
		} else {
			return [];
		}
	}
	public static function getFavoriteProducts($id_customer, $id_lang)
	{
		self::guestToCustomerFavoriteProducts($id_customer);

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT DISTINCT p.`id_product`, fp.`id_shop`, pl.`description_short`, pl.`link_rewrite`,
				pl.`name`, i.`id_image`, CONCAT(p.`id_product`, \'-\', i.`id_image`) as image
			FROM `'._DB_PREFIX_.'favorite_product` fp
			LEFT JOIN `'._DB_PREFIX_.'product` p ON (p.`id_product` = fp.`id_product`)
			'.Shop::addSqlAssociation('product', 'p').'
			LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
				ON p.`id_product` = pl.`id_product`
				AND pl.`id_lang` = '.(int)$id_lang
				.Shop::addSqlRestrictionOnLang('pl').'
			LEFT OUTER JOIN `'._DB_PREFIX_.'product_attribute` pa ON (p.`id_product` = pa.`id_product`)
			'.Shop::addSqlAssociation('product_attribute', 'pa', false).'
			LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product` AND i.`cover` = 1)
			LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
			WHERE product_shop.`active` = 1
			'.($id_customer ? ' AND fp.id_customer = '.(int)$id_customer : '').'
			'.Shop::addSqlRestriction(false, 'fp')
		);
	}

	public static function getFavoriteProduct($id_customer, $id_product, Shop $shop = null)
	{
		if (!$shop)
			$shop = Context::getContext()->shop;

		$id_favorite_product = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
			SELECT `id_favorite_product`
			FROM `'._DB_PREFIX_.'favorite_product`
			WHERE `id_customer` = '.(int)$id_customer.'
			AND `id_product` = '.(int)$id_product.'
			AND `id_shop` = '.(int)$shop->id
		);

		if ($id_favorite_product)
			return new FavoriteProduct($id_favorite_product);
		return null;
	}

	public static function isCustomerFavoriteProduct($id_customer, $id_product, Shop $shop = null)
	{
		if (!$id_customer)
			return self::isGuestFavoriteProduct($id_product);

		if (!$shop)
			$shop = Context::getContext()->shop;

		return (bool)Db::getInstance()->getValue('
			SELECT COUNT(*)
			FROM `'._DB_PREFIX_.'favorite_product`
			WHERE `id_customer` = '.(int)$id_customer.'
			AND `id_product` = '.(int)$id_product.'
			AND `id_shop` = '.(int)$shop->id);
	}

	public static function isGuestFavoriteProduct($id_product)
	{
		$favoriteProducts = (array)json_decode(Context::getContext()->cookie->favoriteProducts);
		return in_array($id_product,$favoriteProducts);
	}
}
