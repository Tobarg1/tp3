<?php
class AuthMiddleware {
    public function run($request, $response) {
        $headers = getallheaders();

        
        $expectedToken = 'token123';

        
        if (!isset($headers['Authorization']) || $headers['Authorization'] !== $expectedToken) {
            header('HTTP/1.1 401 Unauthorized');
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }
    }
}
