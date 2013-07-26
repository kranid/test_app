<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
$ajax =$this->_helper->getHelper('ajaxContext');
$ajax->addActionContext('getmessage','json');
$ajax->addActionContext('sentmessage','json');

$ajax->initContext();
    }

    public function indexAction()
    {
$form =new  Application_Form_Message();
$this->view->form =$form;
$tMessages =new Application_Model_DbTable_Messages();
$listMessage=$tMessages->fetchAll();
$this->view->listMessage =$listMessage;
    }

    public function sentmessageAction()
    {
if (($username =$this->_getParam('username')) && ($message =$this->_getParam('message')))
{
$filter = new Zend_Filter_StripTags();
$username =$filter->filter($username);
$message =$filter->filter($message);
$table =new Application_Model_DbTable_Messages();
$id =$table->insert(array('username'=>$username,'message'=>$message));
}
    }

    public function getmessageAction()
    {
if ($lastMessage = $this->_getParam('lastmessage'))
{
$table =new Application_Model_DbTable_Messages();
$listMessage =$table->fetchAll($table->select()->where('date >?', $lastMessage));
}
if (count($listMessage))
$this->_helper->json($listMessage);
else
$this->_helper->json(null);

    }


}





