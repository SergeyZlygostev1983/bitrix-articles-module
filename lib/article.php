<?php

namespace Zserg\Articles;

use \Bitrix\Main\Entity;
use \Bitrix\Main\Type;

class ArticleTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return "zserg_articles";
    }

    public static function getConnectionName()
    {
        return "default";
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField("ID", array(
                "primary" => true,
                "autocomplete" => true,
            )),
            new Entity\StringField("field1"),
            new Entity\StringField("field2"),
            new Entity\StringField("field3"),
            new Entity\StringField("field4"),
            new Entity\StringField("field5"),
            new Entity\StringField("field6"),
            new Entity\StringField("field7"),
            new Entity\StringField("field8"),
            new Entity\StringField("field9"),
            new Entity\StringField("field10"),
        );
    }
}