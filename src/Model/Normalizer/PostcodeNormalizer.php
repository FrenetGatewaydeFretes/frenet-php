<?php

declare(strict_types = 1);

namespace Frenet\Model\Normalizer;

/**
 * Class PostcodeNormalizer
 *
 * @package Frenet\Model
 */
class PostcodeNormalizer
{
    /**
     * Normalize the postcode number for request.
     *
     * @param string $postcode
     *
     * @return string
     */
    public function normalize($postcode)
    {
        if (empty($postcode)) {
            return null;
        }

        $postcode = preg_replace('/[^0-9]/', null, $postcode);
        $postcode = str_pad($postcode, 8, '0', STR_PAD_LEFT);

        return $postcode;
    }
}
