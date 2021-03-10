<?php

declare(strict_types=1);

namespace HLWrapper\HlBlock;

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use HLWrapper\HLBlockHelper;

/**
 * Class BaseHLBlock
 * @package HLWrapper\HlBlock
 */
abstract class BaseHLBlock
{
    public const CODE = '';

    /**
     * @return HighloadBlockTable
     * @throws ArgumentException
     * @throws LoaderException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function create()
    {
        return HLBlockHelper::hlInitByCode(static::CODE);
    }
}