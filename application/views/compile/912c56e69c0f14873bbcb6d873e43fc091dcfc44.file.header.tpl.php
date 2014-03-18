<?php /* Smarty version Smarty-3.1.15, created on 2014-03-18 16:09:13
         compiled from "application/views/skin/admin/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124054210853285389064749-90625201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '912c56e69c0f14873bbcb6d873e43fc091dcfc44' => 
    array (
      0 => 'application/views/skin/admin/header.tpl',
      1 => 1386712007,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124054210853285389064749-90625201',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_532853891634a5_57595499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532853891634a5_57595499')) {function content_532853891634a5_57595499($_smarty_tpl) {?><!doctype html>
<html lang="uk">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="robots" content="noindex,nofollow">
		<meta name="author" content="Mykola Basov">
		<link rel="shortcut icon" href="<?php echo img_url();?>
favicon.ico">
		<title><?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
 | Агрорай</title>
		<link rel="stylesheet" href="<?php echo css_url();?>
bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo css_url();?>
admin/style.css">
	</head>
	<body>
		<div id="nav" class="pull-left" data-active="<?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
">
            <h1 class="text-center bg"><a href="<?php echo base_url();?>
admin/">Агрорай</a></h1>
			<ul class="nav nav-pills nav-stacked">
				<li><a href="<?php echo base_url();?>
admin/orders/all">Замовлення<span title="Нові замовлення" class="badge pull-right"><?php echo $_smarty_tpl->tpl_vars['p']->value['new_orders'];?>
</span></a>
				</li>
				<li><a href="<?php echo base_url();?>
admin/prices">Ціни</a></li>
				<li><a href="<?php echo base_url();?>
admin/other">Інша інформація</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url();?>
admin/auth/logout">Вийти</a></li>
			</ul>
		</div>
<?php }} ?>
