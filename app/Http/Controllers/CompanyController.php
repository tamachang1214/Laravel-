<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('company.index', compact('companies'));
    }

    public function edit($id)
    {
        $company = Company::find($id);

        // ★ 見つからない場合の対策（優しいエラーハンドリング）
        if (!$company) {
            abort(404, 'Company not found');
        }
        // ★ 編集画面へ表示するために $company を渡す
        return view('company.edit', compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
        // ★ 1件取得（更新する本）
        $company = Company::find($id);

        if (!$company) {
            abort(404, 'Company not found');
        }

        // ★ 入力値をモデルに反映
        // $request はフォームの入力データが全部入ったオブジェクト
        $company->name = $request->name;
        $company->established_year = $request->established_year;
        $company->address = $request->address;
        $company->phone_number = $request->phone_number;
        $company->website = $request->website;

        // ★ DB に保存（UPDATE）
        $company->save();

        // ★ 更新後に一覧へ戻る
        return redirect('/company');
    }

    public function destroy($id)
    {
        $company = Company::find($id);

        if (!$company) {
            abort(404, 'Company not found');
        }

        $company->delete();  // ← これだけで SQL DELETE が発行される

        return redirect('/company');
    }

    public function create()
    {
        // 空のモデルをビューに渡す
        $company = new Company();

        return view('company.create', compact('company'));
    }

    public function store(CompanyRequest $request)
    {
        // 新しいCompanyを作成
        $company = new Company();
        $company->name = $request->name;
        $company->established_year = $request->established_year;
        $company->address = $request->address;
        $company->phone_number = $request->phone_number;
        $company->website = $request->website;

        $company->save(); // ← DBにINSERT

        return redirect('/company');
    }
}
