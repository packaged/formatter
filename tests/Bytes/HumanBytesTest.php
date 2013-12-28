<?php
class HumanBytesTest extends BaseNumberFormatterTest
{
  public function setUp()
  {
    $this->_formatter = new \Packaged\Formatter\Bytes\HumanBytes();

    $this->addConversion(1048576, '1 MB');
    $this->addConversion(1024, '1 KB');
    $this->addConversion(512, '512 B');
  }

  public function testSlackPrecision()
  {
    $this->_formatter->forcePrecision(false);
    $this->clearConversions();;

    $this->addConversion(bcmul(1.00, bcpow(1024, 1)), '1 KB');
    $this->addConversion(bcmul(1.25, bcpow(1024, 1)), '1.25 KB');
    $this->addConversion(bcmul(1.50, bcpow(1024, 2)), '1.50 MB');
    $this->addConversion(bcmul(1.75, bcpow(1024, 3)), '1.75 GB');
    $this->addConversion(bcmul(2.00, bcpow(1024, 4)), '2 TB');
    $this->addConversion(bcmul(2.25, bcpow(1024, 5)), '2.25 PB');
    $this->addConversion(bcmul(2.50, bcpow(1024, 6)), '2.50 EB');
    $this->addConversion(bcmul(2.75, bcpow(1024, 7)), '2.75 ZB');
    $this->addConversion(bcmul(3.00, bcpow(1024, 8)), '3 YB');

    $this->testConversions();
  }

  public function testPrecisionForced()
  {
    $this->_formatter->forcePrecision(true);
    $this->clearConversions();

    $this->addConversion(bcmul(1.00, bcpow(1024, 1)), '1.00 KB');
    $this->addConversion(bcmul(1.25, bcpow(1024, 1)), '1.25 KB');
    $this->addConversion(bcmul(1.50, bcpow(1024, 2)), '1.50 MB');
    $this->addConversion(bcmul(1.75, bcpow(1024, 3)), '1.75 GB');
    $this->addConversion(bcmul(2.00, bcpow(1024, 4)), '2.00 TB');
    $this->addConversion(bcmul(2.25, bcpow(1024, 5)), '2.25 PB');
    $this->addConversion(bcmul(2.50, bcpow(1024, 6)), '2.50 EB');
    $this->addConversion(bcmul(2.75, bcpow(1024, 7)), '2.75 ZB');
    $this->addConversion(bcmul(3.00, bcpow(1024, 8)), '3.00 YB');

    $this->testConversions();
  }
}
