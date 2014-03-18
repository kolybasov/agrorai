<!doctype html>
<html lang="uk">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="{$i.description}">
		<meta name="keywords" content="{$i.keywords}">
		<meta name="author" content="Mykola Basov">
		<link rel="shortcut icon" href="{img_url()}favicon.ico">
		<title>{$p.title} | Агрорай</title>
		<link rel="stylesheet" href="{css_url()}bootstrap.min.css">
		<link rel="stylesheet" href="{css_url()}style.css">
	</head>
	<body>
		<div class="container wrapper">
			<div id="header">
                <div class="row">
                    <div class="col-md-4">
                        <h1><a href="{base_url()}">ТОВ <span>"Агрорай"</span><small>підприємство по переробці сої</small></a></h1>
                    </div>
                    <div class="col-md-6 col-md-offset-2">
                        <div id="nav" class="" data-active="{$p.title}">
                            <ul class="nav nav-pills">
                                <li><a href="{base_url()}">Головна</a></li>
                                <li><a href="{base_url()}beans">Соєва макуха</a></li>
                                <li><a href="{base_url()}oil">Соєва олія</a></li>
                                <li><a href="{base_url()}order">Заявка на купівлю</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <span class="glyphicon glyphicon-user"></span>&nbsp;{$i.name}<span class="space"></span>
                            <span class="glyphicon glyphicon-envelope"></span>&nbsp;{mailto address=$i.email encode="hex"}<span class="space"></span>
                            <span class="glyphicon glyphicon-phone-alt"></span>&nbsp;{$i.phone}
                        </div>
                    </div>
					<div class="col-md-6 text-right">
                        <div>
                            <span class="label label-success">Соєва олія:&nbsp;{$i.oil_price}&nbsp;грн/т</span><span class="space"></span>
                            <span class="label label-success">Соєва макуха:&nbsp;{$i.bean_price}&nbsp;грн/т</span>
                        </div>
					</div>
				</div>
			</div>
            <hr class="top-0">
