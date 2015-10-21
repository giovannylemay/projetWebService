<?php

const PARAM_ACTION = 'action';
const GET_KIND = 'listing';

    class GenreWS Implements IWebService{

        public function DoGet()
        {
            return $this->DoPost();
        }

        public function DoPost()
        {

        }

        public function DoPut()
        {
            Helper::ThrowAccessDenied();
        }

        public function DoDelete()
        {
            Helper::ThrowAccessDenied();
        }

}
/**
 * Created by PhpStorm.
 * User: gomel_000
 * Date: 21/10/2015
 * Time: 09:02
 */