# sancus

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

[Binomial proportion confidence intervals](https://en.wikipedia.org/wiki/Binomial_proportion_confidence_interval). Supported methods are Agresti-Coull, Wald and Wilson Score.

## Install

Via Composer

``` bash
$ composer require ozdemirburak/sancus
```

## Usage

``` php
$interval = new OzdemirBurak\Sancus\Intervals\AgrestiCoullInterval($positive = 25, $negative = 25, $confidence = 0.95);
print_r($interval->getInterval());

$interval = new OzdemirBurak\Sancus\Intervals\WaldInterval(10, 50);
print_r($interval->getInterval());

$interval = new OzdemirBurak\Sancus\Intervals\WilsonInterval(75, 25, 0.90);
print_r($interval->getInterval());
echo $interval->score(); // $interval->getLowerBound()
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email mail@burakozdemir.co.uk instead of using the issue tracker.

## Credits

- [Burak Özdemir][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ozdemirburak/sancus.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ozdemirburak/sancus/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ozdemirburak/sancus.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/ozdemirburak/sancus
[link-travis]: https://travis-ci.org/ozdemirburak/sancus
[link-downloads]: https://packagist.org/packages/ozdemirburak/sancus
[link-author]: https://github.com/ozdemirburak
[link-contributors]: ../../contributors
