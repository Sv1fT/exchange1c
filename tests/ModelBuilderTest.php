<?php
/**
 * This file is part of Sv1fT/exchange1c package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Tests;

use Sv1fT\Exchange1C\Config;
use Sv1fT\Exchange1C\Exceptions\Exchange1CException;
use Sv1fT\Exchange1C\Interfaces\GroupInterface;
use Sv1fT\Exchange1C\ModelBuilder;
use Tests\Models\GroupTestModel;
use Tests\Models\ProductTestModel;

class ModelBuilderTest extends TestCase
{
    public function testGetInterfaceClass(): void
    {
        $values = [
            'models'    => [
                GroupInterface::class => GroupTestModel::class,
            ],
        ];
        $config = new Config($values);
        $builder = new ModelBuilder();
        $model = $builder->getInterfaceClass($config, GroupInterface::class);
        $this->assertTrue($model instanceof GroupInterface);
        $this->assertTrue($model instanceof GroupTestModel);
    }

    public function testGetInterfaceClassException(): void
    {
        $this->expectException(Exchange1CException::class);
        $values = [
            'models'    => [
                GroupInterface::class => ProductTestModel::class,
            ],
        ];
        $config = new Config($values);
        $builder = new ModelBuilder();
        $builder->getInterfaceClass($config, GroupInterface::class);
    }
}
