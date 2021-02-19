# Script Progress
This is a super simple library for php-cli script progress output. It’s easy-to-use and can print the estimated time that is left until your script is done.

`20% done. Appr. 00m 16s remaining.`

That’s it.

## Example Usage
```php
$numberOfItems = 20;
$progress = new TinyApps\ScriptProgress\Progress($numberOfItems);

for ($i=0; $i <= $numberOfItems; $i++) {
    // do something
    $progress->update($i);
}
```

There also is an example in the corresponding folder.

More features might be added soon.