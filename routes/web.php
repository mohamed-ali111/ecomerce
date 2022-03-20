<?php
//sweeet aleeeeeeeeeerrt
use RealRashid\SweetAlert\Facades\Alert;
///////////////////
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Route::get('/', function () {

    Alert::success('Success Output', 'Success Message');

    return view('welcome');
});


// بعمل هناا روت جديد عشان لما اكتب اسلاش تيست يوديني علي الصفحه دي


// Route::get('/test', function () {
//     return view('test') ;
// });




// بس دي طريقه والطريقه التانيه تحت
// <===============================>

// الطريقه دي بعمل غنكشن في الكونترولر واشاور عليها بواسطه اللينك الي تحت

Auth::routes();

// هنا روت الجروب لجعل الصفح محميه لايسطيع احد الدخول عليها الالما يكون جووووه

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::group(["middleware" => "checkAdmin"], function(){

        Route::get('/show', 'HomeController@show')->name('show');
        Route::get('/write','TestController@write')->name('write');
        // Route::get('/index','TestController@index')->name('index');
        // Route::get('/create','TestController@create')->name('create');

                    //  category and product the page show
        Route::get('/categories/show/{id}','CategoryController@show')->name('categories.show');
        Route::get('/products/show/{id}','ProductController@show')->name('products.show');


        //delete croud for category and products
//        Route::get('/categories/delete/{id}','CategoryController@delete')->name('categories.delete');
        //////////////////////////////form method delete///////////////////////////////////////////////////////
               ///////////this way thate use method delete /////////////////////////////////////////////////
//        Route::delete('/categories/delete/{id}','CategoryController@delete')->name('categories.delete');
                 //////////////////////another method by  input hidden and delete paramter and delete method delete //////////////////////////////////////
        Route::post('/categories/delete','CategoryController@delete')->name('categories.delete');
                   /////product delete with one way
        Route::get('/products/delete/{id}','ProductController@delete')->name('products.delete');

        //////////////////save category(store)/////////////////////
        Route::post('/categories/store','CategoryController@store')->name('categories.store');

        //////////////////create category///////////////////
        Route::get('/categories/create','CategoryController@create')->name('categories.create');
        /////////////////////////////////////////////////////////
        //////////////////save product(save)/////////////////////
      
        ///////////////////////////////////////////////////


        ///  //////////////////edit category///////////////////
        Route::get('/categories/edit/{id}','CategoryController@edit')->name('categories.edit');
        ///////////////////////////////////////////////////
        ///  //////////////////update category///////////////////
        Route::post('/categories/update','CategoryController@update')->name('categories.update');
                ///////////////////////////////////////////////////
        Route::get('/products/edit/{id}','ProductController@edit')->name('products.edit');
        /////////////////////////////update product
        Route::post('/products/update','ProductController@update')->name('products.update');


// <=============================================>
// <=============================================>
// <=============================================>
// shopping cart 
Route::get('/cart', 'ProductController@cart')->name('cart');
Route::get('/add-to-cart/{product}', 'ProductController@addToCart')->name('add-cart');
Route::get('/remove/{id}', 'ProductController@removeFromCart')->name('remove');
Route::get('/change-qty/{product}', "ProductController@changeQty")->name('change_qty');
// <=============================================>
// <=============================================>

// <=============================================>
// <=============================================>

// post table 
/////////////////////////////////////////
Route::get('/post','postController@index')->name('index.post');

Route::get('/posts/showpost/{id}','PostController@show')->name('posts.showpost');
Route::post('/posts/update','PostController@update')->name('posts.update');
Route::get('/posts/edit/{id}','PostController@edit')->name('posts.edit');
Route::get('/posts/delete/{id}','PostController@delete')->name('posts.delete');
Route::get('/posts/createpost','PostController@createpost')->name('posts.createpost');
Route::post('/posts/save','PostController@save')->name('posts.save');

Route::get('/posts/readmore/{id}','PostController@readmore')->name('posts.readmore');

///////////////////////////////////////////////
// comment table 
// Route::get('/posts/readmore','CommentController@index')->name('comment.readmore');

// Route::post('/posts/{post}/comments','CommentController@store')->name('comments.save');
// Route::post('/posts/{post}/comments',[CommentController::class , 'store']);

///////////////////////////////////
////////////////////////////
// checkbox
// Route::post('/comments/save','CommentController@save')->name('comments.save');
// Route::get('/comments/createcomment','CommentController@createcomment')->name('comments.createcomment');

Route::get('/comments/delete/{id}','CommentController@delete')->name('comments.delete');

//////////////////////////////////

Route::post('/posts/{post}/store' , 'CommentController@store');


/////////////////////////////////////////
///////////////////////////////////////
// Route::get('/categories','CategoryController@index')->name('index.category'); 

//////////////////////////////////////
// search /
Route::get('/search','ProductController@search')->name('search');
/////////////////////
// aboutus /
Route::get('/contactus','ContactController@index')->name('contactus');


////////////contact
Route::post('/contactus/store','ContactController@store')->name('contacts.store');
////////////////////////
// about us 
Route::get('/aboutus','TestController@aboutus')->name('aboutus');

##########################################################################
################################checkout #################################
##########################################################################
##########################################################################
Route::get('/checkout/{total}', 'ProductController@checkout')->name('checkout');

Route::post('/charge', 'ProductController@charge')->name('cart.charge');


##########################################################################
##########################################################################
##########################################################################
##########################################################################
#############################one to many relationship ###################################

Route::get('/categories','RelationsController@categories')->name('index.category');


Route::get('/products/{category_id}','RelationsController@products')->name('categories.products');




#############################one to many relationship ###################################


//////////////////////////////
//////////////////////////////
////////////////////////////
//////////////////////////////


    });

    Route::get('/dashbord', 'HomeController@index')->name('dashbord')->middleware('auth');



});

