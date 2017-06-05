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
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5774ba15253741_46098381',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5774ba15253741_46098381')) {function content_5774ba15253741_46098381($_smarty_tpl) {?>
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
            	<a class="products-block-image" href="http://prestashop.dev/index.php?id_product=7&amp;controller=product">
                    <img 
                    class="replace-2x img-responsive" 
                    src="http://prestashop.dev/img/p/2/0/20-small_default.jpg" 
                    alt="" 
                    title="Robe en mousseline imprimée" />
                </a>
                <div class="product-content">
                	<h5>
                        <a class="product-name" href="http://prestashop.dev/index.php?id_product=7&amp;controller=product" title="Robe en mousseline imprimée">
                            Robe en mousseline imprimée
                        </a>
                    </h5>
                                        	<p class="product-description">
                            Robe en mousseline imprimée à...
                        </p>
                                        <div class="price-box">
                    	                        	<span class="price special-price">
                                                                    19,68 €                            </span>
                                                                                                                                 <span class="price-percent-reduction">-20%</span>
                                                                                         <span class="old-price">
                                                                    24,60 €                            </span>
                            
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
