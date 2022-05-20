<?php


namespace Framework\Routing;

use Throwable;

class Router
{
    protected array $routes = [];

    /**
     * Retorna a rota adicionada ao array de rotas.
     * @return Route
     */
    public function add(): Route
    {
        $route = $this->routes[] = new Route($method, $path, $handler);
        return $route;
    }

    public function dispatch()
    {
        $paths = $this->paths();

        $requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $requestPath = $_SERVER['REQUEST_URI'] ?? '/';

        /**
         * aqui procuramos a primeira rota que corresponder 
         * ao path e o método da requisição
         */
        $matching = $this->match($requestMethod, $requestPath);

        if ($matching) {
            try {
                return $matching->dispatch();
            } catch (Throwable $e) {
                return $this->dispatchError();
            }
            
            /**
             * se o caminho for definido para um método diferente
             * podemos mostrar uma página de erro única para ele
             */
            if (in_array($requestPath, $paths))
                return $this->dispatchNotAllowed();
        }
    }
}
