<?php

/**
 * Test class for HackJob_Util_Date.
 * Generated by PHPUnit on 2011-10-22 at 22:06:08.
 */
class HackJob_Utile_DateTest extends PHPUnit_Framework_TestCase
{
    public function testFromTimestamp()
    {
    	$dateObject = HackJob_Utile_Date::fromTimestamp(456184800);
    	$this->assertEquals(456184800, $dateObject->timestamp);
    }

    public function testFromNow()
    {
        $now = time();
        $dateObject = HackJob_Utile_Date::fromNow();
        $this->assertEquals($now, $dateObject->timestamp);
    }
    
    public function testFromString()
    {
    	date_default_timezone_set('Europe/Berlin');
        $dateObject = HackJob_Utile_Date::fromString('16.06.1984');
        $this->assertEquals(456184800, $dateObject->timestamp);
    }
    
    public function testToGermanDate()
    {
    	$dateObject = HackJob_Utile_Date::fromTimestamp(456184800);
    	$string = $dateObject->toGermanDate(false);
    	$this->assertEquals('16.06.1984', $string);
    	
    	$string = $dateObject->toGermanDate(true);
    	$this->assertEquals('16.06.1984 00:00:00', $string);
    }
    
    public function testToMySQLDate()
    {
    	$dateObject = HackJob_Utile_Date::fromTimestamp(456184800);
    	$string = $dateObject->toMySQLDate(false);
    	$this->assertEquals('1984-06-16', $string);
    	
    	$string = $dateObject->toMySQLDate(true);
    	$this->assertEquals('1984-06-16 00:00:00', $string);
    }
    
    /**
     * @expectedException HackJob_Utile_DateException
     */
    public function testInvalidDateString()
    {
    	$dateObject = HackJob_Utile_Date::fromString('Spiderman, Spiderman!');
    }

    public function testToFormat()
    {
    	$dateObject = HackJob_Utile_Date::fromTimestamp(456184800);
    	$string = $dateObject->toFormat('Y-m-d');
    	$this->assertEquals('1984-06-16', $string);	
    }
}
?>
