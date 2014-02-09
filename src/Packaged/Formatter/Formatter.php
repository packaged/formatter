<?php
namespace Packaged\Formatter;

use Packaged\Formatter\Bytes\BinaryBytes;
use Packaged\Formatter\Bytes\HumanBytes;
use Packaged\Formatter\Bytes\MetricBytes;

/**
 * Global Formatter
 *
 * Static methods for reducing code required to use a formatter
 */
class Formatter
{
  /**
   * Format bytes into human recognised bytes e.g. 1024 = 1KB
   *
   * @param int $bytes
   * @param int $precision
   *
   * @return string
   */
  public static function bytes($bytes, $precision = 2)
  {
    $formatter = new HumanBytes();
    return $formatter->format($bytes, $precision);
  }

  /**
   * Format bytes into binary bytes e.g. 1024 = 1KiB
   *
   * @param int $bytes
   * @param int $precision
   *
   * @return string
   */
  public static function binaryBytes($bytes, $precision = 2)
  {
    $formatter = new BinaryBytes();
    return $formatter->format($bytes, $precision);
  }

  /**
   * Format bytes into metric bytes e.g. 1000 = 1KB
   *
   * @param int $bytes
   * @param int $precision
   *
   * @return string
   */
  public static function metricBytes($bytes, $precision = 2)
  {
    $formatter = new MetricBytes();
    return $formatter->format($bytes, $precision);
  }
}
