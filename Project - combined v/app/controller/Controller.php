<?php

/**
 * Common Controller class that loads Model & View.
 * In this scenario, the controller serves as a router & controller.
 * This controller handles all the requests - we have one controller for all pages. 
 * In another scenario, we might have several controllers, and one FrontController that will serve as a router.
 */
class Controller {

    /**
     * Handles incoming requests. A query parameter 'page' is used to identify 
     * the view that will be rendered and returned back to the client.
     */
    public static function handleRequest() {
        $page = filter_has_var(INPUT_GET, 'page') ? filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING) : NULL;
        $method = filter_has_var(INPUT_GET, 'method') ? filter_input(INPUT_GET, 'method', FILTER_SANITIZE_STRING) : NULL;
        $param = filter_has_var(INPUT_GET, 'param') ? filter_input(INPUT_GET, 'param', FILTER_SANITIZE_NUMBER_INT) : NULL;

        $data = NULL;
        if ($page == NULL) {
            $view = new View('app/view/pages/welcome.php');
        } else {
            $view = new View('app/view/pages/' . $page . '.php');
            $model = new $page(); //For example: Person model
            if ($method !== NULL) {
                $data = $model->$method($param); //For example: $model->getAll();
            }
        }
        $view->render($data);
    }

}
