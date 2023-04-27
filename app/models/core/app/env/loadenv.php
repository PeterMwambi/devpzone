<?php

namespace Models\Core\App\Env;


/**
 * @author Peter Mwambi
 * @abstract Load environment variable value by name
 * @date Thu Apr 27 2023 18:40:36 GMT+0300 (East Africa Time)
 */
final class LoadEnv
{
    /**
     * Get environment variable value
     * @param string - The environment variable
     * @return string
     */
    public static function get(string $envvar)
    {
        $root =  str_replace("app/models/core/app", "", str_replace("\\", "/", (dirname(__DIR__))));
        (new Dotenv($root . ".env"))->load();
        return getenv($envvar);
    }
}
