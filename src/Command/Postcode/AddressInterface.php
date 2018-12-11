<?php

declare(strict_types = 1);

namespace Frenet\Command\Postcode;

use Frenet\Command\CommandInterface;

/**
 * Interface AddressInterface
 * @package Frenet\Command\Postcode
 */
interface AddressInterface extends CommandInterface
{
    /**
     * @param string $postcode
     * @return $this
     */
    public function setPostcode($postcode);
    
    /**
     * @return string|null
     */
    public function getPostcode();
}
