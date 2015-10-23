<?php
namespace ne0shad0w\FrontBundle\FrontBundle\Twig;

class FrontExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('extracthtml', array($this, 'extracthtmlFilter')),
        );
    }

    public function extracthtmlFilter($html,$getoption ="page")
    {
		$arr = array();	
		preg_match("/(\{\[.*\]\})/",$html,$arr);
		$options['page'] = $html;
		$options['page'] = str_replace($arr,"",$html);
		if ( count($arr) > 0 ) {
			foreach( $this->ArrangeOptions($arr) as $option) {
				
				$t = explode("=",$option);
				$options[$t[0]] = $t[1];
			}
		}
		return ( isset($options[$getoption]) ) ? $options[$getoption] : "" ;
    }

    public function getName()
    {
        return 'front_extension';
    }
	
	private function ArrangeOptions($options){
		$tmp = array();
		$arr = explode(",",$options[0] );
		foreach ( $arr as $opt ) {
			$opt = str_replace("{[","",$opt);
			$opt = str_replace(",","",$opt);
			$opt = str_replace("]}","",$opt);
			$tmp[] = $opt ;	
			
		}
		return $tmp ;
	}
}

?>