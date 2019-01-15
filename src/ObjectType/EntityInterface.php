<?php

declare(strict_types = 1);

namespace Frenet\ObjectType;

/**
 * Interface EntityInterface
 *
 * @package Frenet\ObjectType
 */
interface EntityInterface
{
    /**
     * @return string|int
     */
    // public function getId();

    /**
     * @param string|int $id
     * @return $this
     */
    // public function setId($id);

    /**
     * @return string
     */
    public function __toString();
}
