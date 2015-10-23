<?php

namespace ne0shad0w\FrontBundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
/*
use AppBundle\PageBundle\Entity\PgPage;
use AppBundle\PageBundle\Entity\PgTemplateBlocrow;
use AppBundle\PageBundle\Entity\PgBlocrow;
use AppBundle\PageBundle\Entity\PgBloccol;
*/
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Cache\Cache;

class RechercheController extends Controller
{
    public function indexAction(Request $request)
    {
	//$logger = $this->get('logger');

		$search = $request->request->get('s');
		
		
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
			'SELECT c
			FROM PageBundle:PgBloccol c
			WHERE c.htmlBloccol LIKE :s AND c.nomBloccol <> :out GROUP BY c.section'
		)->setParameter('s', '%'.trim($search).'%')->setParameter('out','Menu Gauche');
		
		$recherche = $query->getResult();		
		//$logger->warning('Recherche : ' . '%'.trim(htmlspecialchars($search)).'%' ); 
		return $this->render('FrontBundle:'.$this->container->getParameter('front_theme').':recherche.html.twig',array('s'=>$recherche , 'chaine'=>trim($search)));
				
			
    }
	
}
