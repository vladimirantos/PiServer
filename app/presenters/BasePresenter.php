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
        $this->updateData(defaultCity);
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
     * Kontroluje jestli je potřeba znovu stáhnout předpověď.
     * @param string $city
     */
    protected function updateData($city) {
        $this->weatherService->needUpdate() ? $this->weatherService->download(weatherURL, $city)->save(dataPath) : null;
    }

    /**
     * @param array|Resource $data
     * @param int $code
     */
    protected function response($data) {
        $this->sendResponse(new JsonResponse($data));
    }

    /**
     * @param string $text
     * @param int $httpCode
     */
    protected function sendMessage($text, $httpCode = 200) {
        $this->response(new Response($httpCode, $text));
    }

    /**
     * @param array $data
     * @param int $httpCode
     */
    protected function sendData($data, $httpCode = 200) {
        $this->response(new Response($httpCode, null, $data));
    }
}