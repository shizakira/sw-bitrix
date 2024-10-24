<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

</main>
<footer class="footer">
	<div class="container">
		<div class="footer__wrapper">
			<div class="footer__top">
				<div class="footer__logo logo">
					<a class="logo__link" href="/">
						<img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/logo--footer.svg"
						     alt="<?= Loc::getMessage('LOGO_ALT')?>">
					</a>
				</div>
				<div class="footer__group">
					<ul class="info-list">
						<li class="info-list__item info-list__item--phone">
							<div class="info-list__item-text">
                                <?php $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    [
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_TEMPLATE_PATH . "/include_areas/footer_phone_one.php",
                                    ],
                                ); ?>
							</div>
						</li>
						<li class="info-list__item info-list__item--phone">
							<div class="info-list__item-text">
                                <?php $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    [
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_TEMPLATE_PATH . "/include_areas/footer_phone_two.php",
                                    ],
                                ); ?>
							</div>
						</li>
						<li class="info-list__item info-list__item--email">
							<div class="info-list__item-text">
                                <?php $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    [
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_TEMPLATE_PATH . "/include_areas/footer_phone_email.php",
                                    ],
                                ); ?>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="footer__bottom">
				<nav class="footer-nav">
                    <?php $APPLICATION->IncludeComponent(
                        "sunweb:menu",
                        "footer_menu",
                        [
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "submain",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => [
                            ],
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "main",
                            "USE_EXT" => "Y",
                            "COMPONENT_TEMPLATE" => "footer_nav",
                        ],
                        false,
                    ); ?>
				</nav>
			</div>
			<div class="footer__watermark">
				<div class="footer__watermark-copyright">
					© <?= date('Y') ?> ©
					<?= loc::getMessage('COPYRIGHTS')?>
				</div>
				<a class="footer__watermark-dev-link" href="javascript:">
					<img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/dev-logo.svg" alt="<?= Loc::getMessage('OUR_PARTNER')?>">
				</a>
			</div>
		</div>
	</div>
</footer>

<dialog class="modal modal--top-images" id="consultation">
	<div class="container">
		<div class="modal__content modal__search">
			<div class="modal__close">
				<div class="modal_close close nav_toggler active">
					<div class="close__wrapper">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
			</div>
			<div class="modal__content-img-box">
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    [
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_TEMPLATE_PATH . "/include_areas/img_modal_consultations.php",
                    ],
                ); ?>
			</div>
			<div class="modal__content-wrapper">
				<div class="modal__content-text">
					<p>
                        <?php $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            [
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_TEMPLATE_PATH . "/include_areas/text_modal_consultations.php",
                            ],
                        ); ?>
					</p>
				</div>
			</div>

		</div>
	</div>
</dialog>
</div>
</body>
</html>