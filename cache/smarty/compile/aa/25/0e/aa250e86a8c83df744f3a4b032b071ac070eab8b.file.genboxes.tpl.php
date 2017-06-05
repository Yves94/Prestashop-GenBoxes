<?php /* Smarty version Smarty-3.1.19, created on 2016-07-20 17:40:57
         compiled from "/var/www/prestashop/modules/genboxes/genboxes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1601067863578f9b89d0ed57-06466956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa250e86a8c83df744f3a4b032b071ac070eab8b' => 
    array (
      0 => '/var/www/prestashop/modules/genboxes/genboxes.tpl',
      1 => 1469029165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1601067863578f9b89d0ed57-06466956',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'boxes' => 0,
    'kbox' => 0,
    'libelle' => 0,
    'box' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_578f9b89d15344_68172124',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_578f9b89d15344_68172124')) {function content_578f9b89d15344_68172124($_smarty_tpl) {?><!-- Block genboxes -->
<div id="genboxes_block_home" class="block" style="margin-top: 210px;">
    <h4>Ventes Flash de Box</h4>
    <div class="block_content">
        
        <?php if (isset($_smarty_tpl->tpl_vars['boxes']->value)) {?>

            <div class="row">
                <?php  $_smarty_tpl->tpl_vars['box'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['box']->_loop = false;
 $_smarty_tpl->tpl_vars['kbox'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['boxes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['box']->key => $_smarty_tpl->tpl_vars['box']->value) {
$_smarty_tpl->tpl_vars['box']->_loop = true;
 $_smarty_tpl->tpl_vars['kbox']->value = $_smarty_tpl->tpl_vars['box']->key;
?>
                    <?php $_smarty_tpl->tpl_vars['libelle'] = new Smarty_variable(explode("|",$_smarty_tpl->tpl_vars['kbox']->value), null, 0);?>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['libelle']->value[0];?>
</h3>
                            </div>
                            <div class="panel-body">
                                <p><?php echo $_smarty_tpl->tpl_vars['libelle']->value[1];?>
</p>

                                <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['box']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                                    <div style="border: 1px solid #ccc">
                                        <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_smarty_tpl->tpl_vars['product']->value['url'];?>
"/>

                                        <span><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</span>
                                    </div>
                                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" class="idProduct">
                                    <br>
                                <?php } ?>
                                 
                                <a href="javascript:void(0)" class="addCart" style="display:block; text-align: center;">
                                    <button type="button" class="btn btn-primary btn-lg">Ajouter au Panier</button>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        <?php } else { ?>
            <div>Aucune box pour l'instant</div>
        <?php }?>
        
    </div>
</div>

<script type="text/javascript">
    
    $(function() {
        $('.addCart').click(function() {
            var idProduct = $(this).parent().parent().find('.idProduct');
            $(idProduct).each(function(i, v) {
                ajaxCart.add($(v).val(), null, false, this, 1);
            });
        })
    });

</script>
<!-- /Block genboxes -->
<?php }} ?>
