<?php

declare(strict_types=1);

use App\Models\Employee;
use App\Models\Department;
use App\Models\Assignment;
use App\Controllers\EmployeeController;
use App\Controllers\AssignmentController;
use App\Controllers\SalaryController;
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

    $app->post('/add-employees', [EmployeeController::class, 'addEmployee']);

    $app->get('/query', function ($request, $response) {
        try {
            $queryParams = $request->getQueryParams();
            $type = isset($queryParams['type']) ? (int)$queryParams['type'] : 0;
    
            switch ($type) {
                case 1:
                    return (new AssignmentController())->getAssignment($request, $response);
                
                case 2:
                    return (new SalaryController())->getTotalMonthSalary($request, $response);
    
                case 3:
                    return (new AssignmentController())->getDepartmentWithEmployee($request, $response);
    
                default:
                    $data = ['error' => 'Type không hợp lệ'];
                    break;
            }
    
            // Trả về JSON response
            $response->getBody()->write(json_encode($data));
            return $response->withHeader('Content-Type', 'application/json');
        } catch (Exception $e) {
            // Bắt lỗi và trả về thông báo lỗi
            $error = ['error' => $e->getMessage()];
            $response->getBody()->write(json_encode($error));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
    });

    $app->get('/employee-list', function ($request, $response) {
        return (new EmployeeController())->getEmployeeList($request,$response);
    });

    $app->delete('/delete-employee/{id}', EmployeeController::class . ':destroy');

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
