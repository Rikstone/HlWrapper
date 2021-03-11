# HlWrapper
Wrapper для прощения работы с HL блоками битрикса

Пример использования wrapper:
```
declare(strict_types=1);

namespace HLWrapper\HlBlock;


use HLWrapper\HlBlock\BaseHLBlock;

/**
 * Таблица с данными
 * Class DataTable
 */
class DataTable extends BaseHLBlock
{
    const CODE = 'DataTable';
}

//execute
$hlBlock = DataTable::create();
$hlBlock::add([]);
```
