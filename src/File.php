<?php

namespace Siad007\Csv;

abstract class File
{
    protected $file;

    public function __construct($path, $mode, Config $config)
    {
        $this->file = new \SplFileObject($path, $mode);
        $this->file->setCsvControl($config->getDelimiter(), $config->getEnclosure(), $config->getEscapeChar());
    }
}
