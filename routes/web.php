
<?php


use Carbon\Carbon;

use App\SaleProduct;

use App\AddToCart;

use App\CategoryType;

use Gloudemans\Shoppingcart\Facades\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Start For Backend

//Permission

Route::resource('permissions', 'PermissionController');

Route::resource('roles', 'RoleController');

Route::resource('roleusers', 'RoleUserController');

// User

Route::resource('/users', 'UserController');
Route::get('/users-data', 'UserController@data')->name('users.data');

// Admin Dashboard

Route::get('/dashboard', 'AdminController@index');

Auth::routes();

//Phone Brand

Route::resource('/phonebrands', 'PhoneBrandController');
Route::get('phonebrands-data', 'PhoneBrandController@data')->name('phonebrands.data');

// Category Type

Route::resource('/categorytypes', 'CategoryTypeController');
Route::get('/categorytypes-data', 'CategoryTypeController@data')->name('categorytypes.data');

//Category

Route::resource('/categories', 'CategoryController');
Route::get('categories-data', 'CategoryController@data')->name('categories.data');

//Phone Detail

Route::resource('/phonedetails', 'PhoneDetailController');
Route::get('/phonedetails/{id}/edit', 'PhoneDetailController@edit');
Route::post('/phonedetails/{id}/edit', 'PhoneDetailController@update');
Route::get('phonedetails-data', 'PhoneDetailController@data')->name('phonedetails.data');
Route::get('/phonedetails/getmodel/{brand}', 'PhoneDetailController@getPhoneBrands');

//Feature detail

Route::resource('/featuredetails', 'FeaturedDetailController');
Route::get('featuredetails-data', 'FeaturedDetailController@data')
->name('featuredetails.data');

//Phone Model

Route::resource('/phonemodels', 'PhoneModelController');
Route::get('phonemodels-data', 'PhoneModelController@data')->name('phonemodels.data');

//Service Product

Route::resource('serviceproducts', 'ServiceProductController');
Route::get('serviceproducts-data', 'ServiceProductController@data')->name('serviceproducts.data');
Route::get('openning_cost/{model}/{color}', 'CostController@addOpenningCost');

//Phone Service

Route::resource('/phoneservices', 'PhoneServiceController');
Route::get('/phoneservices/{id}/print', 'PhoneServiceController@print');
Route::get('/phoneservices/{id}/finish', 'PhoneServiceController@finish');
Route::get('phoneservices-data', 'PhoneServiceController@data')->name('phoneservices.data');
Route::get('phoneservices/getmodel/{id}', 'PhoneServiceController@getPhoneModels');

//Done Service

Route::get('/doneservices', 'CustomerServiceController@index');
Route::get('/doneservices-data', 'CustomerServiceController@data')->name('doneservices.data');

//Cost

Route::resource('costs', 'CostController');
Route::get('costs-data', 'CostController@data')->name('costs.data');
Route::get('/costs/getmodel/{brand}', 'CostController@getModel');

Route::get('serviceprofit-for/{my}', 'CostController@getProfitForService');
Route::get('saleprofit-for/{my}', 'CostController@getProfitForSale');
Route::get('totalprofit-for/{my}', 'CostController@getTotalProfit');

Route::get('/list-by-year', 'CostController@showIndexYear');
Route::get('/list-by-year-data', 'CostController@data');

Route::get('serviceprofit-for-year/{my}', 'CostController@getServiceProfitByYear');
Route::get('saleprofit-for-year/{my}', 'CostController@getSaleProfitByYear');
Route::get('totalprofit-for-year/{my}', 'CostController@getTotalProfitByYear');
Route::get('/costs/getcategory/{categorytype}', 'CostController@getCategory');

// Cost for Service

Route::get('servicecosts', 'CostController@servicecostIndex')->name('servicecosts');
Route::get('servicecosts-data', 'CostController@servicecost')->name('servicecosts.data');




// Sale Product

Route::get('saleproducts', 'SaleProductController@index');
Route::get('saleproducts-data', 'SaleProductController@data')->name('saleproducts.data');
Route::get('add_openning_cost/{model}/{color}', 'SaleProductController@addOpenningCost');

// Cost for Sale

Route::get('salecosts', 'CostController@salecostIndex')->name('salecosts');
Route::get('salecosts-data', 'CostController@salecost')->name('salecosts.data');

// Other Cost

Route::resource('othercosts', 'OtherCostController');
Route::get('othercosts-data', 'OtherCostController@data')->name('othercosts.data');


//Department

Route::resource('departments', 'DepartmentController');
Route::get('departments-data', 'DepartmentController@data')->name('departments.data');


//Employee

Route::resource('employees', 'EmployeeController');
Route::get('employee_list', 'EmployeeController@showEmpList');
Route::get('employees-data', 'EmployeeController@data')->name('employees.data');
Route::get('absent/{id}', 'AbsentController@store');

//Status

Route::resource('status', 'StatusController');
Route::get('status-data', 'StatusController@data')->name('status.data');

//Salary

Route::resource('salaries', 'SalaryController');
Route::get('salaries-data', 'SalaryController@data')->name('salaries.data');

//Employee Salary

Route::resource('employeesalaries', 'EmployeeSalaryController');
Route::get('salary/store', 'EmployeeSalaryController@store');
Route::get('employeesalaries-data', 'EmployeeSalaryController@data')->name('employeesalaries.data');
Route::get('/employeesalaries-for/{my}', 'EmployeeSalaryController@show');

//Search

Route::get('/search', 'SearchController@index');

// End for backend








//Start For Front End

// Logout

Route::post('login', 'Auth\LoginController@login');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

//Navigation

Route::get('categorytype/{name}', 'CategoryTypeController@show');

//Datas of Category and Brand Pair

Route::get('show/{category}/{name}', 'CategoryTypeController@showData');

// Data of each price

Route::get('show/{category}/price/{price}', 'CategoryTypeController@showDataAsPrice');

// Add to cart

Route::resource('/cart', 'CartController');
Route::get('/checkout', 'CartController@doCheckOut');
Route::get('/checkout/check-out', function() {
	$carts = Cart::content();
	foreach($carts as $cart) {
		$id = $cart->id;
		$name = $cart->name;
		$qty = $cart->qty;
		$sale_qty = SaleProduct::where('id', $id)->value('quantity');
		if($qty > $sale_qty) {
			$text = $name . " Available quantity is " . $sale_qty;
		}
		else {
			$text = "Success!";
		}
		return response()->json($text);
	}

});
Route::resource('/salelists', 'DoneSaleController');
Route::get('/salelists-data', 'DoneSaleController@data')->name('salelists.data');

// Wishlist
Route::resource('/wishlist', 'WishlistController');
Route::get('/wishlist-product/{id}', 'WishlistController@edit');
Route::get('/wishlist/checkout', 'WishlistController@buyFromWishlist');

//About Page

Route::get('about', function() {
	return view('about');
})->name('about');

//Contact Page;

Route::get('contact', function() {
	return view('contact');
})->name('contact');

//Detail Page

Route::get('detail/{id}', 'PhoneDetailController@show');


//Service Model

Route::resource('servicemodels', 'ServiceModelController');
Route::get('servicemodels-data', 'ServiceModelController@data')->name('servicemodels.data');


Route::get('btn/show', function() {
	$date = Carbon::now();
	$day = Carbon::parse($date)->format('d');
	return response()->json($day);
});

// End for frontend
