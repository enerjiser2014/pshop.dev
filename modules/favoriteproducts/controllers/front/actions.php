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





/**
 * @since 1.5.0
 */
class FavoriteproductsActionsModuleFrontController extends ModuleFrontController
{
	/**
	 * @var int
	 */
	public $id_product;
	protected $favoriteProducts = [];

	public function init()
	{
		parent::init();

		require_once($this->module->getLocalPath().'FavoriteProduct.php');
		$this->id_product = (int)Tools::getValue('id_product');
	}

	public function postProcess()
	{
		if (Tools::getValue('process') == 'remove')
			$this->processRemove();
		else if (Tools::getValue('process') == 'add')
			$this->processAdd();
		exit;
	}

	/**
	 * Remove a favorite product
	 */
	public function processRemove()
	{
		// check if product exists
		$product = new Product($this->id_product);
		if (!Validate::isLoadedObject($product))
			die('0');

		// if customer not registred
		if (!$this->isRegistred()) {
			$this->favoriteProducts = (array)json_decode(Context::getContext()->cookie->favoriteProducts);

			if (($key = array_search($product->id, $this->favoriteProducts)) !== false) {
				unset($this->favoriteProducts[$key]);
				Context::getContext()->cookie->favoriteProducts = json_encode($this->favoriteProducts);
				die('0');
			}
			die('1');
		}


		$favorite_product = FavoriteProduct::getFavoriteProduct((int)Context::getContext()->cookie->id_customer, (int)$product->id);
		if ($favorite_product && $favorite_product->delete())
			die('0');
		die(1);
	}

	/**
	 * Add a favorite product
	 */
	public function processAdd()
	{
		$product = new Product($this->id_product);
		// check if product exists
		if (!Validate::isLoadedObject($product) || FavoriteProduct::isCustomerFavoriteProduct((int)Context::getContext()->cookie->id_customer, (int)$product->id)) {
			die('1');
		}

		if (!$this->isRegistred()) {
			// add ProductsId to cookies;
			// 1) read favorites array from cookies
			$this->favoriteProducts = (array)json_decode(Context::getContext()->cookie->favoriteProducts);
			// 2) add Favorite product to favorites if not_in array
			if (!in_array($product->id,$this->favoriteProducts ? $this->favoriteProducts : [])){
				$this->favoriteProducts[] = $product->id;
				Context::getContext()->cookie->favoriteProducts = json_encode($this->favoriteProducts);
				die('0');
			}
			var_dump($this->favoriteProducts);
			die('1');
		}

		$favorite_product = new FavoriteProduct();
		$favorite_product->id_product = $product->id;
		$favorite_product->id_customer = (int)Context::getContext()->cookie->id_customer;
		$favorite_product->id_shop = (int)Context::getContext()->shop->id;
		if ($favorite_product->add())
			die('0');
		die(1);
	}

	public function isRegistred()
	{
		return Context::getContext()->cookie->logged;
	}

	public function checkFavoriteProductsGuest()
	{
		$customerId = Context::getContext()->cookie->id_customer;
		$guestId = Context::getContext()->cookie->id_guest;

		if ($customerId == $guestId) {
			return false;
		}

		echo json_decode($this->favoriteProducts);
	}
}