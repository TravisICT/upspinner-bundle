<?php

namespace Upspinner\ConnectBundle\Tests\Transport;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Upspinner\ConnectBundle\Email\UpspinnerEmail;
use Upspinner\ConnectBundle\Email\UpspinnerEmailAddress;
use Upspinner\ConnectBundle\Email\UpspinnerEmailContent;
use Upspinner\ConnectBundle\Transport\UpspinnerMailerTransport;

class UpspinnerMailerTransportTest extends TestCase
{
    public function testSend(): void
    {
        $email = new Email();
        $email->from(new Address('foo@example.com', 'Ms. Foo Bar'))
            ->to(new Address('bar@example.com', 'Mr. Recipient'))
            ->bcc('baz@example.com')
            ->text('content');

        $response = $this->createMock(ResponseInterface::class);

        $response
            ->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(200);
        $response
            ->expects($this->once())
            ->method('getHeaders')
            ->willReturn(['x-message-id' => '1']);

        $httpClient = $this->createMock(HttpClientInterface::class);

        $httpClient
            ->expects($this->once())
            ->method('request')
            ->with(
                'POST',
                'https://localhost:8000/api/incoming/emails/1',
                [
                    'json' => new UpspinnerEmail(
                        '',
                        [new UpspinnerEmailAddress('bar@example.com', 'Mr. Recipient')],
                        [],
                        [new UpspinnerEmailAddress('baz@example.com')],
                        new UpspinnerEmailAddress('foo@example.com', 'Ms. Foo Bar'),
                        [],
                        new UpspinnerEmailContent('content', ''),
                        [],
                        [
                            'From' => '"Ms. Foo Bar" <foo@example.com>',
                            'To' => '"Mr. Recipient" <bar@example.com>',
                            'Bcc' => 'baz@example.com'
                        ]
                    ),
                    'headers' => [
                        'Authorization' => ''
                    ],
                ]
            )
            ->willReturn($response);

        $mailer = (new UpspinnerMailerTransport(client: $httpClient, environmentId: '1'))->setHost('localhost:8000');
        $mailer->send($email);
    }
}
