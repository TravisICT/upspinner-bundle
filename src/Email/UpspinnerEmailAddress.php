<?php

namespace Upspinner\ConnectBundle\Email;

class UpspinnerEmailAddress
{
    public function __construct(public readonly string $email = '', public readonly string $name = '')
    {
    }
}
