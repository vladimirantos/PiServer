<?php
namespace App\Presenters;

use App\Model\Helper;
use Nette;


class HomepagePresenter extends BasePresenter {

    public function startup() {
        parent::startup();
    }
    
    public function actionDefault(){
        $this->sendData($this->weatherService->load(dataPath));
    }

    /**
     * /piserver/www/homepage/change-city?city=$city
     * @param string $city
     */
    public function actionChangeCity($city){
        $this->weatherService->saveCity($city);
        $this->updateData($city);
    }
}
