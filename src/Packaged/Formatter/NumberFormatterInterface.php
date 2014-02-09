<?php
namespace Packaged\Formatter;

interface NumberFormatterInterface extends FormatterInterface
{
  /**
   * Convert the input value to a formatted number
   *
   * @param int  $value
   * @param null $precision
   *
   * @return mixed
   */
  public function format($value, $precision = null);
}
