<?php

class RequestParser
{

    private $_restParams = array();

    public function getPut($name, $defaultValue = null)
    {
        if ($this->_restParams === array()) {
            $this->_restParams = array_merge(
                $this->getIsPutRequest() ? $this->getRestParams() : array(),
                $this->_restParams
            );
        }
        return isset($this->_restParams[$name]) ? $this->_restParams[$name] : $defaultValue;
    }

    public function getDelete($name, $defaultValue = null)
    {
        if ($this->_restParams === array()) {
            $this->_restParams = array_merge(
                $this->getIsDeleteRequest() ? $this->getRestParams() : array(),
                $this->_restParams
            );
        }
        return isset($this->_restParams[$name]) ? $this->_restParams[$name] : $defaultValue;
    }

    /**
     * return all posible params from a request
     * @return array()
     */
    public function getAllRestParams($ignorInlineParams = false)
    {
        if ($this->_restParams === array()) {
            $this->_restParams = array_merge(
                ($this->getIsDeleteRequest() || $this->getIsPutRequest()) ? $this->getRestParams() : $_REQUEST,
                $this->_restParams
            );
        }
        if ($ignorInlineParams) {
            $result = array();
            foreach ($this->_restParams as $key => $val) {
                if (!preg_match('|^_|si', $key)) {
                    $result[$key] = $val;
                }
            }
            return $result;
        }
        return $this->_restParams;
    }


    public function parseJsonParams()
    {
        if (!isset($_SERVER['CONTENT_TYPE'])) {
            return $this->_restParams;
        }

        $contentType = strtok($_SERVER['CONTENT_TYPE'], ';');
        if ($contentType == 'application/json') {
            $requestBody = file_get_contents("php://input");
            $this->_restParams = array_merge((array) json_decode($requestBody), $this->_restParams);
        }
        return $this->_restParams;
    }

    /**
     * Returns the named GET or POST parameter value.
     * If the GET or POST parameter does not exist, the second parameter for this method will be returned.
     * If both GET and POST contain such a named parameter, the GET parameter takes precedence.
     * @param string $name the GET parameter name
     * @param mixed $defaultValue the default parameter value if the GET parameter does not exist.
     * @return mixed the GET parameter value
     * @since 1.0.4
     * @see getQuery
     * @see getPost
     */
    public function getParam($name, $defaultValue = null)
    {
        if (!isset($_GET[$name]) && isset($_GET['_' . $name])) {
            $name = '_' . $name;
        }
        $param = isset($_GET[$name]) ? $_GET[$name] : null;
        if (is_null($param)) {
            $param = isset($_GET[$name]) ? $_GET[$name] : null;
        }
        if (is_null($param)) {
            $param = isset($this->_restParams[$name]) ? $this->_restParams[$name] : null;
        }

        return !is_null($param) ? $param : $defaultValue;
    }

    public function setParam($name, $value)
    {
        $_GET[$name] = $value;
    }

    public function getQueryString()
    {
        return isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';
    }

    public function getIsSecureConnection()
    {
        return isset($_SERVER['HTTPS']) && (strcasecmp($_SERVER['HTTPS'], 'on') === 0 || $_SERVER['HTTPS'] == 1)
        || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0;
    }

    public function getRequestType()
    {
        if (isset($_POST['_method'])) {
            return strtoupper($_POST['_method']);
        } elseif (isset($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'])) {
            return strtoupper($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']);
        }
        return strtoupper(isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET');
    }

    public function getIsPostRequest()
    {
        return isset($_SERVER['REQUEST_METHOD']) && !strcasecmp($_SERVER['REQUEST_METHOD'], 'POST');
    }

    public function getIsDeleteRequest()
    {
        return (isset($_SERVER['REQUEST_METHOD']) && !strcasecmp(
                $_SERVER['REQUEST_METHOD'],
                'DELETE'
            )) || $this->getIsDeleteViaPostRequest();
    }

    protected function getIsDeleteViaPostRequest()
    {
        return isset($_POST['_method']) && !strcasecmp($_POST['_method'], 'DELETE');
    }

    public function getIsPutRequest()
    {
        return (isset($_SERVER['REQUEST_METHOD']) && !strcasecmp(
                $_SERVER['REQUEST_METHOD'],
                'PUT'
            )) || $this->getIsPutViaPostRequest();
    }

    protected function getIsPutViaPostRequest()
    {
        return isset($_POST['_method']) && !strcasecmp($_POST['_method'], 'PUT');
    }

    public function getIsPatchRequest()
    {
        return (isset($_SERVER['REQUEST_METHOD']) && !strcasecmp(
                $_SERVER['REQUEST_METHOD'],
                'PATCH'
            )) || $this->getIsPatchViaPostRequest();
    }

    protected function getIsPatchViaPostRequest()
    {
        return isset($_POST['_method']) && !strcasecmp($_POST['_method'], 'PATCH');
    }

    public function getRestParams()
    {
        if ($this->_restParams === null) {
            $result = array();
            if (function_exists('mb_parse_str')) {
                mb_parse_str($this->getRawBody(), $result);
            } else {
                parse_str($this->getRawBody(), $result);
            }
            $this->_restParams = $result;
        }
        return $this->_restParams;
    }

    public function getRawBody()
    {
        static $rawBody;
        if ($rawBody === null) {
            $rawBody = file_get_contents('php://input');
        }
        return $rawBody;
    }

}