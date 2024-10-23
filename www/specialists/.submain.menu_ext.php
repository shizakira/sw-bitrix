<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Bitrix\Iblock\Elements\ElementSpecialistsTable as Specialists;

Loader::includeModule('iblock');

$aMenuLinksExt = [];

$elements = Specialists::getList([
    'select' => ['NAME', 'CODE'],
])->fetchCollection();

foreach ($elements as $element) {
    $aMenuLinksExt[] = [
        $element->getName(),
        '/specialists/' . $element->getCode(),
        [],
        [],
        '',
    ];
}

$aMenuLinks =[...$aMenuLinks, ...$aMenuLinksExt];
?>