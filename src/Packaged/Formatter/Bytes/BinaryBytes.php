<?php
namespace Packaged\Formatter\Bytes;

use Packaged\Formatter\Abstracts\AbstractNumberFormatter;

class BinaryBytes extends AbstractNumberFormatter
{
  /**
   * @var integer
   */
  protected $_base = 1024;

  /**
   * @var array
   */
  protected $_suffixes = array(
    0 => 'B',
    1 => 'KiB',
    2 => 'MiB',
    3 => 'GiB',
    4 => 'TiB',
    5 => 'PiB',
    6 => 'EiB',
    7 => 'ZiB',
    8 => 'YiB',
  );
}
