<?php

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Loader;
use \Bitrix\Main\Application;
use \Bitrix\Main\ModuleManager;
use \Bitrix\Main\IO\Directory;
use \Bitrix\Main\Entity\Base;

Loc::loadMessages(__FILE__);

Class zserg_articles extends CModule
{
    function __construct()
	{
		$arModuleVersion = array();
		include(__DIR__."/version.php");

        if(is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_ID = "zserg.articles";
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
            $this->MODULE_NAME = Loc::getMessage("ZSERG_ARTICLES_MODULE_NAME");
            $this->MODULE_DESCRIPTION = Loc::getMessage("ZSERG_ARTICLES_MODULE_DESCRIPTION");

            $this->PARTNER_NAME = Loc::getMessage("ZSERG_ARTICLES_PARTNER_NAME");
            $this->PARTNER_URI = Loc::getMessage("ZSERG_ARTICLES_PARTNER_URI");
        }
	}

    public function GetPath($notDocumentRoot = false)
    {
        if($notDocumentRoot)
            return str_ireplace(Application::getDocumentRoot(), "", dirname(__DIR__));
        else
            return dirname(__DIR__);
    }

    public function isVersionD7()
    {
        return CheckVersion(ModuleManager::getVersion("main"), "14.00.00");
    }

    function InstallDB()
    {
        Loader::includeModule($this->MODULE_ID);

        if(!Application::getConnection(\Zserg\Articles\ArticleTable::getConnectionName())
            ->isTableExists(Base::getInstance("\Zserg\Articles\ArticleTable")->getDBTableName())
        )
        {
            Base::getInstance("\Zserg\Articles\ArticleTable")->createDbTable();
        }
    }

    function UninstallDB()
    {
        Loader::includeModule($this->MODULE_ID);

        Application::getConnection(\Zserg\Articles\ArticleTable::getConnectionName())
            ->queryExecute("drop table if exists ".Base::getInstance("\Zserg\Articles\ArticleTable")->getDBTableName());
    }

    function InstallFiles()
	{
        $pathComponents = $this->GetPath()."/install/components";
        $pathPages = $this->GetPath()."/install/pages";

        if(Directory::isDirectoryExists($pathComponents))
            CopyDirFiles($pathComponents, $_SERVER["DOCUMENT_ROOT"]."/local/components", true, true);
        else
            throw new \Bitrix\Main\IO\InvalidPathException($pathComponents);

        if(Directory::isDirectoryExists($pathPages))
            CopyDirFiles($pathPages, $_SERVER["DOCUMENT_ROOT"], true, true);
        else
            throw new \Bitrix\Main\IO\InvalidPathException($pathPages);

		return true;
	}

    function UnInstallFiles()
	{
        Directory::deleteDirectory($_SERVER["DOCUMENT_ROOT"]."/local/components/zserg/");
        Directory::deleteDirectory($_SERVER["DOCUMENT_ROOT"]."/test-page/");
		return true;
	}

    function DoInstall()
	{
		global $APPLICATION;
        if($this->isVersionD7())
        {
            ModuleManager::registerModule($this->MODULE_ID);

            $this->InstallDB();
            $this->InstallFiles();
        }
        else
        {
            $APPLICATION->ThrowException(Loc::getMessage("ZSERG_ARTICLES_INSTALL_ERROR_VERSION"));
        }

        $APPLICATION->IncludeAdminFile(Loc::getMessage("ZSERG_ARTICLES_INSTALL_TITLE"), $this->GetPath()."/install/step.php");
    }

    function DoUninstall()
	{
        global $APPLICATION;

        $this->UnInstallFiles();
        $this->UnInstallDB();

        ModuleManager::unRegisterModule($this->MODULE_ID);

        $APPLICATION->IncludeAdminFile(Loc::getMessage("ZSERG_ARTICLES_UNINSTALL_TITLE"), $this->GetPath()."/install/unstep.php");
	}
}
?>