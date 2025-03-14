<?php
namespace App\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Assignment;
use Illuminate\Database\Capsule\Manager as DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EmployeeController
{
    public function addEmployee($request, $response) {
        $directory = __DIR__ . '/../assets/img';

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
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

        $assignment = Assignment::create([
            'id_phong_ban' => $body['department'],
            'id_nhan_vien' => $employee->id_nhan_vien,
            'chuc_vu' => $body['position']
        ]);
    
        $response->getBody()->write(json_encode($employee));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
}