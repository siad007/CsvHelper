<?php

namespace Siad007\Csv;

class Config
{
    /** @var string $delimiter */
    private $delimiter = ',';

    /** @var string $enclosure */
    private $enclosure = '"';

    /** @var string $escapeChar */
    private $escapeChar = '\\';

    /**
     * @return string
     */
    public function getDelimiter(): string
    {
        return $this->delimiter;
    }

    /**
     * @param string $delimiter
     */
    public function setDelimiter(string $delimiter): void
    {
        $this->delimiter = $delimiter;
    }

    /**
     * @return string
     */
    public function getEnclosure(): string
    {
        return $this->enclosure;
    }

    /**
     * @param string $enclosure
     */
    public function setEnclosure(string $enclosure): void
    {
        $this->enclosure = $enclosure;
    }

    /**
     * @return string
     */
    public function getEscapeChar(): string
    {
        return $this->escapeChar;
    }

    /**
     * @param string $escapeChar
     */
    public function setEscapeChar(string $escapeChar): void
    {
        $this->escapeChar = $escapeChar;
    }
}
