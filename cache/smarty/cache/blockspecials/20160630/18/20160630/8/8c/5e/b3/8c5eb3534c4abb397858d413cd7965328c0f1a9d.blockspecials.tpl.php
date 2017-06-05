<?php /*%%SmartyHeaderCode:9731941845774b9051d5c12-27204314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c5eb3534c4abb397858d413cd7965328c0f1a9d' => 
    array (
      0 => '/var/www/prestashop/themes/default-bootstrap/modules/blockspecials/blockspecials.tpl',
      1 => 1460106276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9731941845774b9051d5c12-27204314',
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
  'unifunc' => 'content_5774b9051f0670_87763841',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5774b9051f0670_87763841')) {function content_5774b9051f0670_87763841($_smarty_tpl) {?>
<!-- MODULE Block specials -->
<div id="special_block_right" class="block">
	<p class="title_block">
        <a href="http://prestashop.dev/index.php?controller=prices-drop" title="Promotions">
            Promotions
        </a>
    </p>
	<div class="block_content products-block">
    		<ul>
        	<li class="clearfix">
            	<a class="products-block-image" href="http://prestashop.dev/index.php?id_product=5&amp;controller=product">
                    <img 
                    class="replace-2x img-responsive" 
                    src="http://prestashop.dev/img/p/1/2/12-small_default.jpg" 
                    alt="" 
                    title="Robe d&#039;été imprimée" />
                </a>
                <div class="product-content">
                	<h5>
                        <a class="product-name" href="http://prestashop.dev/index.php?id_product=5&amp;controller=product" title="Robe d&#039;été imprimée">
                            Robe d&#039;été imprimée
                        </a>
                    </h5>
                                        	<p class="product-description">
                            Longue robe imprimée à fines...
                        </p>
                                        <div class="price-box">
                    	                        	<span class="price special-price">
                                                                    34,78 €                            </span>
                                                                                                                                 <span class="price-percent-reduction">-5%</span>
                                                                                         <span class="old-price">
                                                                    36,61 €                            </span>
                            
                                            </div>
                </div>
            </li>
		</ul>
		<div>
			<a 
            class="btn btn-default button button-small" 
            href="http://prestashop.dev/index.php?controller=prices-drop" 
            title="Toutes les promos">
                <span>Toutes les promos<i class="icon-chevron-right right"></i></span>
            </a>
		</div>
    	</div>
</div>
<!-- /MODULE Block specials -->
<?php }} ?>
