<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Страница добавления записи");
?>

<form name="add-article"
	action="/test-page/add_element.php"
	method="POST"
	style="padding: 20px;"
>
	<?php for($i=1; $i<=10; $i++): ?>
		<div style="margin-bottom: 10px;">
			<label for="field<?php echo $i;?>">Поле <?php echo $i;?></label>
			<input name="field<?php echo $i;?>" type="text" id="field<?php echo $i;?>" value="">
		</div>
	<?php endfor; ?>
	<div><input type="submit" value="Сохранить элемент"></div>
</form>

<?php require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>