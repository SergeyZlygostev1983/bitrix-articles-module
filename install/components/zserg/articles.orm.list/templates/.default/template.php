<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

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
?>

<div>
    <?php foreach($arResult as $el): ?>
        <div>
            <a href="/test-page/view/?id=<?php echo $el["ID"] ?>">Элемент <?php echo $el["ID"] ?></a>
        </div>
        <div>Поле 1 - <?php echo $el["field1"] ?></div>
        <div>Поле 2 - <?php echo $el["field2"] ?></div>
        <div>Поле 3 - <?php echo $el["field3"] ?></div>
    <?php endforeach; ?>
</div>