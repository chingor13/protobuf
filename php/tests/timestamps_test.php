<?php

require_once('test_util.php');

use Google\Protobuf\Timestamp;

class TimestampsTest extends PHPUnit_Framework_TestCase
{
    public function testReadsTimestampFromJson()
    {
        $json = <<<EOS
{
    "createdAt": "2018-04-27T13:09:23.123456Z"
}
EOS;
        $message = new TestTimestampProto();
        $message->mergeFromJsonString($json);
        $timestamp = $message->getCreatedAt();
        $this->assertInstanceOf(Timestamp::class, $timestamp);
        $this->assertEquals(1524834566, $timestamp->getSeconds());
        $this->assertEquals(123456, $timestamp->getNanos());
    }
}