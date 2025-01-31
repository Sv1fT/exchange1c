<?php
/**
 * This file is part of Sv1fT/exchange1c package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Sv1fT\Exchange1C\Events;

class AfterOffersSync extends AbstractEventInterface
{
    const NAME = 'after.offers.sync';

    /**
     * @var array
     */
    public $ids;

    /**
     * AfterOffersSync constructor.
     *
     * @param array $ids
     */
    public function __construct(array $ids = [])
    {
        $this->ids = $ids;
    }
}
