<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

<div class="articles__form">
    <?php if (!empty($arResult["ERROR_MESSAGE"])):?>
        <?php foreach ($arResult["ERROR_MESSAGE"] as $error):?>
			<div class="form-error"><?=$error?></div>
        <?php endforeach;?>
    <?php endif;?>
    
    <?php if (!empty($arResult["OK_MESSAGE"])):?>
		<div class="form__ok-text"><?=$arResult["OK_MESSAGE"]?></div>
    <?php endif;?>

	<form class="form" action="<?=POST_FORM_ACTION_URI?>" method="POST">
        <?=bitrix_sessid_post()?>

		<h3 class="form__title"><?=Loc::getMessage("MFT_TITLE")?></h3>

		<label class="form__label">
			<input class="form__input form__input-radio" type="radio" name="feedback_type" value="clinic" checked="">
			<span class="form__input-radio-style"></span>
			<div class="form__label-text"><?=Loc::getMessage("MFT_CLINIC")?></div>
		</label>
		<label class="form__label">
			<input class="form__input form__input-radio" type="radio" name="feedback_type" value="doctor">
			<span class="form__input-radio-style"></span>
			<div class="form__label-text"><?=Loc::getMessage("MFT_DOCTOR")?></div>
		</label>
		<label class="form__label">
			<input class="form__input form__input-radio" type="radio" name="feedback_type" value="service">
			<span class="form__input-radio-style"></span>
			<div class="form__label-text"><?=Loc::getMessage("MFT_SERVICE")?></div>
		</label>

		<div class="form__textarea-box decore--message">
            <textarea class="form__textarea"
                      name="MESSAGE" rows="5"
                      placeholder="<?=Loc::getMessage("MFT_MESSAGE")?><?=$arResult['IS_REQUIRED_MESSAGE'] ? '*' : '' ?>"><?=($arResult["MESSAGE"] ?? '')?></textarea>
		</div>

		<div class="form__input-box decore--user">
			<input class="form__input" type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>"
			       placeholder="<?=Loc::getMessage("MFT_NAME")?><?=$arResult['IS_REQUIRED_NAME'] ? '*' : '' ?>" >
		</div>

		<div class="form__input-box decore--phone">
			<input class="form__input" type="tel" name="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>"
			       placeholder="<?=Loc::getMessage("MFT_PHONE")?><?=$arResult['IS_REQUIRED_NAME'] ? '*' : '' ?>">
		</div>


		<button class="form__btn btn btn__tertiary" type="submit"
		        name="submit" value="<?=Loc::getMessage("MFT_SUBMIT")?>"><?=Loc::getMessage("MFT_SUBMIT")?></button>

		<div class="form__agree">
			<p class="form__agree-text">
                <?=Loc::getMessage("MFT_AGREE_ONE")?><a class="form__agree-link" href="javascript:;">
                    <?=Loc::getMessage("MFT_AGREE_TWO")?></a>
			</p>
		</div>
		<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
	</form>
</div>

<!--    --><?php //if (!empty($arResult["ERROR_MESSAGE"])) {
//        foreach ($arResult["ERROR_MESSAGE"] as $v) {
//            ShowError($v);
//        }
//    }
//    if (!empty($arResult["OK_MESSAGE"])) {
//        ?>
<!--		<div class="mf-ok-text">--><?php //= $arResult["OK_MESSAGE"] ?><!--</div>--><?php
//    }
//    ?>
<!---->
<!--	<form action="--><?php //= POST_FORM_ACTION_URI ?><!--" method="POST">-->
<!--        --><?php //= bitrix_sessid_post() ?>
<!--		<div class="mf-name">-->
<!--			<div class="mf-text">-->
<!--                --><?php //= GetMessage("MFT_NAME") ?><!----><?php //if (empty($arParams["REQUIRED_FIELDS"]) || in_array(
//                        "NAME",
//                        $arParams["REQUIRED_FIELDS"],
//                    )): ?><!--<span class="mf-req">*</span>--><?php //endif ?>
<!--			</div>-->
<!--			<input type="text" name="user_name" value="--><?php //= $arResult["AUTHOR_NAME"] ?><!--">-->
<!--		</div>-->
<!---->
<!--		<div class="mf-phone">-->
<!--			<div class="mf-text">-->
<!--                --><?php //= GetMessage("MFT_PHONE") ?><!----><?php //if (empty($arParams["REQUIRED_FIELDS"]) || in_array(
//                        "PHONE",
//                        $arParams["REQUIRED_FIELDS"],
//                    )): ?>
<!--					<span class="mf-req">*</span>-->
<!--                --><?php //endif ?>
<!--			</div>-->
<!--			<input type="text" name="user_phone" value="--><?php //= $arResult["AUTHOR_PHONE"] ?><!--">-->
<!--		</div>-->
<!---->
<!--		<div class="mf-message">-->
<!--			<div class="mf-text">-->
<!--                --><?php //= GetMessage("MFT_MESSAGE") ?>
<!--                -->
<!--                --><?php //if (empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])): ?>
<!--					<span class="mf-req">*</span>-->
<!--                --><?php //endif ?>
<!--			</div>-->
<!--			<textarea name="MESSAGE" rows="5" cols="40">--><?php //= ($arResult["MESSAGE"] ?? '') ?><!--</textarea>-->
<!--		</div>-->
<!--        -->
<!--        --><?php //if ($arParams["USE_CAPTCHA"] == "Y"): ?>
<!--			<div class="mf-captcha">-->
<!--				<div class="mf-text">--><?php //= GetMessage("MFT_CAPTCHA") ?><!--</div>-->
<!--				<input type="hidden" name="captcha_sid" value="--><?php //= $arResult["capCode"] ?><!--">-->
<!--				<img src="/bitrix/tools/captcha.php?captcha_sid=--><?php //= $arResult["capCode"] ?><!--" width="180" height="40"-->
<!--				     alt="CAPTCHA">-->
<!--				<div class="mf-text">--><?php //= GetMessage("MFT_CAPTCHA_CODE") ?><!--<span class="mf-req">*</span></div>-->
<!--				<input type="text" name="captcha_word" size="30" maxlength="50" value="">-->
<!--			</div>-->
<!--        --><?php //endif; ?>
<!--		<input type="hidden" name="PARAMS_HASH" value="--><?php //= $arResult["PARAMS_HASH"] ?><!--">-->
<!--		<input type="submit" name="submit" value="--><?php //= GetMessage("MFT_SUBMIT") ?><!--">-->
<!--	</form>-->
<!--</div>-->
