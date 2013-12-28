<?php
namespace Packaged\Formatter;

use Packaged\Formatter\Bytes\BinaryBytes;
use Packaged\Formatter\Bytes\MetricBytes;

class Formatter
{
  public static function bytes($bytes, $precision = 2)
  {
    $formatter = new BinaryBytes();
    return $formatter->format($bytes, $precision);
  }

  public static function metricBytes($bytes, $precision = 2)
  {
    $formatter = new MetricBytes();
    return $formatter->format($bytes, $precision);
  }
}
