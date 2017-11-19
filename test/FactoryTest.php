<?php

namespace Siad007\Csv\Tests;

use Siad007\Csv\Config;
use Siad007\Csv\Factory as CSV;
use PHPUnit\Framework\TestCase;

/**
 * Class FactoryTest
 *
 * @package Siad007\Csv\Tests
 */
class FactoryTest extends TestCase
{
    /** @var CSV $factory */
    private $factory;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $config = new Config();
        $config->setDelimiter(',');
        $config->setEnclosure('"');
        $config->setEscapeChar('\\');

        $this->factory = new CSV($config);
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        $this->factory = null;
        if (file_exists(__DIR__ . '/_files/test.csv')) {
            unlink(__DIR__ . '/_files/test.csv');
        }
    }

    /**
     * @test
     */
    public function readWrite()
    {
        $invoke = $this->factory;
        $path = __DIR__ . '/_files/test.csv';

        $invoke(CSV::WRITE, $path)->fromArray([[1,2,3], ['a','b','c']]);

        $this->assertSame(
            [['1','2','3'], ['a','b','c']],
            $invoke(CSV::READ, $path)->read()
        );
    }

    /**
     * @test
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Type 'test' not supported.
     */
    public function notSupportedType()
    {
        $invoke = $this->factory;
        $path = __DIR__ . '/_files/test.csv';

        $invoke('test', $path)->fromArray([[1,2,3], ['a','b','c']]);
    }
}
