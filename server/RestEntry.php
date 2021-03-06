<?php

namespace server;
use \Exception;
/**
 * Description of RestEntry
 *
 * @author sascha
 */
abstract class RestEntry {

    /**
     *
     * @var RestRequest
     */
    protected $request;

    /**
     *
     * @var RestResponse
     */
    protected $response;

    /**
     * 
     * @param \server\RestRequest $request
     * @param \server\RestResponse $response
     */
    public function __construct(RestRequest &$request, RestResponse &$response) {
        $this->request = $request;
        $this->response = $response;
        $content = [];
        if ($request) {
            switch ($request->getMethod()) {
                case "GET":
                    $content = $this->onGet();
                    break;
                case "POST":
                    $content = $this->onPost();
                    break;
                case "PUT":
                    $content = $this->onPut();
                    break;
                case "DELETE":
                    $content = $this->onDelete();
                    break;
            }
        }
        $this->response->setContent($content);
    }

    protected function onPost(): array {
        throw new Exception("not implemented");
    }

    protected function onGet(): array {
        throw new Exception("not implemented");
    }

    protected function onPut(): array {
        throw new Exception("not implemented");
    }

    protected function onDelete(): array {
        throw new Exception("not implemented");
    }

}
