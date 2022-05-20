<?

namespace Framework\Routing;

/**
 * Responsável pela estrutura das rotas da aplicação.
 * 
 * @package Framework\Routing
 */

class Route
{
    protected string $method;
    protected string $path;
    protected $handler;

    public function __construct(string $method, string $path, callable $handler)
    {
        $this->method = $method;
        $this->path = $path;
        $this->handler = $handler;
    }
}
