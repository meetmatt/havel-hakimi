# Havel-Hakimi

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
