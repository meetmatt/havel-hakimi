# Havel-Hakimi

[![Build Status](https://travis-ci.org/meetmatt/havel-hakimi.svg?branch=master)](https://travis-ci.org/meetmatt/havel-hakimi)
[![Build Status](https://scrutinizer-ci.com/g/meetmatt/havel-hakimi/badges/build.png?b=master)](https://scrutinizer-ci.com/g/meetmatt/havel-hakimi/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/meetmatt/havel-hakimi/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/meetmatt/havel-hakimi/?branch=master)
[![Maintainability](https://api.codeclimate.com/v1/badges/9a81b775a59e7c370f38/maintainability)](https://codeclimate.com/github/meetmatt/havel-hakimi/maintainability)
[![Coverage Status](https://coveralls.io/repos/github/meetmatt/havel-hakimi/badge.svg?branch=master)](https://coveralls.io/github/meetmatt/havel-hakimi?branch=master)
[![codecov](https://codecov.io/gh/meetmatt/havel-hakimi/branch/master/graph/badge.svg)](https://codecov.io/gh/meetmatt/havel-hakimi)

Library to determine if sequence is graphical.  
Originates from [D3 Graph Theory](https://mrpandey.github.io/d3graphTheory/unit.html?havel-hakimi).

Usage:
```php
<?php
  
use MeetMatt\HavelHakimi\HavelHakimi;  
use MeetMatt\HavelHakimi\Sequence;  
  
$havelHakimi = new HavelHakimi();  
  
$havelHakimi->isGraphical(Sequence::fromDegrees([4, 3, 3, 2, 2])); // true  
$havelHakimi->isGraphical(Sequence::fromDegrees([5, 5, 5, 5, 5, 5])); // true  
$havelHakimi->isGraphical(Sequence::fromDegrees([0, 0, 0])); // true  
$havelHakimi->isGraphical(Sequence::fromDegrees([3, 3, 3])); // false  
```
