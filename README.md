# Reproduce of Symfony Issue [#58164](https://github.com/symfony/symfony/issues/58164)

## Steps

Clone this project, and run:

```shell
composer install

php index.php
```

The result:

```shell
Find by `a`:
Foo Link

Find by `.link`:
Foo Link
Bar Link
```
