<?php
namespace Packaged\Formatter;

interface NumberFormatterInterface extends FormatterInterface
{
  public function format($value, $precision = null);
}
