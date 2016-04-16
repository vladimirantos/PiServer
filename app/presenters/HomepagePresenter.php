<?php
namespace App\Presenters;

use App\Model\Helper;
use Nette;


class HomepagePresenter extends BasePresenter {

    public function startup() {
        parent::startup();
    }
    
    public function actionDefault(){
        if(!file_exists(dataPath))
            $this->updateData();
        $data = $this->weatherService->load(dataPath);
        $this->sendData($data);
    }

    /**
     * /piserver/www/homepage/change-city?city=$city
     * @param string $city
     */
    public function actionChangeCity($city){
        $this->weatherService->saveCity($city);
        $this->updateData();
    }
    
    public function actionAllCities(){
        return $this->sendData($this->weatherService->getAllCities());
    }
}
