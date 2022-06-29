<?php

use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Video;

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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/{id}/{name}',function ($id, $name) {
    return 'Hi my id and name are '.$name . ' ' . $id;
});

Route::get('/admin/posts/example', array('as' => 'ege.com', function () {
    $url = route('ege.com');

    return 'url: '. $url;
}));*/

//Route::get('/checking/{id}', '\App\Http\Controllers\PostsController@index');

//Route::resource('/posts', '\App\Http\Controllers\PostsController');

//Route::get('/posts/{id}/{name}/{password}', '\App\Http\Controllers\PostsController@show_posts');

//Route::get('/contact', '\App\Http\Controllers\PostsController@contact');

/*Route::get('/insert', '\App\Http\Controllers\PostsController@insert_posts');
Route::get('/read', '\App\Http\Controllers\PostsController@read_posts');
Route::get('/update', '\App\Http\Controllers\PostsController@update_posts');
Route::get('/delete', '\App\Http\Controllers\PostsController@delete_posts');*/

//Route::get('/readAll', function () {
//    $posts = Post::all();
//
//    return $posts;
//});
//
Route::get('/read', function () {
    $post = Post::find(5);

    return $post->title;
});
//
//Route::get('/findwhere', function () {
//    $post = Post::where('brand', 'Nike')->orderByDesc('id')->take(20)->get();
//
//    return $post;
//});
//
//Route::get('/findmore', function () {
//    $post = Post::findOrFail(2);
//
//    return $post;
//});
//
//Route::get('/basicinsert', function () {
//    $newPost = new Post;
//
//    $newPost->title = 'AI Programming';
//    $newPost->brand = 'OI\'Reilly';
//
//    $newPost->save();
//});
//
Route::get('/basicupdate', function () {
    $newPost = Post::find(1);

    $newPost->title = 'Machine Learning';
    $newPost->brand = 'OI\'Reilly';

    $newPost->save();
});
//
Route::get('/create', function () {
    Post::create(['id'=> '7', 'title'=>'IOT', 'brand'=>'Harvard Uni']);
});

//Route::get('/update', function () {
//    Post::where('id', 1)->where('is_admin', 0)->update(['title'=> 'BIOLOGY POST', 'brand'=>'washington post']);
//});
//
Route::get('/delete1', function () {
    $post = Post::find(5);

    $post->delete();
});
//
//Route::get('/delete2', function () {
//    Post::destroy([1,3]); // Eger primary key'ler biliniyorsa direkt olarak destroy kullanilabilir
//});
//
//Route::get('/getSoftDeletedItem', function () {
//    //$post = Post::withTrashed()->where('id', 4)->get();
//    $post = Post::onlyTrashed()->where('id', 4)->get();
//    //$post = Post::withTrashed()->where('id', 4)->get();
//
//    return $post;
//});
//
//Route::get('/restoreDeletedItem', function () {
//    Post::onlyTrashed()->where('is_admin', 0)->restore();
//});
//
//Route::get('/forceDeleteItem', function () {
//    Post::onlyTrashed()->where('id', 5)->forceDelete();
//});
//
//
///*
//|--------------------------------------------------------------------------
//| ELEQUENT RELATIONSHIPS
//|--------------------------------------------------------------------------
//*/
//
///* ONE TO ONE RELATIONSHIP */
//
///*Route::get('/user/{id}/post', function($id) {
//   return User::find($id)->post->content;
//});
//
//Route::get('/post/{id}/user', function($id) {
//    return Post::find($id)->user->name;
//});*/
//
///* ONE TO ONE RELATIONSHIP */
//
///* ONE TO MANY RELATIONSHIP */
//Route::get('/user/{id}/posts', function ($id) {
//    $user = User::find($id);
//
//    foreach ($user->posts as $post) {
//        echo $post->title .'<br>';
//    }
//});
///* ONE TO MANY RELATIONSHIP */
//
///* MANY TO MANY RELATIONSHIP */
//Route::get('/user/{id}/roles', function ($id) {
//    //$user = User::find($id);
//    $user = User::find($id)->roles()->orderBy('name')->get();
//
//    return $user;
//
//    foreach ($user->roles as $role) {
//        echo $role->name . '<br>';
//    }
//});
///* MANY TO MANY RELATIONSHIP */
//
//Route::get('user/pivot', function () {
//    $user = User::find(1);
//
//    foreach ($user->roles as $role) {
//        echo $role->pivot->created_at;
//    }
//});
//
//Route::get('country/{id}/posts', function ($id){
//    $country = Country::find($id);
//
//    foreach ($country->posts as $post) {
//        echo $post->title;
//    }
//});
//
///* POLYMORPHIC RELATIONSHIP */
//Route::get('user/{id}/photos', function ($id) {
//    $user = User::find($id);
//
//    foreach ($user->photos as $photo) {
//        echo $photo->path;
//    }
//});
//
//Route::get('post/{id}/photos', function ($id) {
//    $post = Post::find($id);
//
//    foreach ($post->photos as $photo) {
//        echo $photo->path;
//    }
//});
//
//Route::get('photo/{id}', function ($id) {
//    $photo = Photo::find($id);
//
//    echo $photo->imageable;
//});
///* POLYMORPHIC RELATIONSHIP */
//
///* POLYMORPHIC MANY-TO-MANY RELATIONSHIP */
//Route::get('post/{id}/tag', function ($id) {
//    $post = Post::find($id);
//
//    foreach ($post->tags as $tag) {
//        echo $tag->name;
//    }
//});
//
//Route::get('video/{id}/tag', function ($id) {
//    $video = Video::find($id);
//
//    foreach ($video->tags as $tag) {
//        echo $tag->name;
//    }
//});
//
//Route::get('tag/{id}/posts', function ($id) {
//    $tag = Tag::find($id);
//
//    foreach ($tag->posts as $post) {
//        echo $post->title;
//    }
//});
/* POLYMORPHIC MANY-TO-MANY RELATIONSHIP */

/*
|--------------------------------------------------------------------------
| CRUD APPLICATION
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=>'web'], function () {
    Route::resource('/posts', '\App\Http\Controllers\PostsController');

    Route::get('/getUserName', function () {
        $user = User::find(1);

        return $user->name;
    });

    Route::get('/setUserName', function () {
       $user = User::findOrFail(1);

       $user->name = 'Burak Ege Zagnus';
       $user->save();
    });
});

