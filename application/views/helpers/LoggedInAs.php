<?php

class Zend_View_Helper_LoggedInAs extends Zend_View_Helper_Abstract {

    public function loggedInAs() {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $username = $auth->getIdentity()->username;
            $logoutUrl = $this->view->url(array('controller' => 'user', 'action' => 'logout'), null, true);

            return 'Welcome ' . $username . '.  <a class="btn btn-default"" href="' . $logoutUrl . '">Log out?</a>';
        }
        $request = Zend_Controller_Front::getInstance()->getRequest();
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        if ($controller == 'user' && $action == 'index') {
            return '';
        }
    }

}
