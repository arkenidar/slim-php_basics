<?php

/*
Copyright 2017 Dario Cangialosi

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

// /hello/
// /hello/name
$app->get('/hello/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/hello/' route");

    // Render index view
    // You could also use Twig for templates as seen at:
    // https://scotch.io/tutorials/getting-started-with-slim-3-a-php-microframework
    // $args2 = $request->getAttributes();
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/route_hello', function (Request $request, Response $response, array $args) {
    // Render view
    echo 'hello';
});

// default http://localhost:8080/route_param
// value http://localhost:8080/route_param?param=value
$app->get('/route_param',  function (Request $request) {

    $paramValue = $request->getQueryParam('param', 'default');

    $escapedForSecurity = htmlspecialchars($paramValue);
    echo "Hello1 $escapedForSecurity";
});

// default http://localhost:8080/route_param2/
// value http://localhost:8080/route_param2/value
$app->get('/route_param2/[{param}]',
    function (Request $request, Response $response, $args) {

    $paramValue = $request->getAttribute('param', 'default');
    //$paramValue = @$args['param']!=''?$args['param']:'default';
    

    $escapedForSecurity = htmlspecialchars($paramValue);
    $output = "Hello2 $escapedForSecurity";
    //echo $output;
    $response->getBody()->write($output);
    return $response;
});


