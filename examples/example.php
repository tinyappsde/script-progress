<?php

use TinyApps\ScriptProgress\Progress;

require __DIR__ . '/../vendor/autoload.php';

$progress = new Progress(20);

for ($i=0; $i <= 20; $i++) {
	$progress->update($i);
	sleep(1);
}
