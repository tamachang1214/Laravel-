<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company')->get();

        return view('employee.index', compact('employees'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);

        // ★ 見つからない場合の対策（優しいエラーハンドリング）
        if (!$employee) {
            abort(404, 'Employee not found');
        }
        // ★ 編集画面へ表示するために $employee を渡す
        return view('employee.edit', compact('employee'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        // ★ 1件取得（更新する本）
        $employee = Employee::find($id);
        if (!$employee) {
            abort(404, 'Employee not found');
        }

        // 年月日を統合（YYYY-MM-DD 形式）
        $birth = sprintf(
            '%04d-%02d-%02d',
            $request->birth_year,
            $request->birth_month,
            $request->birth_day
        );

        // ★ 入力値をモデルに反映
        // $request はフォームの入力データが全部入ったオブジェクト
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->birth = $birth;
        $employee->email = $request->email;
        $employee->department = $request->department;

        // ★ DB に保存（UPDATE）
        $employee->save();

        // ★ 更新後に一覧へ戻る
        return redirect('/employee');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            abort(404, 'Employee not found');
        }

        $employee->delete();  // ← これだけで SQL DELETE が発行される

        return redirect('/employee');
    }

    public function create(Request $request)
    {
        $employee = new Employee();

        // URLに company_id があればセット
        if ($request->has('company_id')) {
            $employee->company_id = $request->company_id;
        }

        return view('employee.create', compact('employee'));
    }


    public function store(EmployeeRequest $request)
    {
        // 生年月日を組み立てる
        $birth = sprintf(
            '%04d-%02d-%02d',
            $request->birth_year,
            $request->birth_month,
            $request->birth_day
        );

        // 新しいEmployeeを作成
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->birth = $birth;
        $employee->email = $request->email;
        $employee->department = $request->department;

        $employee->save(); // ← DBにINSERT

        return redirect('/employee');
    }

    public function indexByCompany($company_id)
    {
        // 社員一覧を取得
        $employees = Employee::with('company')
            ->where('company_id', $company_id)
            ->get();

        // 既存の employee.index
        return view('employee.index', compact('employees'));
    }
}
