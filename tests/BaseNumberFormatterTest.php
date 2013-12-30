<?php
abstract class BaseNumberFormatterTest extends BaseFormatterTest
{
  /**
   * @var \Packaged\Formatter\INumberFormatter
   */
  protected $_formatter;

  protected $_conversions;

  public function testNumberFormatter()
  {
    $this->assertInstanceOf(
      '\Packaged\Formatter\INumberFormatter',
      $this->_formatter
    );
  }

  public function addConversion($value, $expect)
  {
    $this->_conversions[$value] = $expect;
  }

  public function clearConversions()
  {
    $this->_conversions = array();
  }

  public function testConversions()
  {
    if(!empty($this->_conversions))
    {
      foreach($this->_conversions as $value => $expected)
      {
        $this->assertEquals($expected, $this->_formatter->format($value, 2));
      }
    }
    else
    {
      $this->assertNull($this->_conversions);
    }
  }
}
