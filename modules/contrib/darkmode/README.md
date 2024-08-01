Darkmode

Module and dependencies installation:
-------------------------------------

1) Run `composer require oomphinc/composer-installers-extender`, to install
   an additional package allowing you to install Darkmode.JS as npm-asset from
   asset-packagist.org.

2) Set the new repository for the composer to download npm-asset packages:

```yaml
{
  "repositories": [
    {
      "type": "composer",
      "url": "https://packages.drupal.org/8"
    },
    {
      "type": "composer",
      "url": "https://asset-packagist.org"
    }
  ],
}
```

3) Update the extra settings to define new installers types and configure them:

```yaml
{
  "extra": {
    "installer-types": [ "bower-asset", "npm-asset" ],
    "drupal-scaffold": {
      ...
    },
    "installer-paths": {
      "web/core": [
        "type:drupal-core"
      ],
      "web/libraries/{$name}": [
        "type:drupal-library",
        "type:bower-asset",
        "type:npm-asset"
      ],
      ...
    },
  },
}
```

4) Run `composer require drupal/darkmode npm-asset/darkmode-js:1.5.7`,
   to install module and it's dependencies.

----
