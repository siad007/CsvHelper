<?php

namespace Siad007\Csv;

class Factory
{
    public const WRITE = 'write';
    public const READ = 'read';

    /** @var Config $config */
    private $config;

    /**
     * CsvFactory constructor.
     *
     * @param Config $config
     */
    public function __construct(?Config $config = null)
    {
        $this->config = $config ?? new Config;
    }

    /**
     * @param string $type
     * @param string $path
     *
     * @return Reader|Writer
     *
     * @throws \RuntimeException
     */
    public function __invoke(string $type, string $path)
    {
        $type = strtolower($type);
        switch (true) {
            case $type === self::READ:
                $instance = new Reader($path, $this->config);
                break;
            case $type === self::WRITE:
                $instance = new Writer($path, $this->config);
                break;
            default:
                throw new \RuntimeException("Type '$type' not supported.");
        }

        return $instance;
    }
}
