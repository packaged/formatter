<?php
class BinaryBytesTest extends BaseNumberFormatterTest
{
  public function setUp()
  {
    $this->_formatter = new \Packaged\Formatter\Bytes\BinaryBytes();

    $this->addConversion(1048576, '1 MiB');
    $this->addConversion(1024, '1 KiB');
    $this->addConversion(512, '512 B');
  }

  public function testSlackPrecision()
  {
    $this->_formatter->forcePrecision(false);
    $this->clearConversions();;

    $this->addConversion(bcmul(1.00, bcpow(1024, 1)), '1 KiB');
    $this->addConversion(bcmul(1.25, bcpow(1024, 1)), '1.25 KiB');
    $this->addConversion(bcmul(1.50, bcpow(1024, 2)), '1.50 MiB');
    $this->addConversion(bcmul(1.75, bcpow(1024, 3)), '1.75 GiB');
    $this->addConversion(bcmul(2.00, bcpow(1024, 4)), '2 TiB');
    $this->addConversion(bcmul(2.25, bcpow(1024, 5)), '2.25 PiB');
    $this->addConversion(bcmul(2.50, bcpow(1024, 6)), '2.50 EiB');
    $this->addConversion(bcmul(2.75, bcpow(1024, 7)), '2.75 ZiB');
    $this->addConversion(bcmul(3.00, bcpow(1024, 8)), '3 YiB');

    $this->testConversions();
  }

  public function testPrecisionForced()
  {
    $this->_formatter->forcePrecision(true);
    $this->clearConversions();

    $this->addConversion(bcmul(1.00, bcpow(1024, 1)), '1.00 KiB');
    $this->addConversion(bcmul(1.25, bcpow(1024, 1)), '1.25 KiB');
    $this->addConversion(bcmul(1.50, bcpow(1024, 2)), '1.50 MiB');
    $this->addConversion(bcmul(1.75, bcpow(1024, 3)), '1.75 GiB');
    $this->addConversion(bcmul(2.00, bcpow(1024, 4)), '2.00 TiB');
    $this->addConversion(bcmul(2.25, bcpow(1024, 5)), '2.25 PiB');
    $this->addConversion(bcmul(2.50, bcpow(1024, 6)), '2.50 EiB');
    $this->addConversion(bcmul(2.75, bcpow(1024, 7)), '2.75 ZiB');
    $this->addConversion(bcmul(3.00, bcpow(1024, 8)), '3.00 YiB');

    $this->testConversions();
  }
}
