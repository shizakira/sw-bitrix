<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<?php if (!empty($arResult)): ?>
<ul class="nav__list">
    <?php
    $previousLevel = 0;
    $inCombinedLi = false;
    
    foreach ($arResult as $arItem): ?>
    
    <?php if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
        <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
    <?php endif ?>
    
    <?php if ($arItem["DEPTH_LEVEL"] == 1 && !$arItem["IS_PARENT"] && $arItem["PERMISSION"] > "D"): ?>
    
    <?php if (!$inCombinedLi): ?>
<?php $inCombinedLi = true; ?>
	<li class="nav__list-item">
        <?php endif ?>

		<a href="<?= $arItem["LINK"] ?>" class="nav__list-link"><?= $arItem["TEXT"] ?></a>
        
        <?php else: ?>
        
        <?php if ($inCombinedLi): ?>
        <?php $inCombinedLi = false; ?>
	</li>
<?php endif ?>
    
    <?php if ($arItem["IS_PARENT"]): ?>
    <?php if ($arItem["DEPTH_LEVEL"] == 1): ?>
	<li class="nav__list-item">
		<a href="<?= $arItem["LINK"] ?>"
		   class="nav__list-link <?php if ($arItem["SELECTED"]): ?>root-item-selected<?php else: ?>nav__item-toggler<?php endif ?>">
			<span></span> <?= $arItem["TEXT"] ?>
		</a>
		<ul class="nav-sub__list">
            <?php else: ?>
			<li class="nav-sub__list-item<?php if ($arItem["SELECTED"]): ?> item-selected<?php endif ?>">
				<a href="<?= $arItem["LINK"] ?>" class="nav-sub__list-link parent"><?= $arItem["TEXT"] ?></a>
				<ul>
                    <?php endif ?>
                    <?php else: ?>
                        <?php if ($arItem["PERMISSION"] > "D"): ?>
                            <?php if ($arItem["DEPTH_LEVEL"] == 1): ?>
								<li class="nav__list-item">
									<a href="<?= $arItem["LINK"] ?>" class="nav__list-link"><?= $arItem["TEXT"] ?></a>
								</li>
                            <?php else: ?>
								<li class="nav-sub__list-item">
									<a href="<?= $arItem["LINK"] ?>"
									   class="nav-sub__list-link"><?= $arItem["TEXT"] ?></a>
								</li>
                            <?php endif ?>
                        <?php else: ?>
                            <?php if ($arItem["DEPTH_LEVEL"] == 1): ?>
								<li class="nav__list-item">
									<a href="" class="nav__list-link"
									   title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a>
								</li>
                            <?php else: ?>
								<li class="nav-sub__list-item">
									<a href="" class="denied"
									   title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a>
								</li>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endif ?>
                    
                    <?php endif ?>
                    
                    <?php $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
                    <?php endforeach ?>
                    
                    <?php if ($previousLevel > 1): ?>
                        <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
                    <?php endif ?>
				</ul>
                <?php endif ?>
