<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main;
use \Zserg\Articles\ArticleTable;

class addArticle
{
    private $arResult;

    public function __construct()
    {
        if (!Main\Loader::includeModule("zserg.articles"))
            throw new Main\LoaderException("Не удалось загрузить модуль статей");
    }

    public function executeRequest()
    {
        $request = \Bitrix\Main\HttpApplication::getInstance()->getContext()->getRequest();

        $result = $this->addArticle($request->getPostList()->getValues());

        if($result->isSuccess())
        {
            $id = $result->getId();
            $this->arResult = "Запись добавлена с id ".$id;
        }
        else
        {
            $error = $result->getErrorMessages();
            $this->arResult = "Произошла ошибка при добавлении: <pre>".var_export($error,true)."</pre>";
        }

        echo $this->arResult;
    }

    function addArticle($request)
    {
        $result = ArticleTable::add($request);

        return $result;
    }

}

$addArticle = new addArticle();
$addArticle->executeRequest();