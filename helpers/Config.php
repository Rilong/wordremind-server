<?php
namespace helpers;

class Config {

    private $config_file;
    private $data = null;

    const CONF_DIR = '../config/';

    public function __construct($config_file) {
        $this->config_file = $config_file;
        $this->data = parse_ini_file(self::CONF_DIR . $config_file . '.ini');
        if ($this->data === false)
            exit('Not found configuration file /config/' . $config_file . '.ini');
    }

    public function get($name_opt) {
        if (is_array($this->data) && array_key_exists($name_opt, $this->data)) {
            return $this->data[$name_opt];
        }
        exit('Not found property ' . $name_opt . ' in /config/' . $this->config_file . '.ini');
    }
}