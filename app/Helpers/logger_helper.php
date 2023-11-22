<?php

/**
 * Create log
 * 
 * @param int $id
 * @param string $message
 * 
 */
function create_log(string $message)
{
    // model('logs')->save([
    //     'ip_address' => $_SERVER['REMOTE_ADDR'],
    //     'user_agent' => $_SERVER['HTTP_USER_AGENT'],
    //     'user' => session('user_data')->id,
    //     'action' => $message,
    //     'company' => 1
    // ]);
}
