<?php

    /**
     *
     * Controls what view the user
     * will see and loads the proper files
    * @param $controller
    * @param $action
    */
	function call($controller,$action){
		require_once('controller/'.$controller.'Controller.php');

		switch($controller){
			case 'Page':
				$controller = new PageController();
				break;

			case 'Log':
			    require_once('data/CompareRepository.php');
			    require_once('data/LocationRepository.php');
				require_once('data/LogRepository.php');
				require_once('model/Log.php');
				require_once('model/Location.php');
				require_once('model/Related.php');

				$controller = new LogController();
				break;
		}

		$controller->{$action}();
	}

	$controllers = array('Page' =>['error'],
						 'Log' => ['index'] );

	if(array_key_exists($controller, $controllers)){
		if(in_array($action, $controllers[$controller])){
			call($controller,$action);
		}else{
			call('Page','error');
		}
	}else{
		call('Page','error');
	}

?>