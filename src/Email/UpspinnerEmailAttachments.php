<?php

namespace UpspinnerBundle\Email;

class UpspinnerEmailAttachments
{
    public function __construct(
        public readonly string $disposition,
        public readonly string $content,
        public readonly string $type,
        public readonly string $filename,
        public readonly string $contentId
    ) {
    }
}
