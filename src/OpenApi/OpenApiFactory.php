<?php

namespace App\OpenApi;

use ArrayObject;
use ApiPlatform\Core\OpenApi\Model;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\Model\Operation;
use ApiPlatform\Core\OpenApi\Model\PathItem;

class OpenApiFactory implements OpenApiFactoryInterface
{
    private $decorated;

    public function __construct(OpenApiFactoryInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context);



        $schemas = $openApi->getComponents()->getSecuritySchemes();

        $schemas["bearerAuth"] = new ArrayObject([
            "type" => "http",
            "scheme" => "bearer",
            "bearerFormat" => "JWT"
        ]);

        //$openApi = $openApi->withSecurity(['bearerAuth' => []]);

        //Desactivations des parametres lors de la methode get avec owner 

        $ownerOperation = $openApi->getPaths()->getPath("/api/owner")->getGet()->withParameters([]);
        $ownerPathItem = $openApi->getPaths()->getPath("/api/owner")->withGet($ownerOperation);
        $openApi->getPaths()->addPath("/api/owner", $ownerPathItem);


        return $openApi;
    }
}
