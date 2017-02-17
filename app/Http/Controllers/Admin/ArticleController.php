<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class ArticleController
 * @package App\Http\Controllers\Admin
 * |        | GET|HEAD  | /                            |                 | Closure                                              | web          |
|        | GET|HEAD  | admin/article                | article.index   | App\Http\Controllers\Admin\ArticleController@index   | web          |
|        | POST      | admin/article                | article.store   | App\Http\Controllers\Admin\ArticleController@store   | web          |
|        | GET|HEAD  | admin/article/create         | article.create  | App\Http\Controllers\Admin\ArticleController@create  | web          |
|        | DELETE    | admin/article/{article}      | article.destroy | App\Http\Controllers\Admin\ArticleController@destroy | web          |
|        | PUT|PATCH | admin/article/{article}      | article.update  | App\Http\Controllers\Admin\ArticleController@update  | web          |
|        | GET|HEAD  | admin/article/{article}      | article.show    | App\Http\Controllers\Admin\ArticleController@show    | web          |
|        | GET|HEAD  | admin/article/{article}/edit | article.edit    | App\Http\Controllers\Admin\ArticleController@edit    | web          |

 */
class ArticleController extends Controller
{
    //
    public function index()
    {
        return "Index";
    }
    public function store(Request $request)//POST:admin/article
    {
        $name = $request -> input('name');
        echo  '这是获取请求参数name：'.$name.'<br/>';
        return "store";
    }
    public function create()//GET|HEAD: admin/article/create
    {
        return "create";
    }
    public function destroy($id)//DELETE admin/article/{id}
    {
        return "destroy".$id;
    }
    public function update($id)//PUT|PATCH admin/article/{id}
    {
        return "update".$id;
    }
    public function show($id)//GET|HEAD admin/article/{id}
    {
        return "show".$id;
    }
    public function edit($id)//GET|HEAD admin/article/{article}/edit
    {
        return "edit".$id;
    }
}
