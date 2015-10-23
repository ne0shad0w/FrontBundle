<?php
namespace ne0shad0w\FrontBundle\FrontBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\ORM\EntityManager;

use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\DependencyInjection\Container;

use Symfony\Component\Templating\EngineInterface;

class Builder extends ContainerAware
{
	private $factory;
	private $em;
	protected $container;
     /**
     * @param FactoryInterface $factory
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(FactoryInterface $factory, \Doctrine\ORM\EntityManager $em , Container $container ,TranslatorInterface  $translator  )
    {
        $this->factory = $factory;
		$this->em = $em;
		$this->container = $container;
		$this->translator = $translator;
    }
	public function createMainMenu()
    {
		$menu = $this->factory->createItem('main');	
		$menu->setChildrenAttribute('class', 'nav navbar-nav');
			
		$bundle = new \ne0shad0w\FrontBundle\FrontBundle\FrontBundle ;
				//Vérifie sur le module doit être charger pour les administrateurs.
		if ( method_exists( $bundle , "menu_site" ) && ( $bundle->site_actif() === true   ) ) {
					$module = array();
					$module = $bundle->menu_site($this->container->getParameter('locale')) ;
					foreach( $module as $mod ) {
						if ( isset( $mod['route']) ) {
							if ( $mod['actif'] == true ) {
								$menu->addChild($this->translator->trans($mod['titre']),array('route' => $mod['route'] , 'routeParameters'=> $mod['routeParameters'] ));   
							}
						} else {//, array('dropdown'=> true , 'caret'=> true )
							$menu_module = $menu->addChild($this->translator->trans($mod['titre']))->setAttribute('dropdown',true);
							if ( isset($mod['sousmenu'])) {
								foreach($mod['sousmenu'] as $t => $v)
									$menu_module->addChild($this->translator->trans($t),array('route' => $v));   
							}
							
								if ( isset($mod['menu'])) {
									$menu_module = $this->createSubMenu($menu_module , $mod['menu'] ) ;
								}
							
						}
					}
		}
		
        return $menu;
    }

	public function createSubMenu($menu_module , $submenu  ){
		foreach($submenu as $arr){
				if ( $arr['actif'] == true ) {
					$route = $arr['route'];
					if ( !is_array($route) ) {
						$menu_module->addChild($this->translator->trans($arr['titre']),array('route' => $arr['route'], 'routeParameters'=> $arr['routeParameters'] ));  
					} else {
						$newsub = $menu_module->addChild($this->translator->trans($arr['titre']))->setAttribute('dropdown',true);
						$newsub = $this->createSubMenu($newsub , $arr['route'] ) ;
					}
									
				}
			}
		return $menu_module	 ;
	}


}