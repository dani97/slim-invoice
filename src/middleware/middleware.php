<?php
	use Psr\Http\Message\StreamInterface;
	$app->add( function ($request, $response, $next) {
	$data = $request->getQueryParams();
	if(isset($data['user-id']) && isset($data['token']) && strcmp(md5($data['user-id']),$data['token'])==0) {
		
		$response = $next($request, $response);
		if($response->getStatusCode()!=200){
			$body = new \Slim\Http\Body(fopen('php://temp', 'r+'));
			$response = $response->withBody($body);
			$response->withJSON(array("status" => "you are not allowed"));
		}
		$response = $response->withHeader('Content-type', 'application/json');
		return $response;
	} else {
		return $response->withStatus(401);
	}

});
?>