<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
  public function UserActive($id,$action){
    $user = User::fine($id);
    $user->action = $action;
    $user->update();
    return response()->json($e->getMessage());
    return  redirect()->back();
  }
}
