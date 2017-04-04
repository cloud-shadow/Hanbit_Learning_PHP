namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MenuController extends AbstractActionController
{
    public function showAction()
    {
        $now = new \DateTime();
        $items = [ "°¨ÀÚ Æ¢±è", "Âğ °¨ÀÚ", "±¸¿î °¨ÀÚ" ];

        return new ViewModel(array('when' => $now,
                                   'what' => $items));
    }
}