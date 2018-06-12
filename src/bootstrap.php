<?php

use App\Controllers\UserController;
use App\Listeners\ApiResponseListener;
use Doctrine\Common\Cache\ApcuCache;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$app = new Silex\Application();

// Register Doctrie
$app->register(new Silex\Provider\DoctrineServiceProvider(), [
    'db.options' => [
        'driver' => getenv('DB_DRIVER'),
        'dbname' => getenv('DB_NAME'),
        'host' => getenv('DB_HOST'),
        'user' => getenv('DB_USER'),
        'password' => getenv('DB_PASS'),
        'port' => getenv('DB_PORT'),
    ],
]);

$app->register(new Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider, [
    'orm.proxies_dir' => __DIR__ . '/tmp/proxy',
    'orm.em.options' => [
        'mappings' => [
            [
                'type' => 'annotation',
                'namespace' => 'App\Entities',
                'path' => __DIR__ . '/Entities',
            ],
        ],
    ],
]);

// Register ServiceController
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

// Define UserController
$app[UserController::class] = function ($app) {
    /** @var \Doctrine\ORM\EntityManagerInterface $entityManager */
    $entityManager = $app['orm.em'];
    $userRepository = $entityManager->getRepository(App\Entities\User::class);

    $request = $app['request_stack']->getCurrentRequest();

    return new UserController($userRepository, $request);
};

// Add routes
$app->get("/api/user", UserController::class . ":fetchAllAction");

// Display errors as response (for dev)
$app->error(function (\Exception $e, Request $request, $code) {
    return $e;
});

// Add response interceptor
/** @var EventDispatcherInterface $dispatcher */
$dispatcher = $app['dispatcher'];
$dispatcher->addSubscriber(new ApiResponseListener);

$app->run();
