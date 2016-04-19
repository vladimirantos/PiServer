<?php
namespace App\Presenters;

use Nette;


class HomepagePresenter extends BasePresenter {

    public function startup() {
        parent::startup();
    }
    
    public function actionWeather(){
        $this->sendData($this->getWeather());
    }

    public function renderDefault(){
        $this->template->weather = $this->getWeather();
    }

    /**
     * /piserver/www/homepage/change-city?city=$city
     * @param string $city
     */
    public function actionChangeCity(){
        $city = $this->request();
        file_put_contents("temp.txt", $city);
      /*  $this->weatherService->saveCity($city);
        $this->updateData();
        $this->sendData($this->getWeather());*/
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
