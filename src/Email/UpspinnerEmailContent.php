<?php

namespace UpspinnerBundle\Email;

class UpspinnerEmailContent
{
    /**
     * @param string $text
     * @param string $html
     */
    public function __construct(public readonly string $text, public readonly string $html)
    {
    }
}
