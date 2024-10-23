<?php

foreach ($arResult['ITEMS'] as $key => $arItem) {
    $arImageDesktop = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE'],
        ["width" => 166, "height" => 111],
        BX_RESIZE_IMAGE_EXACT,
        true,
    );
    
    $arImageMobile = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE'],
        ["width" => 438, "height" => 233],
        BX_RESIZE_IMAGE_EXACT,
        true,
    );
    $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC_MOBILE'] = $arImageMobile['src'];
    $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC_DESKTOP'] = $arImageDesktop['src'];

}