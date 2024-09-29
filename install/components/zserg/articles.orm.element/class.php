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
        $request = \Bitrix\Main\HttpApplication::getInstance()->getContext()->getRequest();
        $id = $request->getQuery("id");

        $result = ArticleTable::getList(array(
            "select" => array("*"),
            "filter" => array("ID" => $id),
            "order" => array("ID" => "ASC"),
        ));

        return $result;
    }

    public function executeComponent()
    {
        $this->includeComponentLang("class.php");

        $this->checkModules();

        $result = $this->getArticlesList();

        $this->arResult = $result->fetch();

        $this->includeComponentTemplate();
    }
};