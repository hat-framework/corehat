<?php

namespace corehat\core;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-08-11 at 03:26:11.
 */
class ObjectTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Object
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Object;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }
    
    /**
     * @covers corehat\core\Object::setErrorMessage, corehat\core\Object::appendErrorMessage, corehat\core\Object::getErrorMessage
     * @todo   Implement testAppendErrorMessage().
     */
    public function testErrorMessage() {
        $str1 = "Erro!";
        $this->assertEquals(false, $this->object->setErrorMessage($str1));
        $this->assertEquals(false, $this->object->appendErrorMessage($str1));
        $this->assertEquals(false, $this->object->appendErrorMessage($str1, "-"));
        $this->assertEquals("$str1$str1<br/>$str1-",$this->object->getErrorMessage(true));
        $this->assertEquals("",$this->object->getErrorMessage());
    }

    /**
     * @covers corehat\core\Object::setSuccessMessage, corehat\core\Object::appendSuccessMessage, corehat\core\Object::getSuccessMessage
     * @todo   Implement testAppendSuccessMessage().
     */
    public function testSuccessMessage() {
        $str1 = "Sucesso!!";
        $this->assertEquals(true, $this->object->setSuccessMessage($str1));
        $this->assertEquals(true, $this->object->appendSuccessMessage($str1));
        $this->assertEquals(true, $this->object->appendSuccessMessage($str1, "-"));
        $this->assertEquals("$str1$str1<br/>$str1-",$this->object->getSuccessMessage(true));
        $this->assertEquals("",$this->object->getSuccessMessage());
    }

    /**
     * @covers corehat\core\Object::setAlertMessage, corehat\core\Object::appendAlertMessage, corehat\core\Object::getAlertMessage
     * @todo   Implement testSetAlertMessage().
     */
    public function testSetAlertMessage() {
        $str1 = "!Alerta!";
        $this->assertEquals(false, $this->object->setAlertMessage($str1));
        $this->assertEquals(false, $this->object->appendAlertMessage($str1));
        $this->assertEquals(false, $this->object->appendAlertMessage($str1, "-"));
        $this->assertEquals("$str1$str1<br/>$str1-",$this->object->getAlertMessage(true));
        $this->assertEquals("",$this->object->getAlertMessage());
    }

    /**
     * @covers corehat\core\Object::appendMessage, corehat\core\Object::getMessages
     * @todo   Implement testAppendMessage().
     */
    public function testAppendMessage() {
        $msg  = "MSG"; 
        $type = "mytype";
        $app  = "-";
        $this->object->appendMessage($type, $msg, $app);
        $this->object->appendMessage($type, $msg, $app);
        $this->object->appendMessage($type, $msg, $app);
        $msgs = $this->object->getMessages(false);
        $this->assertEquals(true,isset($msgs[$type]));
        $this->assertEquals("$msg$app$msg$app$msg$app",$msgs[$type]);
    }

    /**
     * @covers corehat\core\Object::setMessages
     * @todo   Implement testSetMessages().
     */
    public function testSetMessages() {
        $array1 = array(
            'erro'    => 'meu erro',
            'success' => 'meu sucesso',
            'alert'   => 'meu alerta',
        );
        $array2 = array('erro' => 'meu erro2', 'outro' => 'qualquer coisa!');
        $result = array('erro' => 'meu erro2', 'success' => 'meu sucesso', 'alert' => 'meu alerta', 'outro' => 'qualquer coisa!');
        
        $this->object->setMessages($array1);
        $this->object->setMessages($array2);
        $res  = $this->object->getMessages();
        
        $this->assertEquals(true,$res === $result);
    }

    /**
     * @covers corehat\core\Object::setMessage, corehat\core\Object::setSimpleMessage
     * @todo   Implement testSetMessage().
     */
    public function testSetMessage() {
        $sep   = " -- ";
        $camp  = "mycamp";  $msg  = 'my msg';
        $camp2 = "mycamp2"; $msg2 = array('a', 'b');
        $camp3 = "mycamp3";
        
        $this->object->setMessage($camp, $msg, $sep);
        $this->object->setMessage($camp2, $msg2, $sep);
        $this->object->setSimpleMessage($camp3, $msg2);
        $msgs = $this->object->getMessages(false);
        $this->assertEquals(true,isset($msgs[$camp]));
        $this->assertEquals(true, $msg === $msgs[$camp]);
        $this->assertEquals(true, implode($sep, $msg2) === $msgs[$camp2]);
        $this->assertEquals(true, $msg2 === $msgs[$camp3]);
    }

    /**
     * @covers corehat\core\Object::unsetMessage
     * @todo   Implement testUnsetMessage().
     */
    public function testUnsetMessage() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers corehat\core\Object::addLog
     * @todo   Implement testAddLog().
     */
    public function testAddLog() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers corehat\core\Object::getLog
     * @todo   Implement testGetLog().
     */
    public function testGetLog() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers corehat\core\Object::getSuccessMessage
     * @todo   Implement testGetSuccessMessage().
     */
    public function testGetSuccessMessage() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers corehat\core\Object::getAlertMessage
     * @todo   Implement testGetAlertMessage().
     */
    public function testGetAlertMessage() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers corehat\core\Object::getMessages
     * @todo   Implement testGetMessages().
     */
    public function testGetMessages() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers corehat\core\Object::whoAmI
     * @todo   Implement testWhoAmI().
     */
    public function testWhoAmI() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers corehat\core\Object::propagateMessage
     * @todo   Implement testPropagateMessage().
     */
    public function testPropagateMessage() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
