<?php
/**
 * This file is part of Sv1fT/exchange1c package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Sv1fT\Exchange1C\Interfaces;

interface RawInterface
{
    /**
     * @param \Zenwalker\CommerceML\CommerceML   $cml
     * @param \Zenwalker\CommerceML\Model\Simple $object
     *
     * @return mixed
     */
    public function setRaw1cData($cml, $object);
}
