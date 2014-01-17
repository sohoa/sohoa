<?php

namespace Application\Controller {

    use Sohoa\Framework\Kit;
    use Hoa\Http\Response\Response;

    /**
     * Default controller class for error handling
     */
    class Error extends Kit
    {

        protected function sendErrorHeader($code, $message)
        {
            if ($this->view instanceof \Hoa\View\Viewable) {
                /* @var $out \Hoa\Http\Response\Response */
                $out = $this->view->getOutputStream();
                $out->sendHeader('X-SOHOA-ERROR', $message, true, $code);
            }
        }

        /**
         * The controller called by default when an exception is raised
         * @param \Exception $err
         */
        public function DefaultAction(\Exception $err)
        {
            $this->sendErrorHeader(Response::STATUS_INTERNAL_SERVER_ERROR, $err->getMessage());
            echo 'Error! ' . $err->getMessage();
        }

        /**
         * When there is no route matching the uri or if there is no controller
         * This controller is called, raising a 404 error
         * @param \Exception $err
         */
        public function Err404Action(\Exception $err)
        {
            $this->sendErrorHeader(Response::STATUS_NOT_FOUND, $err->getMessage());
            echo 'Not found! ' . $err->getMessage();
        }
    }

}
