<?php
function get_db_config()
{
    if (getenv('IS_IN_HEROKU')) {
        $url = parse_url(getenv("DATABASE_URL"));
        return $db_config = [
            'connection' => 'pgsql',
            'host'       => $url["host"],
            'port'       => $url["port"],
            'database'   => substr($url["path"], 1),
            'username'   => $url["user"],
            'password'   => $url["pass"]
        ];
    } else {
        return $db_config = [
            'connection' => env('DB_CONNECTION', 'mysql'),
            'host'       => env('DB_HOST', 'localhost'),
            'port'       => env('DB_PORT', '3306'),
            'database'   => env('DB_DATABASE', 'forge'),
            'username'   => env('DB_USERNAME', 'forge'),
            'password'   => env('DB_PASSWORD', '')
        ];
    }
}
