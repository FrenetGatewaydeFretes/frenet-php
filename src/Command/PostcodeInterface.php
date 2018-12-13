<?php

declare(strict_types = 1);

namespace Frenet\Command;

/**
 * Class PostcodeInterface
 * @package Frenet\Command
 */
interface PostcodeInterface
{
    /**
     * @param string $postcode
     * @return Postcode\AddressInterface
     */
    public function address($postcode);
}
