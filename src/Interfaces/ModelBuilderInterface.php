<?php
/**
 * This file is part of Sv1fT/exchange1c package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Sv1fT\Exchange1C\Interfaces;

use Sv1fT\Exchange1C\Config;

/**
 * Class ModelBuilderInterface.
 */
interface ModelBuilderInterface
{
    /**
     * Если модель в конфиге не установлена, то импорт не будет произведен.
     *
     * @param Config $config
     * @param string $interface
     *
     * @return null|mixed
     */
    public function getInterfaceClass(Config $config, string $interface);
}
