# upspinner-bundle

This bundled is intended for use in upspinner enabled environments.

To use the mailer transport use the following `MAILER_DSN`:

`MAILER_DSN="upspinner://upspinner.yourtravis.com?key=KEY&environment=ENVIRONMENT_ID`

To use the notifier transport use the following `UPSPINNER_NOTIFIER_DSN`:

`TEXTER_DSN="upspinner://:KEY@upspinner.yourtravis.com?environment=ENVIRONMENT_ID`

And make sure you use the `TEXTER_DSN` in your notifier.yaml:

```
framework:
    notifier:
        texter_transports:
            main: '%env(TEXTER_DSN)%'
```

