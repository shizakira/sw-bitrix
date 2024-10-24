<?php

use Bitrix\Main\Event;
use Bitrix\Main\Loader;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$arResult["PARAMS_HASH"] = md5(serialize($arParams) . $this->GetTemplateName());

$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"] ?? '');
if ($arParams["EVENT_NAME"] == '') {
    $arParams["EVENT_NAME"] = "FEEDBACK_FORM";
}
$arParams["EMAIL_TO"] = trim($arParams["EMAIL_TO"] ?? '');
if ($arParams["EMAIL_TO"] == '') {
    $arParams["EMAIL_TO"] = COption::GetOptionString("main", "email_from");
}
$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"] ?? '');
if ($arParams["OK_TEXT"] == '') {
    $arParams["OK_TEXT"] = GetMessage("MF_OK_MESSAGE");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["submit"]) && (!isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"])) {
    $arResult["ERROR_MESSAGE"] = [];
    if (check_bitrix_sessid()) {
        if (empty($arParams["REQUIRED_FIELDS"]) || !in_array("NONE", $arParams["REQUIRED_FIELDS"])) {
            if ((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && mb_strlen(
                    $_POST["user_name"],
                ) <= 1) {
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_NAME");
            }
            if ((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && mb_strlen(
                    $_POST["user_phone"],
                ) <= 1) {
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PHONE");
            }
        }
        if (mb_strlen($_POST["user_email"]) > 1 && !check_email($_POST["user_email"])) {
            $arResult["ERROR_MESSAGE"][] = GetMessage("MF_EMAIL_NOT_VALID");
        }
        if ($arParams["USE_CAPTCHA"] == "Y") {
            $captcha_code = $_POST["captcha_sid"];
            $captcha_word = $_POST["captcha_word"];
            $cpt = new CCaptcha();
            $captchaPass = COption::GetOptionString("main", "captcha_password", "");
            if ($captcha_word <> '' && $captcha_code <> '') {
                if (!$cpt->CheckCodeCrypt($captcha_word, $captcha_code, $captchaPass)) {
                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTCHA_WRONG");
                }
            } else {
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTHCA_EMPTY");
            }
        }

        if (empty($arResult["ERROR_MESSAGE"])) {
            $arFields = [
                "AUTHOR" => $_POST["user_name"],
                "PHONE" => $_POST["user_phone"],
                "EMAIL_TO" => $arParams["EMAIL_TO"],
                "TEXT" => $_POST["MESSAGE"] ?? '',
                "FEEDBACK_TYPE" => $_POST["feedback_type"]  ?? '',
            ];

            if (Loader::includeModule('iblock')) {
                $element = new CIBlockElement();
                $iblockID = $arParams['IBLOCK_ID'];
                $arTranslitParams = ["replace_space" => "-", "replace_other" => "-"];
                $code = Cutil::translit(strtolower($arFields['AUTHOR']), "ru", $arTranslitParams);
                $arLoadProductArray = [
                    "IBLOCK_ID" => $iblockID,
                    "ACTIVE" => "Y",
                    "NAME" => $arFields['AUTHOR'],
                    "CODE" => $code,
                    "PREVIEW_TEXT" => $arFields['FEEDBACK_TYPE'],
                    "DETAIL_TEXT" => $arFields['TEXT'],
                    "PROPERTY_VALUES" => [
                        "PHONE" => $arFields['PHONE'],
                    ],
                ];
                $element->Add($arLoadProductArray);
            }
            if (!empty($arParams["EVENT_MESSAGE_ID"])) {
                foreach ($arParams["EVENT_MESSAGE_ID"] as $v) {
                    if (intval($v) > 0) {
                        CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields, "N", intval($v));
                    }
                }
            } else {
                CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields);
            }

            $_SESSION["MF_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
            $_SESSION["MF_PHONE"] = htmlspecialcharsbx($_POST["user_phone"]);
            $event = new Event('main', 'onFeedbackFormSubmit', $arFields);
            $event->send();
            LocalRedirect($APPLICATION->GetCurPageParam("success=" . $arResult["PARAMS_HASH"], ["success"]));
        }

        $arResult["MESSAGE"] = htmlspecialcharsbx($_POST["MESSAGE"]);
        $arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
        $arResult["AUTHOR_PHONE"] = htmlspecialcharsbx($_POST["user_phone"]);
        $arResult["FEEDBACK_TYPE"] = htmlspecialcharsbx($_POST["feedback_type"]);
    } else {
        $arResult["ERROR_MESSAGE"][] = GetMessage("MF_SESS_EXP");
    }
} elseif (isset($_REQUEST["success"]) && $_REQUEST["success"] == $arResult["PARAMS_HASH"]) {
    $arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}


if ($arParams["USE_CAPTCHA"] == "Y") {
    $arResult["capCode"] = htmlspecialcharsbx($APPLICATION->CaptchaGetCode());
}

$this->IncludeComponentTemplate();
