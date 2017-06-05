<?php /*%%SmartyHeaderCode:7366612075774b905231ff2-73908901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66eab85cdcdbdfca2e73abba879de2cb08b98e9d' => 
    array (
      0 => '/var/www/prestashop/themes/default-bootstrap/modules/blockstore/blockstore.tpl',
      1 => 1460106276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7366612075774b905231ff2-73908901',
  'variables' => 
  array (
    'link' => 0,
    'module_dir' => 0,
    'store_img' => 0,
    'store_text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5774b90523ba28_30089918',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5774b90523ba28_30089918')) {function content_5774b90523ba28_30089918($_smarty_tpl) {?>
<!-- Block stores module -->
<div id="stores_block_left" class="block">
	<p class="title_block">
		<a href="http://prestashop.dev/index.php?controller=stores" title="Nos magasins">
			Nos magasins
		</a>
	</p>
	<div class="block_content blockstore">
		<p class="store_image">
			<a href="http://prestashop.dev/index.php?controller=stores" title="Nos magasins">
				<img class="img-responsive" src="http://prestashop.dev/modules/blockstore/store.jpg" alt="Nos magasins" />
			</a>
		</p>
				<div>
			<a 
			class="btn btn-default button button-small" 
			href="http://prestashop.dev/index.php?controller=stores" 
			title="Nos magasins">
				<span>Découvrez nos magasins<i class="icon-chevron-right right"></i></span>
			</a>
		</div>
	</div>
</div>
<!-- /Block stores module -->
<?php }} ?>
