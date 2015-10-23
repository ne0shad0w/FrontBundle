<?php

namespace ne0shad0w\FrontBundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;

use ne0shad0w\PageBundle\PageBundle\Entity\PgPage;
use ne0shad0w\PageBundle\PageBundle\Entity\PgTemplateBlocrow;
use ne0shad0w\PageBundle\PageBundle\Entity\PgBlocrow;
use ne0shad0w\PageBundle\PageBundle\Entity\PgBloccol;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Cache\Cache;

class DefaultController extends Controller
{
	
    public function indexAction()
    {
			$name = "accueil";
			$userManager = $this->container->get('fos_user.user_manager');
			$user = $userManager->findUserByUsername($this->container->get('security.context')->getToken()->getUser());
			
			$em = $this->getDoctrine()->getManager();
			$page = $em->getRepository('PageBundle:PgPage')->findOneByCanonicalPage(strtolower($name));
			//$opt = $this->extract_option_page($page) ;
			return $this->render('FrontBundle:'.$this->container->getParameter('front_theme').':'.strtolower( $page->getTemplate()->getNomTemplate() ).'.html.twig',array('page'=>$page));
    }
	
    public function pageAction($name)
    {	
			//$logger = $this->get('logger');
			//$logger->error('Page demande : ' . $name ); 
			$opt = array();
				
			$userManager = $this->container->get('fos_user.user_manager');
			$user = $userManager->findUserByUsername($this->container->get('security.context')->getToken()->getUser());
			
			$em = $this->getDoctrine()->getManager();
			
			
			$page = $em->getRepository('PageBundle:PgPage')->findOneByCanonicalPage(strtolower($name));
			
			//$opt = $this->extract_option_page($page) ;
			//dump($page);
			$opt['page'] = $page;
			if  ( !$page ) {return $this->render('FrontBundle:'.$this->container->getParameter('front_theme').':indisponible.html.twig');			}			
				if  ( $page->getActifPage() || $user ) {
					return $this->render('FrontBundle:'.$this->container->getParameter('front_theme').':'.strtolower( $page->getTemplate()->getNomTemplate() ).'.html.twig',$opt);
				} else {
					return $this->render('FrontBundle:'.$this->container->getParameter('front_theme').':indisponible.html.twig');
				}
			
    }

	
	
    public function rechercheAction(Request $request)
    {	
	$logger = $this->get('logger');

		$search = $request->request->get('s');
		
		
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
			'SELECT c
			FROM PageBundle:PgBloccol c
			WHERE c.htmlBloccol LIKE :s AND c.nomBloccol <> :out GROUP BY c.section'
		)->setParameter('s', '%'.trim($search).'%')->setParameter('out','Menu Gauche');
		
		$recherche = $query->getResult();		
		//$logger->error('Recherche : ' . '%'.trim($search).'%' ); 
		return $this->render('FrontBundle:'.$this->container->getParameter('front_theme').':recherche.html.twig',array('s'=>$recherche , 'chaine'=>trim($search)));
				
			
    }
	
}
