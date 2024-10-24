<?php
$arResult['SPECIALISTS_COUNT'] = count($arResult['ITEMS']);

foreach ($arResult['ITEMS'] as $key =>$arItem) {
    $arFileTmp = CFile::ResizeImageGet(
        $arItem["PREVIEW_PICTURE"]["ID"],
        ["width" => 302, "height" => 218],
        BX_RESIZE_IMAGE_EXACT,
        true
    );
    
    $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC'] = $arFileTmp['src'];
}