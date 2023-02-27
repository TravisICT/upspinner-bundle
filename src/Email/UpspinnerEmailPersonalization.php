<?php

namespace Upspinner\MailerBundle\Email;

class UpspinnerEmailPersonalization
{
    /**
     * @param string $subject
     * @param array<UpspinnerEmailAddress> $to
     * @param array<UpspinnerEmailAddress> $cc
     * @param array<UpspinnerEmailAddress> $bcc
     */
    public function __construct(
        public readonly string $subject,
        public readonly array $to,
        public readonly array $cc,
        public readonly array $bcc,
    ) {
    }
}
