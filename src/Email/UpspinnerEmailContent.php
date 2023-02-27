<?php

namespace Upspinner\MailerBundle\Email;

class UpspinnerEmailContent
{
    /**
     * @param string $type
     * @param string|resource $value
     */
    public function __construct(public readonly string $type, public readonly mixed $value)
    {
    }
}
