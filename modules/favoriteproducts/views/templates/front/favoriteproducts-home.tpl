<div id="favoriteproducts_block_account">
    <h1 class="page-header">{l s='My favorite products' mod='favoriteproducts'}</h1>

    {if $favoriteProducts}
        <ul class="grid grid-2">
            {foreach from=$favoriteProducts item=favoriteProduct}
                <li class="item">
                    <div class="favoriteproduct inner-content box">
                        <a class="img-wrapper t-align-center" href="{$link->getProductLink($favoriteProduct.id_product, null, null, null, null, $favoriteProduct.id_shop)|escape:'html':'UTF-8'}">
                            <img class="item-image replace-retina" src="{$link->getImageLink($favoriteProduct.link_rewrite, $favoriteProduct.image, 'atmn_small')|escape:'html':'UTF-8'}" alt=""/>
                        </a>
                        <div class="item-details">
                            <a class="item-name-link" href="{$link->getProductLink($favoriteProduct.id_product, null, null, null, null, $favoriteProduct.id_shop)|escape:'html':'UTF-8'}">
                                {$favoriteProduct.name|escape:'html':'UTF-8'}
                            </a>
                            <div class="item-description">
                                {$favoriteProduct.description_short|strip_tags|escape:'html':'UTF-8'}
                            </div>
                        </div>
                        <div class="remove">
                            <a href="#" onclick="return false" rel="ajax_id_favoriteproduct_{$favoriteProduct.id_product}">
                                <span class="wpicon wpicon-close small"></span>
                            </a>
                        </div>
                    </div>
                </li>
            {/foreach}
        </ul>
    {else}
        <p class="alert alert-warning">{l s='No favorite products have been determined just yet. ' mod='favoriteproducts'}</p>
    {/if}

    <ul class="footer_links">
        <li class="back-to-myaccount">
            <a class="button-2 fill inline" href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}">
                <span class="wpicon wpicon-user"></span>{l s='Back to Your Account'}
            </a>
        </li>
    </ul>
</div>