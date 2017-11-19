<?php

namespace Siad007\Csv;

class Writer extends File
{
    public function __construct($path, Config $config)
    {
        parent::__construct($path, 'w+', $config);
    }

    public function fromArray($data)
    {
        foreach ($data as $row) {
            $this->file->fputcsv($row);
        }
    }
}
