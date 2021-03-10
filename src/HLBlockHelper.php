<?php

declare(strict_types=1);

namespace HLWrapper;

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use InvalidArgumentException;

/**
 * Class HLBlockHelper
 * @package HLWrapper
 */
class HLBlockHelper
{
    /**
     * Инициализирует Highload-сущность на основании ее кода
     *
     * @param string $hlCode
     * @return HighloadBlockTable
     * @throws ArgumentException
     * @throws SystemException
     * @throws ObjectPropertyException
     * @throws LoaderException
     */
    public static function hlInitByCode(string $hlCode)
    {
        Loader::includeModule('highloadblock');

        $hlBlock = HighloadBlockTable::getList(
            [
                'select' => ['ID'],
                'filter' => ['=NAME' => $hlCode],
            ]
        )->fetch();

        if (!$hlBlock['ID']) {
            throw new InvalidArgumentException('Неверное имя сущности');
        }

        $hlData = HighloadBlockTable::getById($hlBlock['ID'])->fetch();
        $hlClass = $hlData['NAME'].'Table';

        HighloadBlockTable::compileEntity($hlData);

        return $hlClass;
    }

}