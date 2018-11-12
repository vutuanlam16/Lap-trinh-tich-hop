<?php
function log_error($thisClass, $msg) {
    do_log("error", $thisClass, $msg);
}

function log_debug($thisClass, $msg) {
    do_log("debug", $thisClass, $msg);
}

function log_info($thisClass, $msg) {
    do_log("info", $thisClass, $msg);
}

function do_log($level, $thisClass, $msg) {
    $className = get_class($thisClass);
    $methodName = debug_backtrace()[2]['function'];
    log_message($level, $className . "/" . $methodName . ": " . $msg);
}
