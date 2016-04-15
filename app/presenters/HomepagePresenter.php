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
}
