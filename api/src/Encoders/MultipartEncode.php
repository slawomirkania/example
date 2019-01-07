<?php

namespace App\Encoders;


use Symfony\Component\Serializer\Encoder\JsonEncode;

class MultipartEncode extends JsonEncode
{
    /**
     * {@inheritdoc}
     */
    public function supportsEncoding($format): bool
    {
        return 'multipart' === $format;
    }
}