<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();

$asset->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/main.js');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/images/favicon.svg" type="image/svg+xml">
	<title>Первая кардиоклиника в Тюмени, официальный сайт кардиологии на ул Фабричной д 7</title>
    <?php $APPLICATION->ShowHead(); ?>
</head>
<body>
    <?php $APPLICATION->ShowPanel(); ?>
<div class="page">
	<header class="header header--fixed">
		<div class="container">
			<div class="header__bottom">
				<div class="header__logo logo">
					<a class="logo__link" href="/">
						<img src="<?= SITE_TEMPLATE_PATH ?>/images/logo.gif" alt="Логотип: Первая кардиоклиника">
					</a>
				</div>

				<div class="header__group-btn">
					<div class="header__exclamation modal__btn" data-target="#consultation" title="Онлайн консультации">
						<div class="header__exclamation-icon">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
							     xmlns="http://www.w3.org/2000/svg">
								<path
									d="M12 9V12.75M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM12 15.75H12.0075V15.7575H12V15.75Z"
									stroke="#8D8D8D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>
						<div class="header__exclamation-text">Онлайн консультации</div>
					</div>
					<button class="header__btn btn__primary menu nav-menu__toggler" title="Меню сайта">
						<div class="menu__wrapper">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<div class="header__btn-text">Меню сайта</div>
					</button>
				</div>
				<nav class="header__nav nav">
					<div class="container">
						<div class="header__nav-wrapper">
							<div class="header__nav-top-content"></div>
							<ul class="nav__list">
								<li class="nav__list-item">
									<a class="nav__list-link nav__item-toggler" href="javascript:">
										<span></span> Специалисты
									</a>
									<ul class="nav-sub__list">
										<li class="nav-sub__list-item">
											<a class="nav-sub__list-link" href="javascript:">Валеева Венера
												Исмаиловна</a>
										</li>
										<li class="nav-sub__list-item">
											<a class="nav-sub__list-link" href="javascript:">Дементьева Наталья
												Владимировна</a>
										</li>
										<li class="nav-sub__list-item">
											<a class="nav-sub__list-link" href="javascript:">Савельева Нина Юрьевна</a>
										</li>
										<li class="nav-sub__list-item">
											<a class="nav-sub__list-link" href="javascript:">Савельева Нина Юрьевна</a>
										</li>
										<li class="nav-sub__list-item">
											<a class="nav-sub__list-link" href="javascript:">Ярцева Ирина Артуровна</a>
										</li>
									</ul>
								</li>
								<li class="nav__list-item">
									<a class="nav__list-link nav__item-toggler" href="javascript:">
										<span></span> О клинике
									</a>
									<ul class="nav-sub__list">
										<li class="nav-sub__list-item">
											<a class="nav-sub__list-link" href="javascript:">Лицензии</a>
										</li>
										<li class="nav-sub__list-item">
											<a class="nav-sub__list-link" href="javascript:">Правовая информация</a>
										</li>
										<li class="nav-sub__list-item">
											<a class="nav-sub__list-link" href="javascript:">Реквизиты</a>
										</li>
										<li class="nav-sub__list-item">
											<a class="nav-sub__list-link" href="javascript:">Партнеры</a>
										</li>
										<li class="nav-sub__list-item">
											<a class="nav-sub__list-link" href="javascript:">Вакансии</a>
										</li>
									</ul>
								</li>
								<li class="nav__list-item">
									<a class="nav__list-link" href="javascript:">Статьи</a>
									<a class="nav__list-link" href="javascript:">Прайс-лист</a>
									<a class="nav__list-link" href="javascript:">Акции</a>
									<a class="nav__list-link" href="javascript:">Контакты</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</header>
	<main class="main">

						