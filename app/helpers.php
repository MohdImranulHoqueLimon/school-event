<?php

/**
 * Set a flash message in the session.
 *
 * @param  string $message
 * @param string $type
 */
function flash($message, $type = 'info') {

    switch($type) {
        case 'error':
            session()->flash('error', $message);
            break;
        default:
            session()->flash('message', $message);
            break;
    }

}
