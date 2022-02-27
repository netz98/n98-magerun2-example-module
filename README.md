# Example n98-magerun2 Module

This example contains:

- ddev Dev Setup
- PHPUnit Test Setup

## ddev

Install [ddev](https://ddev.readthedocs.io/en/stable/) and the enter `ddev start` in you CLI.

After the project start the hook script `.ddev/hook_01_setup.sh` will try to install Magento in the started web container.
Installation requires that some variables, holding the Magento installation keys, are defined in your ddev config.

```
MAGENTO_REPO_USERNAME=<public-key>
MAGENTO_REPO_PASSWORD=<private-key>
```

https://ddev.readthedocs.io/en/stable/users/extend/customization-extendibility/#providing-custom-environment-variables-to-a-container

## Test Setup

The [n98-magerun Test Framework](https://github.com/netz98/n98-magerun2-test-framework) is installed as dev dependency.

You can start the unit test by `ddev exec vendor/bin/phpunit`.
