<?php
namespace App\Presenters;
use App\Model\Resource\Response;
use App\Model\WeatherService;
use Nette\Application\Responses\JsonResponse;
use Nette\Application\UI\Presenter;

/**
 * Class BasePresenter
 * @package App\Presenters
 * @author Vladimír Antoš
 * @version 1.0
 */
class BasePresenter extends Presenter {

    /**
     * @var WeatherService @inject
     */
    public $weatherService;

    public function startup() {
        parent::startup();
        $this->safetyUpdate();
    }

    /**
     * @param string $key
     * @return array
     */
    protected function request($key = null){
        if($key == null)
            return $this->request->getPost();
        return $this->request->getPost($key);
    }

    /**
     * Aktualizuje předpověď.
     */
    protected function updateData() {
        $city = $this->weatherService->getCurrentCity();
        $this->weatherService->download(weatherURL, $city)->save(dataPath);
    }

    /**
     * Kontroluje jestli je potřeba znovu stáhnout předpověď.
     */
    protected function safetyUpdate(){
        $this->weatherService->needUpdate() ? $this->weatherService->download(weatherURL, $this->weatherService->getCurrentCity())->save(dataPath) : null;
    }

    /**
     * @param array|Resource $data
     * @param int $code
     */
    protected function response($data) {
        $this->sendResponse(new JsonResponse($data));
    }

//    /**
//     * @param string $text
//     * @param int $httpCode
//     */
//    protected function sendMessage($text, $httpCode = 200) {
//        $this->response(new Response($httpCode, $text));
//    }

    /**
     * @param array $data
     * @param int $httpCode
     */
    protected function sendData($data) {
        $this->response(new Response($data));
    }
}