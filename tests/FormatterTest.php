<?php
/**
 * @author  Brooke
 */

class FormatterTest extends PHPUnit_Framework_TestCase
{
  public function testBytes()
  {
    $this->assertEquals(
      '1 KB',
      \Packaged\Formatter\Formatter::bytes(1024)
    );
  }

  public function testBinaryBytes()
  {
    $this->assertEquals(
      '1 KiB',
      \Packaged\Formatter\Formatter::binaryBytes(1024)
    );
  }

  public function testMetricBytes()
  {
    $this->assertEquals(
      '1 KB',
      \Packaged\Formatter\Formatter::metricBytes(1000)
    );
  }
}
