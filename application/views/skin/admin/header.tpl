<!doctype html>
<html lang="uk">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="robots" content="noindex,nofollow">
		<meta name="author" content="Mykola Basov">
		<link rel="shortcut icon" href="{img_url()}favicon.ico">
		<title>{$p.title} | Агрорай</title>
		<link rel="stylesheet" href="{css_url()}bootstrap.min.css">
		<link rel="stylesheet" href="{css_url()}admin/style.css">
	</head>
	<body>
		<div id="nav" class="pull-left" data-active="{$p.title}">
            <h1 class="text-center bg"><a href="{base_url()}admin/">Агрорай</a></h1>
			<ul class="nav nav-pills nav-stacked">
				<li><a href="{base_url()}admin/orders/all">Замовлення<span title="Нові замовлення" class="badge pull-right">{$p.new_orders}</span></a>
				</li>
				<li><a href="{base_url()}admin/prices">Ціни</a></li>
				<li><a href="{base_url()}admin/other">Інша інформація</a></li>
                <li class="divider"></li>
                <li><a href="{base_url()}admin/auth/logout">Вийти</a></li>
			</ul>
		</div>
