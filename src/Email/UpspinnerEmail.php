<?php

namespace Upspinner\ConnectBundle\Email;

use DateTimeImmutable;

class UpspinnerEmail
{
    /**
     * @param string $subject
     * @param array<UpspinnerEmailAddress> $to
     * @param array<UpspinnerEmailAddress> $cc
     * @param array<UpspinnerEmailAddress> $bcc
     * @param UpspinnerEmailAddress $from
     * @param array<UpspinnerEmailAddress> $replyTo
     * @param UpspinnerEmailContent $content
     * @param array<UpspinnerEmailAttachments> $attachments
     * @param array<string, string> $headers
     */
    public function __construct(
        public readonly string $subject,
        public readonly array $to,
        public readonly array $cc,
        public readonly array $bcc,
        public readonly UpspinnerEmailAddress $from,
        public readonly array $replyTo,
        public readonly UpspinnerEmailContent $content,
        public readonly array $attachments,
        public readonly array $headers,
    ) {
    }
}
