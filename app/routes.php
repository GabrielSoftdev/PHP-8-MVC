<?

use Framework\Routing\Router;

/**
 * Este arquivo retorna uma função anonima que pode ser guardada dentro de uma variável 
 * através de um required.
 */

return function (Router $router) {
    $router->add('GET', '/', fn () => 'Hello World!');
    $router->add('GET', '/users', fn () => $router->redirect('/'));
    $router->add('GET', '/has-server-error', fn () => throw new Exception());
    $router->add('GET', '/has-validation-error', fn () => $router->dispatchNotAllowed());
};
