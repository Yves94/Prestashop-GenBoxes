<?php /* Smarty version Smarty-3.1.19, created on 2016-07-20 16:50:01
         compiled from "/var/www/prestashop/modules/genboxes/addButton.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1472985325578f8f99d157f9-48954416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c88d370bb69cf84715a8c5f78a3510b9d5136a66' => 
    array (
      0 => '/var/www/prestashop/modules/genboxes/addButton.tpl',
      1 => 1465551251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1472985325578f8f99d157f9-48954416',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idBox' => 0,
    'link' => 0,
    'about' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_578f8f99d1a1f1_04403151',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_578f8f99d1a1f1_04403151')) {function content_578f8f99d1a1f1_04403151($_smarty_tpl) {?><div class="pull-right" style="margin-bottom: 10px;">

    <?php if ($_smarty_tpl->tpl_vars['idBox']->value) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules');?>
&configure=genboxes">
            <button class="btn btn-lg btn-default">
                <span class="icon-arrow-left"></span> Liste Box
            </button>
        </a>
    <?php }?>
    
    <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules');?>
&configure=genboxes&<?php echo $_smarty_tpl->tpl_vars['about']->value;?>
&id_box=<?php echo $_smarty_tpl->tpl_vars['idBox']->value;?>
">
        <button class="btn btn-lg btn-default">
            <span class="icon-plus"></span> Ajouté
        </button>
    </a>
    
</div><?php }} ?>
