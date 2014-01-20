<?php
abstract class BaseFormatterTest extends PHPUnit_Framework_TestCase
{
  /**
   * @var \Packaged\Formatter\FormatterInterface
   */
  protected $_formatter;

  public function testFormatter()
  {
    $this->assertInstanceOf(
      '\Packaged\Formatter\IFormatter',
      $this->_formatter
    );
  }
}
