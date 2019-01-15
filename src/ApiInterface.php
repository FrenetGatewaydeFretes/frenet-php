<?php

declare(strict_types = 1);

namespace Frenet;

/**
 * Class ApiInterface
 */
interface ApiInterface
{
    /**
     * @return Command\ShippingInterface
     */
    public function shipping();

    /**
     * @return Command\TrackingInterface
     */
    public function tracking();

    /**
     * @return Command\PostcodeInterface
     */
    public function postcode();

    /**
     * @return ConfigPool
     */
    public function config();
}
