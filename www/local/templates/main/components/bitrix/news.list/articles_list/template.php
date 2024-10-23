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
$this->setFrameMode(true);
?>

	<div class="articles__main">
		<ul class="articles-list">
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
				<li class="articles-list__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					<div class="articles-list__img-box">
						<a class="articles-list__img-link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                            <?php
                            $arFileTmp = CFile::ResizeImageGet(
                                $arItem['PREVIEW_PICTURE'],
                                ["width" => 166, "height" => 111],
                                BX_RESIZE_IMAGE_EXACT,
                                true,
                            );
                            ?>
							<img class="articles-list__img"
							     src="<?= $arFileTmp['src'] ?>"
							     alt="<?= $arItem['NAME'] ?>">
						</a>
					</div>
					<div class="articles-list__content">
						<a class="articles-list__content-title-link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
							<h3 class="articles-list__content-title"><?= $arItem['NAME'] ?>"</h3>
						</a>
						<div class="articles-list__content-description">
							<p><?= $arItem['PREVIEW_TEXT'] ?>"⠀</p>
						</div>
						<a class="articles-list__content-btn-link btn btn__more"
						   href="<?= $arItem['DETAIL_PAGE_URL'] ?>">Подробнее</a>
					</div>
				</li>
            <?php endforeach; ?>
		</ul>
	</div>


