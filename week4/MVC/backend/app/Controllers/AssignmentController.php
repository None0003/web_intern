<?php
namespace App\Controllers;

// use App\Models\Employee;
use App\Models\Assignment;
// use Illuminate\Database\Capsule\Manager as DB;
// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;

class AssignmentController
{
    public function getAssignment($request, $response) 
    {
        try {
            $assignments = Assignment::with(['employee:id_nhan_vien,ho_ten', 'department:id_phong_ban,ten_phong_ban'])
                ->select('id_nhan_vien', 'id_phong_ban', 'chuc_vu')
                ->get();

            $data = $assignments->map(function ($assignment) {
                return [
                    'id_nhan_vien' => $assignment->id_nhan_vien,
                    'ho_ten' => ($assignment->employee)->ho_ten,
                    'ten_phong_ban' => ($assignment->department)->ten_phong_ban,
                    'chuc_vu' => $assignment->chuc_vu
                ];
            });
        
            $response->getBody()->write(json_encode($data));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
        } catch (\Exception $e) {
            $error = ['error' => $e->getMessage()];
            $response->getBody()->write(json_encode($error));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
    }

    public function getDepartmentWithEmployee($request, $response)
    {
        try {
            $assignments = Assignment::with(['employee:id_nhan_vien,ho_ten', 'department:id_phong_ban,ten_phong_ban'])
                ->select('id_nhan_vien', 'id_phong_ban', 'chuc_vu')
                ->get();

            $data = $assignments->map(function ($assignment) {
                return [
                    'id_phong_ban' => $assignment->id_phong_ban,
                    'ten_phong_ban' => ($assignment->department)->ten_phong_ban,
                    'nhan_vien' => [
                        'ho_ten' => ($assignment->employee)->ho_ten,
                        'chuc_vu' => $assignment->chuc_vu
                    ]
                ];
            });

            $response->getBody()->write(json_encode($data));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
        } catch (\Exception $e) {
            $error = ['error' => $e->getMessage()];
            $response->getBody()->write(json_encode($error));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
    }
}