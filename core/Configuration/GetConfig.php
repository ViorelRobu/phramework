<?php

namespace Phramework\Core\Configuration;

class GetConfig
{
    public $config = '';

    /**
     * GetConfig constructor.
     */
    public function __construct()
    {
        $this->readAndParse();
    }

    /**
    * Read the .config file
    *
    * @return void
    */
    protected function readAndParse()
    {
        $this->config = $this->interpret(file_get_contents('../.config'));
    }

    /**
     * Interpret the .config data and parse it so that it could be used later
     * 
     * @return array
     */
    protected function interpret($string)
    {
        $array = [];
        // explode string on EOL
        $data = explode(PHP_EOL, trim($string));
        // remove empty lines (string length less than 3)
        foreach ($data as $key => $value) {
            if (strlen($value) < 3) {
                unset($data[$key]);
            }
        }
        // parse into key value pairs array
        foreach ($data as $value) {
            $val = explode('=', $value);
            $array[$val[0]] = trim($val[1]);
        }
        return $array;
    }
}