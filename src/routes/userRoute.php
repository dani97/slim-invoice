<?php
	//require __DIR__.'\..\subdomain\UserDomain.php';

	use App\Subdomain\UserDomain;

	$app->get('/user', function ($request, $response, $args) {
    // Sample log message
		$this->logger->info('all route');
	    $service = new UserDomain();
		return $response->write(json_encode($service->getAllUsers()));
	});

	$app->get('/user/{userId}',function ($request, $response, $args) {
		$service = new UserDomain();
		return $response->write(json_encode($service->getUser($args)));
	});

	$app->post('/user[/]', function ($request, $response, $args) {
		$service = new UserDomain($config);
		$data = $request->getParsedBody();
		return $response->withJSON($service->addUser($data));
	});
?>