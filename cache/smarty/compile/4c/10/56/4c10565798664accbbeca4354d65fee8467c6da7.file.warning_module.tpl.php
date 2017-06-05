<?php /* Smarty version Smarty-3.1.19, created on 2016-07-20 17:13:32
         compiled from "/var/www/prestashop/admin538emxr7d/themes/default/template/controllers/modules/warning_module.tpl" */ ?>
<?php /*%%SmartyHeaderCode:589558237578f951c7e26d0-50312492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c10565798664accbbeca4354d65fee8467c6da7' => 
    array (
      0 => '/var/www/prestashop/admin538emxr7d/themes/default/template/controllers/modules/warning_module.tpl',
      1 => 1460106276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '589558237578f951c7e26d0-50312492',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_link' => 0,
    'text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_578f951c7e4447_67644331',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_578f951c7e4447_67644331')) {function content_578f951c7e4447_67644331($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module_link']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</a><?php }} ?>
