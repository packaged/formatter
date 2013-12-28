<?php
namespace Packaged\Formatter\Bytes;

use Packaged\Formatter\Abstracts\AbstractNumberFormatter;

class MetricBytes extends AbstractNumberFormatter
{
  /**
   * @var integer
   */
  protected $_base = 1000;

  /**
   * @var array
   */
  protected $_suffixes = array(
    0 => 'B',
    1 => 'KB',
    2 => 'MB',
    3 => 'GB',
    4 => 'TB',
    5 => 'PB',
    6 => 'EB',
    7 => 'ZB',
    8 => 'YB',
  );
}
