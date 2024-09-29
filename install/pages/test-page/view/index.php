<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Страница записи");
?>

<?php $APPLICATION->IncludeComponent(
	"zserg:articles.orm.element",
	"",
    Array()
);?>

<?php require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>