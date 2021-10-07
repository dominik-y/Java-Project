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
        session_start();

        $page = filter_has_var(INPUT_GET, 'page') ? filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING) : NULL;
        $method = filter_has_var(INPUT_GET, 'method') ? filter_input(INPUT_GET, 'method', FILTER_SANITIZE_STRING) : NULL;
        $param = filter_has_var(INPUT_GET, 'param') ? filter_input(INPUT_GET, 'param', FILTER_SANITIZE_NUMBER_INT) : NULL;

        $data = null;
        if ($page == NULL) {
            $view = new View('app/view/pages/login.php');
            $view->render($data);
            //I have set the else if to true for testing purposes
        } else if (true/*$_SESSION['loggedIn']*/) { // null is also interpreted as a falsy value
            $view = new View('app/view/pages/' . $page . '.php');
            $model = new $page(); //For example: Person model
            if ($method !== NULL) {
                $data = $model->$method($param); //For example: $model->getAll();
            }
            $view->render($data);
        } else { //if the user is not logged in and a POST request is being sent
            $param1 = filter_has_var(INPUT_POST, 'uname') ? filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_STRING) : NULL;
            $param2 = filter_has_var(INPUT_POST, 'upassword') ? filter_input(INPUT_POST, 'upassword', FILTER_SANITIZE_STRING) : NULL;

            $user = new Login();
            if ($user->isAuthenticated($param1, $param2)) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['urole'] = $user->urole;
                header('Location: index.php?page=person&method=getAll');
            } else {
                $_SESSION['loggedIn'] = false;
                header('Location: index.php');
            }
        }
        
    }

}
// {
//     $view = new View('app/view/pages/' . $page . '.php');
//     $model = new $page(); //For example: Person model
//     if ($method !== NULL) {
//         $data = $model->$method($param); //For example: $model->getAll();
//     }
//     $view->render($data);