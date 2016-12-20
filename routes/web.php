<?php
use Illuminate\Http\Request;
use App\Image;
use Faker\Factory as Faker;
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
    return view('welcome');
});

//an ajax request route
Route::post('/ajax/upload',function(Request $req){
  if($req->ajax()){
      $data=$req->image;

      $profileUrl=saveProfileAjax($data, 'images/pics/');

      $image=new Image();
      $image->url=$profileUrl;
      
      if($image->save())

      {
          return Response::json(
              ['message'=>"completed"]
          );
      }
      else {
          return Response::json(['message'=>'not uploaded']);
      }

  }
});

function saveProfileAjax($data, $path="images/profileimages/"){
    $filename = renameBase64();


    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

    file_put_contents($path.$filename.'.png', $data);
    return $path.$filename.'.png';
}

function renameBase64(){


    $faker = Faker::create();

    return $faker->sha1;

}
