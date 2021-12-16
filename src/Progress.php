<?php

namespace TinyApps\ScriptProgress;

/**
 * @author Dion Purushotham <hello@tinyapps.de>
 */
class Progress {

	protected int $total;
	protected int $startTime;
	protected int $lastPrintedTime;
	protected int $interval = 1;

	/**
	 * Initialize live-updating progress text
	 *
	 * @param integer $total Total amount of items (matching 100% progress)
	 * @param integer $interval How many seconds should at least (!) pass between output/update
	 */
	public function __construct(int $total, int $interval = 1) {
		$this->total = $total;
		$this->startTime = time();
		$this->lastPrintedTime = time();
		$this->interval = $interval;

		echo "\n0% done. Please wait...";
	}

	/**
	 * Prints and updates the command line output (considering interval)
	 *
	 * @param integer $done number of items done (for calculating progress)
	 *
	 * @return void
	 */
	public function update(int $done) {
		if ($done >= $this->total) {
			$timePassed = time() - $this->startTime;
			$minutes = floor($timePassed / 60);
			$seconds = floor($timePassed % 60);

			echo "\r";
			echo '100% done in ' . $minutes . ' min. and ' . $seconds . ' sec.';
			echo str_repeat(' ', 5) . "\n";

			return;
		}

		if ($done > 0 && $this->lastPrintedTime < time() - $this->interval) {
			$timePassed = time() - $this->startTime;
			$averageTimeEach = $timePassed / $done;
			$timeRemaining = $averageTimeEach * ($this->total - $done);
			$minutesRemaining = floor($timeRemaining / 60);
			$secondsRemaining = floor($timeRemaining) % 60;

			$percentage = floor(($done / $this->total) * 100);

			echo "\r";
			echo ($percentage < 10 ? '0' . $percentage : $percentage) . '% done. ';
			echo 'Appr. ' . ($minutesRemaining > 9 ? $minutesRemaining : '0' . $minutesRemaining) . 'm ' . ($secondsRemaining > 9 ? $secondsRemaining : '0' . $secondsRemaining) . 's remaining.  ';
		}
	}
}
