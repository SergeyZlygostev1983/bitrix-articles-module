<?php

use \Bitrix\Main;
use \Bitrix\Main\Localization\Loc;
use \Zserg\Articles\ArticleTable;

class articlesOrmList extends CBitrixComponent
{
    protected function checkModules()
    {
        if (!Main\Loader::includeModule("zserg.articles"))
            throw new Main\LoaderException(Loc::getMessage("ZSERG_ARTICLES_MODULE_NOT_INSTALLED"));
    }

    function getArticlesList()
    {
        $result = ArticleTable::getList(array(
            "select" => array("ID", "field1", "field2", "field3"),
            "filter" => array(),
            "order" => array("ID" => "ASC"),
        ));

        return $result;
    }


    public function executeComponent()
    {
        $this->includeComponentLang("class.php");

        $this->checkModules();

        $result = $this->getArticlesList();

        $this->arResult = $result->fetchAll();

        $this->includeComponentTemplate();
    }
};