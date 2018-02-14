<?php

/**
 * Class Cache
 */
class Cache
{
    public $cache_file;

    /**
     * Cache constructor.
     * @param string $data
     */
    public function __construct($data)
    {
        $this->cache_file = $data;
        file_put_contents("cache/".$data, $data, FILE_APPEND);
    }

    public function __destruct()
    {
        $file = "cache/{$this->cache_file}";
        if (file_exists($file)) @unlink($file);
    }
}
