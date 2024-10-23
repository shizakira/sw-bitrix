<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$this->setFrameMode(true);
?>
<section class="doctors">
	<div class="container">
		<h2 class="section__title">Наши специалисты</h2>
		<ul class="doctors-list">
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <?php
                $this->AddEditAction(
                    $arItem['ID'],
                    $arItem['EDIT_LINK'],
                    CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"),
                );
                $this->AddDeleteAction(
                    $arItem['ID'],
                    $arItem['DELETE_LINK'],
                    CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                    ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')],
                );
                ?>
				<li class="doctors-list__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					<a class="doctors-list__item-link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
						<div class="doctors-list__item-img-box">
                            <?php
                            $arFileTmp = CFile::ResizeImageGet(
                                $arItem['PREVIEW_PICTURE'],
                                ["width" => 302, "height" => 218],
                                BX_RESIZE_IMAGE_PROPORTIONAL,
                                false,
                            );
                            ?>
							<img class="doctors-list__item-img"
							     src="<?= $arFileTmp['src'] ?>" alt="<?= $arItem['NAME'] ?>">
						</div>
						<div class="doctors-list__item-content">
							<h3 class="doctors-list__item-title"><?= $arItem['NAME'] ?></h3>
							<div class="doctors-list__item-degree"><?= $arItem['PREVIEW_TEXT'] ?></div>
							<div class="doctors-list__item-experience">
                                <?= $arItem['DISPLAY_PROPERTIES']['WORK_EXPERIENCE']['VALUE'] ?>
							</div>
							<div class="doctors-list__item-btn-more btn btn__more">Подробнее</div>
						</div>
					</a>
				</li>
            <?php endforeach; ?>
		</ul>
		<a class="doctors__btn btn btn__primary" href="javascript:">
			<?= Loc::getMessage('SEE_EVERYONE')?> (<?= $arResult['SPECIALISTS_COUNT']?>)
		</a>
	</div>
</section>
