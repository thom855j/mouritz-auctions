<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 */
class Controller {

    protected function loadModel($model, $params = null) {
        require_once MODELS . $model . '.php';
        return new $model($params);
    }

    public function template($template) {
        require_once TEMPLATES . $template . '.php';
    }

    public function error($error) {
        require_once ERROR . $error . '.php';
    }

    public function render($view, $data = array()) {
        require_once VIEWS . $view . '.php';
    }

    public function view($view, $data = array(), $noTemplates = false) {
        if ($noTemplates == true) {
            require_once VIEWS . $view . '.php';
        } else {
            require_once(TEMPLATES_HEADER);
            require_once(VIEWS . $view . '.php');
            require_once(TEMPLATES_FOOTER);
        }
        if (DEBUG == true) {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
        }
    }

}
