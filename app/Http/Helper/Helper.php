<?php
use Illuminate\Support\Debug\Dumper;

function dr(...$args)
{
    foreach ($args as $key => $arg) {
        if ($arg instanceof Illuminate\Contracts\Support\Arrayable) {
            $args[$key] = $arg->toArray();
        }
    }

    foreach ($args as $key => $x) {
        (new Dumper)->dump($x);
    }
}

function ddr()
{
    $args = func_get_args();
    foreach ($args as $key => $arg) {
        if ($arg instanceof Illuminate\Contracts\Support\Arrayable) {
            $args[$key] = $arg->toArray();
        }
    }
    call_user_func_array('dd', $args);
}

if (! function_exists('roles')) {
    function roles()
    {
        $roles = \Sentinel::getUser()->roles()->first()->slug;

        return strtolower($roles);
    }
}

if (! function_exists('user')) {
    function user()
    {
        $user = \Sentinel::getUser();

        return $user;
    }
}

if (! function_exists('get_price')) {
    function get_price($price, $discount)
    {
        $result = $price - ($price * $discount / 100);
        return $result;
    }
}

if (! function_exists('send_email')) {
    /**
     * Function for Sending Email.
     * 
     * @param array $param
     * @return boolean
     */
    function send_email($view, $param, $subject = 'Email Notification')
    {
        $data = [
            'data' => $param
        ];
        
        $mail = Mail::send($view, $data,
            function($message) use($param, $subject) {
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $message->to($param['user']['email'], $param['user']['email'])->subject($subject);
            });
    }
}