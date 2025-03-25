<?php
namespace App\Controllers;

use App\Models\Employee;
// use App\Models\Department;
use App\Models\Assignment;
// use Illuminate\Database\Capsule\Manager as DB;
// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;

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

    public function getEmployeeById($request, $response, array $args) {
        try {
            $id = $args['id'];
    
            // Lấy thông tin nhân viên và join với bảng phân công
            $employee = Employee::leftJoin('nhan_vien_phong_ban', 'nhan_vien.id_nhan_vien', '=', 'nhan_vien_phong_ban.id_nhan_vien')
                ->select('nhan_vien.*', 'nhan_vien_phong_ban.id_phong_ban', 'nhan_vien_phong_ban.chuc_vu')
                ->where('nhan_vien.id_nhan_vien', $id)
                ->first();
    
            if (!$employee) {
                $error = ['error' => 'Nhân viên không tồn tại'];
                $response->getBody()->write(json_encode($error));
                return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
            }
    
            $response->getBody()->write(json_encode($employee));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
        } catch (\Exception $e) {
            $error = ['error' => 'Lỗi server: ' . $e->getMessage()];
            $response->getBody()->write(json_encode($error));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
    }
    

    public function getEmployeeList($request, $response) {
        $employee = Employee::all();

        $data = $employee->map(function ($employee) {
            return [
                'id_nhan_vien' => $employee->id_nhan_vien,
                'ho_ten' => $employee->ho_ten,
                'ngay_sinh' => $employee->ngay_sinh,
                'gioi_tinh' => $employee->gioi_tinh,
                'so_dien_thoai' => $employee->so_dien_thoai,
                'email' => $employee->email,
                'dia_chi' => $employee->dia_chi,
                'avatar' => $employee->avatar
            ];
        });
    
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }

    public function updateEmployee($request, $response, array $args) {
        try {
            $id = $args['id'];
            $data = $request->getParsedBody();

            $employee = Employee::find($id);
            $assignment = Assignment::where('id_nhan_vien', $id)->first();

            if (!$employee) {
                return $response->withJson(['error' => 'Nhân viên không tồn tại'], 404);
            }

            $employee->ho_ten = $data['name'] ?? $employee->ho_ten;
            $employee->ngay_sinh = $data['dateOfBirth'] ?? $employee->ngay_sinh;
            $employee->gioi_tinh = $data['gender'] ?? $employee->gioi_tinh;
            $employee->so_dien_thoai = $data['phoneNumber'] ?? $employee->so_dien_thoai;
            $employee->email = $data['email'] ?? $employee->email;
            $employee->dia_chi = $data['address'] ?? $employee->dia_chi;
            $employee->save();

            $assignment->id_phong_ban = $data['id_phong_ban'] ?? $assignment->id_phong_ban;
            $assignment->id_nhan_vien = $data['id_nhan_vien'] ?? $assignment->id_nhan_vien;
            $assignment->chuc_vu = $data['chuc_vu'] ?? $assignment->chuc_vu;
            $assignment->save();

            $response->getBody()->write(json_encode(['message' => 'Cập nhật thành công']));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
        } catch (\Exception $e) {
            $error = ['error' => 'Lỗi server: ' . $e->getMessage()];
            $response->getBody()->write(json_encode($error));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
    }

    public function destroy($request, $response, $args) {
        try {
            $id = $request->getAttribute('id');
            $employee = Employee::find($id);
    
            if (!$employee) {
                $error = ['error' => 'Nhân viên không tồn tại'];
                return $this->jsonResponse($response, $error, 404);
            }
    
            $employee->delete();
    
            $message = ['message' => 'Xóa nhân viên thành công'];
            return $this->jsonResponse($response, $message, 200);
        } catch (\Exception $e) {
            $error = ['error' => 'Lỗi khi xóa nhân viên: ' . $e->getMessage()];
            return $this->jsonResponse($response, $error, 500);
        }
    }  
    
    private function jsonResponse($response, $data, $statusCode) {
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json')->withStatus($statusCode);
    }
    
}