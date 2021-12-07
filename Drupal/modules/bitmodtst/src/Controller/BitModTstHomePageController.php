<?php

namespace Drupal\bitmodtst\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

class BitModTstHomePageController extends ControllerBase {
	
	private $input;
    
    public function __construct() {
        
		$this->input = empty($_REQUEST) ? false : $_REQUEST;
        
    }

    public function display() {
		
		if ($this->input !== false) {
			
			$results = 'Cu parametrii:';
				
		} else {
			
			$results = 'Fara parametrii';
			
		}
		
		$params = array(
			'results' => $results,
			'input' => json_encode($this->input),
			'title' => 'Titlu pe care eu l-am ales',
			'weather' => $this->getWheatherData(isset($_REQUEST['city']) ? $_REQUEST['city'] : 'Bucharest')
		);
    
        return array(
            '#theme' => 'bithomepage',
			'#params' => $params,
			'#cache' => array('max-age' => 0),
            '#attached' => array(
                'library' => array(
                    'bitmodtst/bitmodtst-css'
                ),
            )
        );
    
    }
    
    public function access(AccountInterface $account) {
		
		$roles = $account->getRoles();
		
		if (in_array('authenticated', $roles)) {
			
			return AccessResult::allowed();
		
		} else {
		
			return AccessResult::forbidden();
		
		}		
    }

	private function getWheatherData($city = 'Bucharest') { 
		// TODO: Muta cheia din scting in config
		$appID = '0b5109f774ac90587cf84d40b5858fd9';
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,'https://api.openweathermap.org/data/2.5/weather?units=metric&q=' . $city . '&appid=' . $appID);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);

		if(curl_error($ch)) {
			return false;
		}

		curl_close($ch);
		
		return json_decode($response);
	}
    
}
