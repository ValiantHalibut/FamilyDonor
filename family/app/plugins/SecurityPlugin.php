<?php

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Acl\Adapter\Memory as AclList;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;

class SecurityPlugin extends Plugin
{
    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        echo "Hello";
        $userType = $this->session->get('userType');
        
        if(!$userType) {
            $userType = 'none';
        }
        
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();
        
        $acl = $this->_getAcl();
        
        $allowed = $acl->isAllowed($userType, $controller, $action);
        
        if($allowed != Acl::ALLOW) {
            $dispatcher->forward(
                array(
                    'controller'    => 'index',
                    'action'        => 'index'
                    )
                );
        }
    }
    
    private function _getAcl()
    {
        // Create an empty ACL
        $acl = new AclList();
        // Set the default action to be DENY access
        $acl->setDefaultAction(Acl::DENY);
        
        $roles = array(
            'admin' => new Role('admin'),
            'donor' => new Role('donor'),
            'none'  => new Role('none')
            );
        foreach($roles as $role) {
            $acl->addRole($role);
        }
        
        $adminResources = array(
            'admin' => array('index', 'update', 'setup')
            );
        $donorResources = array(
            'donor' => array('index')
            );
        $noneResources = array(
            'index' => array('index'),
            'user' => array('login', 'logout')
            );
        
        $resources = array($adminResources, $donorResources, $noneResources);
        foreach($resources as $resourceList) {
            foreach($resourceList as $resource => $actions) {
                $acl->addResource(new Resource($resource), $actions);
            }
        }
        
        foreach($roles as $role) {
            foreach($noneResources as $resource => $actions) {
                $acl->allow($role->getName(), $resource, '*');
            }
        }
        foreach($donorResources as $resource => $actions) {
            foreach($actions as $action) {
                $acl->allow('donor', $resource, $action);
            }
        }
        foreach($adminResources as $resource => $actions) {
            foreach($actions as $action) {
                $acl->allow('admin', $resource, $action);
            }
        }
        return $acl;
    }
}
