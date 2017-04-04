namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{
    /**
     * @Route("/show")
     * @Method("GET")
     */
    public function showAction()
    {
        $now = new \DateTime();
        $items = [ "°¨ÀÚ Æ¢±è", "Âğ °¨ÀÚ", "±¸¿î °¨ÀÚ" ];
        return $this->render("show-menu.html.twig",
                             [ 'when' => $now,
                               'what' => $items ]);
    }
}