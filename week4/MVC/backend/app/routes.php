<?php

declare(strict_types=1);

use App\Models\Employee;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->post('/add-employees', function ($request, $response) {
        $directory = __DIR__ . '/../assets/img';

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true); // Tạo thư mục với quyền ghi
        }

        $uploadedFiles = $request->getUploadedFiles();
        $avatarPath = null;

        if (!empty($uploadedFiles['avatar'])) {
            $uploadedFile = $uploadedFiles['avatar'];
            if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
                $filename = uniqid() . "-" . $uploadedFile->getClientFilename();
                $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
                $avatarPath = '../assets/img/' . $filename;
            }
        }

        $body = $request->getParsedBody();
    
        $employee = Employee::create([
            'ho_ten' => $body['name'],
            'ngay_sinh' => $body['dateOfBirth'],
            'gioi_tinh' => $body['gender'],
            'so_dien_thoai' => $body['phoneNumber'],
            'email' => $body['email'],
            'dia_chi' => $body['address'],
            'avatar' => $avatarPath
        ]);
    
        $response->getBody()->write(json_encode($employee));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
