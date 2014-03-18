<?php /* Smarty version Smarty-3.1.15, created on 2014-03-18 16:08:48
         compiled from "application/views/skin/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35042409353285370dfcc69-60936340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '719e9cea8191cacdd7f17e707f31b1e8a018e92d' => 
    array (
      0 => 'application/views/skin/header.tpl',
      1 => 1386777679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35042409353285370dfcc69-60936340',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'i' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5328537103d5f0_85856691',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5328537103d5f0_85856691')) {function content_5328537103d5f0_85856691($_smarty_tpl) {?><?php if (!is_callable('smarty_function_mailto')) include '/var/www/agro-rai.com.ua/application/libraries/smarty/plugins/function.mailto.php';
?><!doctype html>
<html lang="uk">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['i']->value['description'];?>
">
		<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['i']->value['keywords'];?>
">
		<meta name="author" content="Mykola Basov">
		<link rel="shortcut icon" href="<?php echo img_url();?>
favicon.ico">
		<title><?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
 | Агрорай</title>
		<link rel="stylesheet" href="<?php echo css_url();?>
bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo css_url();?>
style.css">
	</head>
	<body>
		<div class="container wrapper">
			<div id="header">
                <div class="row">
                    <div class="col-md-4">
                        <h1><a href="<?php echo base_url();?>
">ТОВ <span>"Агрорай"</span><small>підприємство по переробці сої</small></a></h1>
                    </div>
                    <div class="col-md-6 col-md-offset-2">
                        <div id="nav" class="" data-active="<?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
">
                            <ul class="nav nav-pills">
                                <li><a href="<?php echo base_url();?>
">Головна</a></li>
                                <li><a href="<?php echo base_url();?>
beans">Соєва макуха</a></li>
                                <li><a href="<?php echo base_url();?>
oil">Соєва олія</a></li>
                                <li><a href="<?php echo base_url();?>
order">Заявка на купівлю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
<span class="space"></span>
                            <span class="glyphicon glyphicon-envelope"></span>&nbsp;<?php echo smarty_function_mailto(array('address'=>$_smarty_tpl->tpl_vars['i']->value['email'],'encode'=>"hex"),$_smarty_tpl);?>
<span class="space"></span>
                            <span class="glyphicon glyphicon-phone-alt"></span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['i']->value['phone'];?>

                        </div>
                    </div>
					<div class="col-md-6 text-right">
                        <div>
                            <span class="label label-success">Соєва олія:&nbsp;<?php echo $_smarty_tpl->tpl_vars['i']->value['oil_price'];?>
&nbsp;грн/т</span><span class="space"></span>
                            <span class="label label-success">Соєва макуха:&nbsp;<?php echo $_smarty_tpl->tpl_vars['i']->value['bean_price'];?>
&nbsp;грн/т</span>
                        </div>
					</div>
				</div>
			</div>
            <hr class="top-0">
<?php }} ?>
