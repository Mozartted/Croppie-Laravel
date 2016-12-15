<?php
use Illuminate\Http\Request;
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
Route::post('/ajax/upload',function(Request $request){
  if($req->ajax()){
      $data=$req->image;

      $profileUrl=saveProfileAjax($data, 'images/profileimages/');

      $image=new Image([
          'url'=>$profileUrl
      ]);

      if($image->save()){
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
    $filename = $this->renameBase64();


    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

    file_put_contents($path.$filename.'.png', $data);
    return $path.$filename.'.png';
}
