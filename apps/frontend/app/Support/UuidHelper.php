<?php

namespace App\Support;

use Ramsey\Uuid\Uuid;

class UuidHelper
{
    /**
     * Convert a UUID string to binary format for storage in the database.
     *
     * @param string|null $uuid
     * @return string|null
     */
    public static function toBinary(?string $uuid): ?string
    {
        if ($uuid === null) {
            return null;
        }
        
        return hex2bin(str_replace('-', '', $uuid));
    }
    
    /**
     * Convert a binary UUID from the database to a string representation.
     *
     * @param string|null $binaryUuid
     * @return string|null
     */
    public static function toString(?string $binaryUuid): ?string
    {
        if ($binaryUuid === null) {
            return null;
        }
        
        $hex = bin2hex($binaryUuid);
        return sprintf(
            '%s-%s-%s-%s-%s',
            substr($hex, 0, 8),
            substr($hex, 8, 4),
            substr($hex, 12, 4),
            substr($hex, 16, 4),
            substr($hex, 20)
        );
    }
    
    /**
     * Generate a new UUID.
     *
     * @return string
     */
    public static function generate(): string
    {
        return Uuid::uuid4()->toString();
    }
}
