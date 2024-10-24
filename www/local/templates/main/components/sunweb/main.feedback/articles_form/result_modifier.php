<?php

$arResult['IS_REQUIRED_MESSAGE'] = empty($arParams["REQUIRED_FIELDS"]) || in_array(
        "MESSAGE",
        $arParams["REQUIRED_FIELDS"],
    );

$arResult['IS_REQUIRED_NAME'] = empty($arParams["REQUIRED_FIELDS"]) || in_array(
        "NAME",
        $arParams["REQUIRED_FIELDS"],
    );

$arResult['IS_REQUIRED_PHONE'] = empty($arParams["REQUIRED_FIELDS"]) || in_array(
        "PHONE",
        $arParams["REQUIRED_FIELDS"],
    );