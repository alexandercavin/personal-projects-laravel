<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/company');
});

Route::get('/company', function () {
    $company = DB::table("companies")->get();
    return view('index', [ 'company'=> $company
    ]);
})->name("company.index");

Route::get('/company/employee/add', function () {
    return view("create");
})->name("employee.create");

Route::get("/company/employee/Edit/{id}", function($id) {

    $company = Company::where('employee_id', $id)->first(); //fetch data from database
    return view("edit", ["company" => $company]);
})->name("employee.edit");

Route::post("/company", function (EmployeeRequest $request) {

    Company::create($request->validated());
    return redirect()->route("company.index")->with("success", "Employee Registered Successfully");    
})->name("employee.store");

Route::put("/companies/{id}", function($id, EmployeeRequest $request) {
    $company = Company::where('employee_id', $id)->first(); // Fetch the company by ID

    // Update the company using data from the request
    $company->update($request->validated());

    return redirect()->route("company.index")->with("success", "Company Updated Successfully");  
})->name("employee.update");
// Route::put("/companies/{company}", function(Company $company, EmployeeRequest $request) {
//  // Fetch the company by ID

//     // Update the company using data from the request
//     $company->update($request->validated());

//     return redirect()->route("company.index")->with("success", "Company Updated Successfully");  
// })->name("employee.update");