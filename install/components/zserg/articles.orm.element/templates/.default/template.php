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
    <div>Поле 1 - <?php echo $arResult["field1"] ?></div>
    <div>Поле 2 - <?php echo $arResult["field2"] ?></div>
    <div>Поле 3 - <?php echo $arResult["field3"] ?></div>
    <div>Поле 4 - <?php echo $arResult["field4"] ?></div>
    <div>Поле 5 - <?php echo $arResult["field5"] ?></div>
    <div>Поле 6 - <?php echo $arResult["field6"] ?></div>
    <div>Поле 7 - <?php echo $arResult["field7"] ?></div>
    <div>Поле 8 - <?php echo $arResult["field8"] ?></div>
    <div>Поле 9 - <?php echo $arResult["field9"] ?></div>
    <div>Поле 10 - <?php echo $arResult["field10"] ?></div>
</div>