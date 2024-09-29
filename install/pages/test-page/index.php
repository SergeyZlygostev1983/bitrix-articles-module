<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Список записей");
?>

<?php $APPLICATION->IncludeComponent(
	"zserg:articles.orm.list",
	"",
    Array()
);?>

<?php require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>