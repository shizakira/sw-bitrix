<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Bitrix\Iblock\Elements\ElementSpecialistsTable as Specialists;

Loader::includeModule('iblock');

$aMenuLinksExt = [];

$elements = Specialists::getList([
    'select' => ['ID', 'NAME'],
])->fetchAll();

foreach ($elements as $element) {
    $aMenuLinksExt[] = [
        $element['NAME'],
        '/specialists/' . $element['ID'] . '/',
        [],
        [],
        '',
    ];
}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>