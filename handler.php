<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'index.php';
        break;
    case '/hola':
        require 'hola.php';
        break;
    case '/buscar':
        require 'buscar.php';
        break;
        case '/proceso':
            require 'proceso.php';
            break;
    default:
        http_response_code(404);
        exit('Not Found');
}
?>