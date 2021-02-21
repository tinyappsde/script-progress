# Script Progress
This is a super simple library for php-cli script progress output. It’s easy-to-use and can print the estimated time that is left until your script is done. You always know if your script is still doing something or might be stuck – and when it will approximately finish.

Example output: `20% done. Appr. 02m 16s remaining.` – That’s it.

## Installation
`composer require tinyapps/script-progress`

## Example Usage
```php
$numberOfItems = 20;
$progress = new TinyApps\ScriptProgress\Progress($numberOfItems);

for ($i=0; $i <= $numberOfItems; $i++) {
    // do something
    $progress->update($i);
}
```

There is also an example in the corresponding folder.

More features will be added soon.
