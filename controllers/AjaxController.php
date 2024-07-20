<?php
declare(strict_types=1);

class AjaxController
{
    public function ajax()
    {
        echo HOST;
        $view = new View('ajax');
        $view->render(array());
    }
    public function testAjax(){
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ){

            $this->response(HTTP_OK, $_POST['nickname']);

        } else {
            $response = [
                'success' => 'false',
                'message' => 'Test message'
            ];
            echo json_encode($response);
        }
    }

     function response($response_code, $message)
    {
        header('Content-type: application/json');
        http_response_code(intval($response_code));
        $message = [
            'response_code' =>  $response_code,
            'response' => $message
        ];
        echo json_encode($message);
    }
}

