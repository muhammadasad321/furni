<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CashfreePaymentController;

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

Route::group(['middleware'=>"admin"],function(){


Route::get('admin/dashboard',[BackendController::class, 'dashboard']);
Route::get('admin/orders',[BackendController::class, 'Orders']);
Route::get('admin/orderdetail/{id}',[BackendController::class,'OrderDetail']);
Route::post('admin/orderstatus/{id}', [BackendController::class,'updateOrderStatus']);
Route::get('admin/login',[BackendController::class, 'login']);
Route::post('admin/login',[BackendController::class,'loggedIn']);
Route::get('admin/logout',[BackendController::class,'logout']);

//category routes
Route::get('admin/categories',[BackendController::class,'Category']);
Route::post('admin/categorystore',[BackendController::class,'CategoryStore']);
Route::get('admin/categorylist',[BackendController::class,'CategoryList']);
Route::get('admin/categoryedit/{id}',[BackendController::class,'CategoryEdit']);
Route::post('admin/CategoryUpdate',[BackendController::class,'CategoryUpdate']);
Route::get('admin/categorydelete/{id}',[BackendController::class,'CategoryDelete']);
Route::get('admin/categorystatus/{id}',[BackendController::class,'CategoryStatus']);

// Color and Size Routes
Route::get('admin/color',[BackendController::class,'Color']);
Route::post('admin/colorstore',[BackendController::class,'ColorStore']);
Route::get('admin/colorlist',[BackendController::class,'ColorList']);
Route::get('admin/coloredit/{id}',[BackendController::class,'ColorEdit']);
Route::post('admin/ColorUpdate',[BackendController::class,'ColorUpdate']);
Route::get('admin/colordelete/{id}',[BackendController::class,'ColorDelete']);
Route::get('admin/colorstatus/{id}',[BackendController::class,'ColorStatus']);

Route::get('admin/size',[BackendController::class,'Size']);
Route::post('admin/sizestore',[BackendController::class,'SizeStore']);
Route::get('admin/sizelist',[BackendController::class,'SizeList']);
Route::get('admin/sizeedit/{id}',[BackendController::class,'SizeEdit']);
Route::post('admin/SizeUpdate',[BackendController::class,'SizeUpdate']);
Route::get('admin/sizedelete/{id}',[BackendController::class,'SizeDelete']);
Route::get('admin/sizestatus/{id}',[BackendController::class,'SizeStatus']);
//product routes

Route::get('admin/addproduct',[BackendController::class,'AddProduct']);
Route::get('admin/productlist',[BackendController::class,'ProductList']);
Route::post('admin/productstore',[BackendController::class,'ProductStore'])->name('admin.Productstore');;
Route::get('admin/productedit/{id}',[BackendController::class,'ProductEdit']);
Route::post('admin/productupdate',[BackendController::class,'ProductUpdate']);
Route::get('admin/productdelete/{id}',[BackendController::class,'ProductDelete']);
Route::get('admin/productstatus/{id}',[BackendController::class,'ProductStatus']);

Route::get('admin/imagedelete/{id}', [BackendController::class,'ImageDelete']);
Route::get('admin/users',[BackendController::class,'UserData']);
Route::get('admin/userstatus/{id}', [BackendController::class,'UserStatus']);
Route::get('admin/userdelete/{id}', [BackendController::class,'UserDelete']);

 //contact routes
 Route::get('admin/contact',[BackendController::class,'ContactData']);
 Route::get('admin/contactdelete/{id}',[BackendController::class,'ContactDelete']);

});

 //Frontend Routes
 Route::get('about',[FrontendController::class,'About']);
 Route::get('/',[FrontendController::class,'index']);
Route::get('contact',[FrontendController::class,'Contact']);
Route::post('contact-submit',[FrontendController::class,'ContactForm']);
// Registration routes
Route::get('register',[FrontendController::class,'Register']);
Route::post('register-submit',[FrontendController::class,'RegisterForm']);
Route::get('forgot/',[FrontendController::class,'Forgot']);
Route::post('forgotpassword/',[FrontendController::class,'ForgotPassword']);
Route::get('reset/{token}',[FrontendController::class,'Reset']);
Route::post('reset/{token}',[FrontendController::class,'ResetPassword']);
Route::get('verify-email/',[FrontendController::class,'VerifyEmail']);
Route::post('verifytoken/',[FrontendController::class,'VerifyToken']);

Route::get('login',[FrontendController::class,'Login']);
Route::post('login-submit',[FrontendController::class,'LoggedIn']);
Route::get('logout/',[FrontendController::class,'Logout']);
Route::get('search',[FrontendController::class,'Search']);

Route::get('allproducts/',[FrontendController::class,'AllProducts']);
Route::get('product/{id}/{slug}',[FrontendController::class,'Product']);

Route::get('categories/{id}',[FrontendController::class,'CategoryData']);

//addtocard
Route::get('cart',[FrontendController::class,'Cart']);
Route::post('addtocart',[FrontendController::class,'AddToCart']);
Route::get('remove/{product_id}',[FrontendController::class,'Remove']);
Route::get('account',[FrontendController::class,'Account']);
Route::get('cancelorder/{id}',[FrontendController::class,'OrderCancel']);
Route::get('profile/',[FrontendController::class,'Profile']);
Route::post('profileupdate/',[FrontendController::class,'ProfileUpdate']);

//checkout
Route::get('checkout',[FrontendController::class,'Checkout']);
Route::post('orders',[FrontendController::class,'OrderPlace']);
Route::get('thankyou',[FrontendController::class,'Thankyou']);

//Cashfree payment gateway 
Route::get('paynow/', [CashfreePaymentController::class, 'PayNow'])->name('paynow');

Route::post('store/', [CashfreePaymentController::class, 'StoreOrder']);
Route::any('success/', [CashfreePaymentController::class, 'Success']);
Route::get('downloaded/',[CashfreePaymentController::class,'Downloaded']);

