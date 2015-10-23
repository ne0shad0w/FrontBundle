<?php

namespace ne0shad0w\FrontBundle\FrontBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FrontBundle extends Bundle
{
	
	public function menu_site() {
		return $menu = array( 
							array('titre'=>'accueil', 
								  'route' => 'zephyr_homepage',
								  'routeParameters'=>array(),
								  'actif' => true
								),
							array('titre'=>'Zéphyr', 
								  'route' => 'zephyr_page',
								  'routeParameters'=>array('name'=>strtolower('zéphyr')),
								  'actif' => true
								),
							array('titre'=>'Services', 
									'menu' => array(
												array('titre'=>'Visuel', 
													'route' => 'zephyr_page',
													'routeParameters'=>array('name'=>strtolower('visuel')),
													'actif' => true
													),
												array('titre'=>'Programmation', 
													'route' => 'zephyr_page',
													'routeParameters'=>array('name'=>strtolower('programmation')),
													'actif' => true
													),
												array('titre'=>'Hébergement', 
													'route' => 'zephyr_page',
													'routeParameters'=>array('name'=>strtolower('hébergement')),
													'actif' => true
													)
													
												)
											
									),
							array('titre'=>'Réalisations', 
									'menu' => array(
												array('titre'=>'Tout Zéphyr', 
													'route' => 'zephyr_page',
													'routeParameters'=>array('name'=>strtolower('RéalisationZéphyr')),
													'actif' => true
													),
												array('titre'=>'Collaboration', 
													'route' => 'zephyr_page',
													'routeParameters'=>array('name'=>strtolower('RéalisationCollaboration')),
													'actif' => true
													),
												array('titre'=>'Dépannage', 
													'route' => 'zephyr_page',
													'routeParameters'=>array('name'=>strtolower('RéalisationDépannage')),
													'actif' => true
													)
													
												)
											
									),
							array('titre'=>'Contact', 
								  'route' => 'zephyr_page',
								  'routeParameters'=>array('name'=>strtolower('contact')),
								  'actif' => true
								)
							);
	}
/*	
	public function adm_module(){		
		return true;
	}
*/
	public function site_actif(){		
		return true;
	}
	

}
