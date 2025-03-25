<?php
namespace App\Controllers;

use App\Models\Salary;
// use Illuminate\Database\Capsule\Manager as DB;
// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;

class SalaryController
{
    public function getTotalMonthSalary($request, $response)
    {
        $month = $request->getQueryParams()['month'] ?? null;
    
        if (!$month) {
            $error = ['error' => 'Thiếu tham số tháng'];
            $response->getBody()->write(json_encode($error));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }
    
        $date = \Carbon\Carbon::parse($month);
        $year = $date->year;
        $month = $date->month;
    
        $totalSalary = Salary::whereYear('thang_nhan_luong', $year)
                             ->whereMonth('thang_nhan_luong', $month)
                             ->sum('so_tien_luong');
    
        $data = [
            'thang_nhan_luong' => $date->format('m-Y'),
            'tong_luong' => $totalSalary
        ];

        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}