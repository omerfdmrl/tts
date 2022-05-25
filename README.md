## Tts

Simple Google Tts Api Class

[![Latest Stable Version](http://poser.pugx.org/omerfdmrl/tts/v)](https://packagist.org/packages/omerfdmrl/tts) 
[![Total Downloads](http://poser.pugx.org/omerfdmrl/tts/downloads)](https://packagist.org/packages/omerfdmrl/tts) 
[![Latest Unstable Version](http://poser.pugx.org/omerfdmrl/tts/v/unstable)](https://packagist.org/packages/omerfdmrl/tts) 
[![License](http://poser.pugx.org/omerfdmrl/tts/license)](https://packagist.org/packages/omerfdmrl/tts) 
[![PHP Version Require](http://poser.pugx.org/omerfdmrl/tts/require/php)](https://packagist.org/packages/omerfdmrl/tts)


### Features
- Set Api Key, Text, Lang Code, Voice Name, Encoding, Pitch, Rate, Save Path
- Fast, Simple and Light

## Install

run the following command directly.

```
$ composer require omerfdmrl/tts
```

## Simple Usage
```php
include 'vendor/autoload.php';

use Omerfdmrl\Tts\Tts;

$tts = new Tts;

// Set Google Api Code
$tts->setApi('Api_Code');

// Set Text
$tts->setText('Hello World!');

// Send request to Google and save voice
$tts->get();
```


## Advanced Usage
```php
include 'vendor/autoload.php';

use Omerfdmrl\Tts\Tts;

$tts = new Tts;

// Set Google Api Code
$tts->setApi('Api_Code');

// Set Text
$tts->setText('Hello World!');

// Set Save Path
// Default is ./tts.mp3
$tts->setSavePath('tts.mp3');

// Set Language Code
// Default is en-US
$tts->setLanguageCode('en-US');

// Set Voice Name
// Default is en-US-Wavenet-F
$tts->setVoiceName('en-US-Wavenet-F');

// Set Encoding Type
// Default is MP3
$tts->setEncoding('MP3');

// Set Pitch
// Default is 0.00
$tts->setPitch(0.00);

// Set Speaking Rate
// Default is 1.00
$tts->setSpeakingRate(1.00);

// Send request to Google and save voice
$tts->get();

// Get error if exist
echo $tts->error();
```


## Docs
Documentation page: [Docs][doc-url]


## Licence
[MIT Licence][mit-url]

## Contributing

1. Fork it ( https://github.com/omerfdmrl/tts/fork )
2. Create your feature branch (git checkout -b my-new-feature)
3. Commit your changes (git commit -am 'Add some feature')
4. Push to the branch (git push origin my-new-feature)
5. Create a new Pull Request

## Contributors

- [omerfdmrl](https://github.com/omerfdmrl) Ömer Faruk Demirel - creator, maintainer

[mit-url]: http://opensource.org/licenses/MIT
[doc-url]: https://github.com/omerfdmrl/tts/wiki
