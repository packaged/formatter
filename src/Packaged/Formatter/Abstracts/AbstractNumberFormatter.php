<?php
namespace Packaged\Formatter\Abstracts;

use Packaged\Formatter\NumberFormatterInterface;

abstract class AbstractNumberFormatter implements NumberFormatterInterface
{
  /**
   * @var integer
   */
  protected $_base = 1;

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

  /**
   * sprintf format, first param size, second suffix
   *
   * default "%d %s"
   *
   * %%num%% will force whole numbers to display without points e.g. 9.00 to 9
   *
   * %%precision%% will change to the specified precision
   * e.g. %0.%%precision%%f will change to %0.2f
   *
   * @var string
   */
  protected $_outputFormat;

  public function forcePrecision($on = true)
  {
    $this->_forcePrecision = $on;
    return $this;
  }

  protected function _cleanInput($value)
  {
    return filter_var(
      $value,
      FILTER_SANITIZE_NUMBER_FLOAT,
      FILTER_FLAG_ALLOW_FRACTION
    );
  }

  public function format($value, $precision = 2)
  {
    $this->_precision = $precision;
    $finalValue       = $value = $this->_cleanInput($value);
    $finalSuffix      = (isset($this->_suffixes[0]) ? : null);

    if($this->_base !== null && !empty($this->_suffixes))
    {
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
    }

    return $this->_output($finalValue, $finalSuffix);
  }

  protected function _output($value, $suffix)
  {
    if($this->_outputFormat === null)
    {
      $this->_outputFormat = "%%num%% %s";
    }

    $format = str_replace(
      ['%%num%%', '%%precision%%'],
      [$this->_getNumberFormat($value), $this->_precision],
      $this->_outputFormat
    );

    return sprintf($format, $value, $suffix);
  }

  public function setOutputFormat($format = "%%num%% %s")
  {
    $this->_outputFormat = $format;
    return $this;
  }

  public function getOutputFormat()
  {
    return $this->_outputFormat;
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
