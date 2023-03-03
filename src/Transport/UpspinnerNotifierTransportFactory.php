<?php

namespace Upspinner\ConnectBundle\Transport;

use Symfony\Component\Notifier\Exception\UnsupportedSchemeException;
use Symfony\Component\Notifier\Transport\AbstractTransportFactory;
use Symfony\Component\Notifier\Transport\Dsn;

class UpspinnerNotifierTransportFactory extends AbstractTransportFactory
{
    public function create(Dsn $dsn): UpspinnerNotifierTransport
    {
        if ('upspinner' !== $dsn->getScheme()) {
            throw new UnsupportedSchemeException($dsn, 'upspinner', $this->getSupportedSchemes());
        }

        $authKey = $this->getPassword($dsn);
        $from = $dsn->getRequiredOption('from');
        $environment = $dsn->getRequiredOption('environment');
        $host = 'default' === $dsn->getHost() ? null : $dsn->getHost();
        $port = $dsn->getPort();

        return (new UpspinnerNotifierTransport(
            key: $authKey,
            from: $from,
            environmentId: $environment,
            client: $this->client,
            dispatcher: $this->dispatcher,
        ))
            ->setHost($host)
            ->setPort($port);
    }

    /**
     * @return string[]
     */
    protected function getSupportedSchemes(): array
    {
        return ['upspinner'];
    }
}
