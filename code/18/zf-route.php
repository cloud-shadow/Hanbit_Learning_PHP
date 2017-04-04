<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MenuController extends AbstractActionController
{
    public function showAction()
    {
        $now = new \DateTime();
        $items = [ "감자 튀김", "찐 감자", "구운 감자" ];

        return new ViewModel(array('when' => $now,
                                   'what' => $items));
    }
}
