<?php
namespace Packaged\Formatter;

interface FormatterInterface
{
  /**
   * Convert the inserted value to a new format
   *
   * @param $value
   *
   * @return mixed
   */
  public function format($value);
}
