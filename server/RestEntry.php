<?php

namespace server;

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
    
    public function __construct(RestRequest $request, RestResponse $response) {
        $this->request = $request;
        $this->response= $response;
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
        $this->response->setContent($content);
    }

    protected function onPost() {
        throw new Exception("not implemented");
    }

    protected function onGet() {
        throw new Exception("not implemented");
    }

    protected function onPut() {
        throw new Exception("not implemented");
    }

    protected function onDelete() {
        throw new Exception("not implemented");
    }

}