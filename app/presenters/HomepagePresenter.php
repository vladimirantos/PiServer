<?php
namespace App\Presenters;

use Nette;

class HomepagePresenter extends BasePresenter {

    public function startup() {
        parent::startup();
        $this->template->weather = $this->getWeather();
    }
    
    public function actionWeather(){
        $this->sendData($this->getWeather());
    }

    public function renderDefault(){

    }

    /**
     * /piserver/www/homepage/change-city?city=$city
     */
    public function actionChangeCity(){
        $city = $this->request();
        if($city != null){
            $this->weatherService->saveCity($city);
            $this->updateData();
            $this->sendData($this->getWeather());
        }
    }
    
    public function actionAllCities(){
        return $this->sendData($this->weatherService->getAllCities());
    }

    public function getWeather(){
        if(!file_exists(dataPath))
            $this->updateData();
        return $this->weatherService->load(dataPath);
    }
}
