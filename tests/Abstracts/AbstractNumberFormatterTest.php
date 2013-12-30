<?php
/**
 * @author  brooke.bryan
 */

class AbstractNumberFormatterTest extends BaseNumberFormatterTest
{
  public function setUp()
  {
    $this->_formatter = $this->getMockForAbstractClass(
      '\Packaged\Formatter\Abstracts\AbstractNumberFormatter'
    );
  }

  public function testOutputGetsSet()
  {
    $this->_formatter->setOutputFormat("%d - %s");
    $this->assertEquals("%d - %s", $this->_formatter->getOutputFormat());
  }

  public function testOutputReplacements()
  {
    $this->_formatter->setOutputFormat("%%num%% %s");
    $this->assertEquals("10 ", $this->_formatter->format(10.00, 2));

    $this->_formatter->setOutputFormat("%0.2f %s");
    $this->assertEquals("20.30 ", $this->_formatter->format(20.30, 2));

    $this->_formatter->setOutputFormat("%0.3f %s");
    $this->assertEquals("30.010 ", $this->_formatter->format("30.01", 3));
  }
}
