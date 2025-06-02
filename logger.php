<?php
function log_event($message) {
    $logFile = __DIR__ . '/logs/event_log.txt';
    $date = date('Y-m-d H:i:s');
    $entry = "[$date] $message\n";

    // Create logs directory if it doesn't exist
    if (!is_dir(dirname($logFile))) {
        mkdir(dirname($logFile), 0777, true);
    }

    file_put_contents($logFile, $entry, FILE_APPEND);
}


