<?php

namespace Upspinner\ConnectBundle\Sms;

class UpspinnerSms
{
    public function __construct(public readonly string $from, public readonly string $to, public readonly string $body)
    {
    }
}
