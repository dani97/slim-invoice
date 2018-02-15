<?php
	$app->add( function ($request, $response, $next) {
	$data = $request->getQueryParams();
	if(isset($data['user-id']) && isset($data['token']) && strcmp(md5($data['user-id']),$data['token'])==0) {
		
		$response = $next($request, $response);
		$response = $response->withHeader('Content-type', 'application/json');
		return $response;
	} else {
		return $response->withStatus(401);
	}

});
?>