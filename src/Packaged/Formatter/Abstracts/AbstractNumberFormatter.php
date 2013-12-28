<?php
namespace Packaged\Formatter\Abstracts;

use Packaged\Formatter\INumberFormatter;

abstract class AbstractNumberFormatter implements INumberFormatter
{
  /**
   * @var integer
   */
  protected $_base;

  /**
   * @var integer
   */
  protected $_precision = 2;

  /**
   * Force precision, even with whole numbers
   *
   * @var bool
   */
  protected $_forcePrecision = false;

  /**
   * @var array
   */
  protected $_suffixes = array();

  public function forcePrecision($on = true)
  {
    $this->_forcePrecision = $on;
    return $this;
  }

  protected function _cleanInput($value)
  {
    return filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);
  }

  public function format($value, $precision = 2)
  {
    $this->_precision = $precision;
    $finalValue       = $value = $this->_cleanInput($value);
    $finalSuffix      = (isset($this->_suffixes[0]) ? : null);
    krsort($this->_suffixes);

    foreach($this->_suffixes as $power => $suffix)
    {
      $limit = pow($this->_base, $power);
      if($limit <= $value)
      {
        $finalValue  = $power === 0 ? $value : $value / $limit;
        $finalSuffix = $suffix;
        break;
      }
    }

    return $this->_output($finalValue, $finalSuffix);
  }

  protected function _output($value, $suffix)
  {
    $format = $this->_getNumberFormat($value);
    return sprintf("$format %s", $value, $suffix);
  }

  protected function _getNumberFormat($value)
  {
    if(fmod($value, 1) == 0 && !$this->_forcePrecision)
    {
      return '%d';
    }
    return "%0.{$this->_precision}f";
  }
}
