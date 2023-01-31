<?php
/**
 * This file is part of Sv1fT/exchange1c package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Tests\Events;

use Sv1fT\Exchange1C\Events\BeforeOffersSync;
use Tests\TestCase;

/**
 * Class EventTest.
 */
class EventTest extends TestCase
{
    public function testGetName()
    {
        $event = new  BeforeOffersSync();
        $this->assertTrue(is_string($event->getName()));
    }
}
