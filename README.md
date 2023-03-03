# upspinner-bundle

This bundled is intended for use in upspinner enabled environments.

To use the mailer transport use the following `MAILER_DSN`:

`MAILER_DSN="upspinner://UPSPINNER_DOMAIN?key=KEY&environment=ENVIRONMENT_ID`

To use the notifier transport use the following `TEXTER_DSN`:

`TEXTER_DSN="upspinner://:KEY@UPSPINNER_DOMAIN?environment=ENVIRONMENT_ID`

And make sure you use the `TEXTER_DSN` in your notifier.yaml:

```
framework:
    notifier:
        texter_transports:
            main: '%env(TEXTER_DSN)%'
```

After this bundle is deemed final Upspinner will be updated to automatically set these variables on creation of environments.