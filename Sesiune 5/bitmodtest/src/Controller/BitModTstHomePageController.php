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

    public function display()
    {

      $params = array();

      $database = \Drupal::database();

      $query = $database->select('angajati', 'a');

      $query->condition('a.id', 0, '>');
      $query->fields('a', array('nume', 'salariu'));
      $query->range(0, 100);


      $results = $query->execute();

      $params['db_response'] = $results;
      
      // Calcul
      if (!empty($this->input['x']) && !empty($this->input['y'])) {
        if (is_numeric($this->input['x']) && is_numeric($this->input['y'])) {
          $x = intval($this->input['x']);
          $y = intval($this->input['y']);

          $params['calculator_results'] = $this->calculate($x, $y);
        }
      }

      if ($this->input !== false) {
        $results = 'Niste continut de test';
      } else {
        $results = 'Alt continut de test';
      }

      $params['results'] = $results;
      $params['input'] = $this->input;


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

    private function calculate($x, $y) {
      $result = [];

      // Adunare
      $result[] = "$x + $y= " . ($x + $y);
      // Scadere
      $result[] = "$x - $y= " . ($x - $y);
      // Inmultire
      $result[] = "$x * $y= " . ($x * $y);

      return $result;
    }

}
