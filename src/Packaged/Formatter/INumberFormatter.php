<?php
namespace Packaged\Formatter;

interface INumberFormatter extends IFormatter
{
  public function format($value, $precision = null);
}
