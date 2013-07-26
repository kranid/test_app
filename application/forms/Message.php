<?php

class Application_Form_Message extends Zend_Form
{


    public function init()
    {
$this->setAction(' ');
$this->setName('form_message');
//$this->setAttrib('onSubmit',' return sentMessage()');


$this->setMethod('post');
$this->addElement('text', username,array('label'=>'имя пользователя:'));
$this->addElement('textarea', message, array('label' => 'сообщение:'));
$this->addElement('submit' ,sent);
//$this->sent->setAttrib('onClick','return sentMessage()');
    }


}

