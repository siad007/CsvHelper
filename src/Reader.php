<?php

namespace Siad007\Csv;

class Reader extends File
{
    public function __construct($path, Config $config)
    {
        parent::__construct($path, 'r', $config);

        $this->file->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE |
            \SplFileObject::READ_AHEAD
        );
    }

    public function read()
    {
        $result = [];

        foreach ($this->file as $row) {
            $result[] = $row;
        }

        return $result;
    }
}
