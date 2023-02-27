<?php

namespace Upspinner\MailerBundle\Email;

class UpspinnerEmailAddress
{
    public function __construct(public readonly string $email = '', public readonly string $name = '')
    {
    }
}
