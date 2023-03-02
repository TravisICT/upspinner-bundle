<?php

namespace Upspinner\ConnectBundle\Transport;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Transport\AbstractTransportFactory;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UpspinnerMailerTransportFactory extends AbstractTransportFactory
{
    public function __construct(
        EventDispatcherInterface $dispatcher = null,
        HttpClientInterface $client = null,
        LoggerInterface $logger = null,
    ) {
        parent::__construct($dispatcher, $client, $logger);
    }

    public function create(Dsn $dsn): TransportInterface
    {
        return new UpspinnerMailerTransport(
            dispatcher: $this->dispatcher,
            logger: $this->logger,
            host: $dsn->getHost(),
            key: $dsn->getOption('key', ''),
            environmentId: $dsn->getOption('environment', '')
        );
    }

    /**
     * @return string[]
     */
    protected function getSupportedSchemes(): array
    {
        return ['upspinner'];
    }
}
