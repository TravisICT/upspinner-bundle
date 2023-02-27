<?php

namespace Upspinner\MailerBundle\Email;

class UpspinnerEmail
{
    /**
     * @param UpspinnerEmailPersonalization $personalization
     * @param UpspinnerEmailAddress $from
     * @param array<UpspinnerEmailAddress> $replyTo
     * @param array<UpspinnerEmailContent> $content
     * @param array<UpspinnerEmailAttachments> $attachments
     * @param array<string, string> $headers
     */
    public function __construct(
        public readonly UpspinnerEmailPersonalization $personalization,
        public readonly UpspinnerEmailAddress $from,
        public readonly array $replyTo,
        public readonly array $content,
        public readonly array $attachments,
        public readonly array $headers,
    ) {
    }
}


