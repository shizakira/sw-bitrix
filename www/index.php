<?php

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>

<?php $APPLICATION->IncludeComponent(
    "bitrix:news",
    "specialists",
    [
        "ADD_ELEMENT_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BROWSER_TITLE" => "-",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => "specialists_list",
        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
        "DETAIL_DISPLAY_TOP_PAGER" => "N",
        "DETAIL_FIELD_CODE" => [
            0 => "NAME",
            1 => "",
        ],
        "DETAIL_PAGER_SHOW_ALL" => "Y",
        "DETAIL_PAGER_TEMPLATE" => "",
        "DETAIL_PAGER_TITLE" => "Страница",
        "DETAIL_PROPERTY_CODE" => [
            0 => "",
            1 => "",
        ],
        "DETAIL_SET_CANONICAL_URL" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "staff",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "LIST_FIELD_CODE" => [
            0 => "NAME",
            1 => "PREVIEW_TEXT",
            2 => "PREVIEW_PICTURE",
            3 => "",
        ],
        "LIST_PROPERTY_CODE" => [
            0 => "WORK_EXPERIENCE",
            1 => "",
        ],
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "NEWS_COUNT" => "5",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PREVIEW_TRUNCATE_LEN" => "",
        "SEF_MODE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "",
        "STRICT_SECTION_CHECK" => "N",
        "USE_CATEGORIES" => "N",
        "USE_FILTER" => "N",
        "USE_PERMISSIONS" => "N",
        "USE_RATING" => "N",
        "USE_RSS" => "N",
        "USE_SEARCH" => "N",
        "USE_SHARE" => "N",
        "SEF_FOLDER" => "/specialists/",
        "SEF_URL_TEMPLATES" => [
            "news" => "",
            "section" => "",
            "detail" => "#ELEMENT_CODE#/",
        ],
    ],
    false,
); ?>
	<section class="articles">
		<div class="container">
			<h2 class="section__title">Статьи</h2>
			<div class="articles__wrapper">
				<div class="articles__main">
					<ul class="articles-list">
						<li class="articles-list__item">
							<div class="articles-list__img-box">
								<a class="articles-list__img-link" href="javascript:">
									<img class="articles-list__img" width="166" height="111" loading="lazy"
									     src="<?= SITE_TEMPLATE_PATH ?>/images/articles__01.jpg"
									     alt="Наш дневной стационар">
								</a>
							</div>
							<div class="articles-list__content">
								<a class="articles-list__content-title-link" href="javascript:">
									<h3 class="articles-list__content-title">Наш дневной стационар</h3>
								</a>
								<div class="articles-list__content-description">
									<p>Наши врачи уверены, что для сохранения хорошего качества жизни необходимо
										один-два раза в год проходить поддерживающий курс лечения в дневном
										стационаре.⠀</p>
								</div>
								<a class="articles-list__content-btn-link btn btn__more"
								   href="javascript:">Подробнее</a>
							</div>
						</li>
						<li class="articles-list__item">
							<div class="articles-list__img-box">
								<a class="articles-list__img-link" href="javascript:">
									<img class="articles-list__img" width="166" height="111" loading="lazy"
									     src="<?= SITE_TEMPLATE_PATH ?>/images/articles__02.jpg"
									     alt="Посетите кардиолога в Тюмени - сохраните здоровье!">
								</a>
							</div>
							<div class="articles-list__content">
								<a class="articles-list__content-title-link" href="javascript:">
									<h3 class="articles-list__content-title">Посетите кардиолога в Тюмени - сохраните
										здоровье!</h3>
								</a>
								<div class="articles-list__content-description">
									<p>Современные темпы жизни, зачастую приводят нас к тому, что времени уделить своему
										здоровью не остается или же находится множество причин откладывать визит к врачу
										«до последнего». С другой стороны, из-за малоподвижного образа...</p>
								</div>
								<a class="articles-list__content-btn-link btn btn__more"
								   href="javascript:">Подробнее</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="articles__form">
					<form class="form">
						<h3 class="form__title">Оставить отзыв</h3>
						<label class="form__label">
							<input class="form__input form__input-radio" type="radio" name="feedback-form" checked>
							<span class="form__input-radio-style"></span>
							<div class="form__label-text">О клинике</div>
						</label>
						<label class="form__label">
							<input class="form__input form__input-radio" type="radio" name="feedback-form">
							<span class="form__input-radio-style"></span>
							<div class="form__label-text">О враче</div>
						</label>
						<label class="form__label">
							<input class="form__input form__input-radio" type="radio" name="feedback-form">
							<span class="form__input-radio-style"></span>
							<div class="form__label-text">Об услуге</div>
						</label>
						<div class="form__textarea-box decore--message">
							<textarea class="form__textarea" name="" id="" placeholder="Текст отзыва"></textarea>
						</div>
						<div class="form__input-box decore--user">
							<input class="form__input" type="text" name="" placeholder="Имя*" required>
						</div>
						<div class="form__input-box decore--phone">
							<input class="form__input" type="tel" name="" id="" placeholder="Номер телефона*" required>
						</div>
						<button class="form__btn btn btn__tertiary" type="submit">Отправить</button>
						<div class="form__agree">
							<p class="form__agree-text">Нажимая кнопку “Отправить”, вы соглашаетесь с
								<a class="form__agree-link" href="javascript:">политикой конфиденциальности</a>
							</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>