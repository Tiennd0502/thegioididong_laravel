<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreArticleRequest;
// use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article as MainModel;

class ArticleController extends Controller
{
    private $pathViewController = 'backend.articles.';
    private $controllerName = 'article';
    public $current_page = 'article';
    const FOLDER_IMAGE = 'images/articles';
    
    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        view()->share('current_page', $this->current_page);
    }
    public function index()
    {
        $items = MainModel::paginate(10);        
        return view($this->pathViewController.'index',[
            'items'       => $items,
        ]);
    }

    public function status($status, $id){
        if($status){
            $item = MainModel::find($id);
            switch ($status) {
                case 'active':
                    $item->active = !$item->active;
                    break;
                default:
                    # code...
                    break;
            }
            $item->save();
        }
        return redirect()->back();

    }
    public function create()
    {
        return view($this->pathViewController.'create');
    }

    public function store(StoreArticleRequest $request)
    {
        $this->insertOrUpdate($request);
        return back()->with('message', __('Thêm bài viết thành công!'));
    }

    public function show($id)
    {
        return view($this->pathViewController.'index');
    }

    public function edit($id)
    {
        $item        = MainModel::find($id);
        return view($this->pathViewController.'edit',compact("item"));
    }
    
    public function update(StoreArticleRequest $request, $id)
    {  
        $this->insertOrUpdate($request, $id);
        return back()->with('message', __('Sửa bài viết thành công!'));
    }

    public function destroy($id)
    {

        Controller::deleteFile(ArticleController::FOLDER_IMAGE .MainModel::find($id)->avatar);
        MainModel::destroy($id);
        return back()->with('message', __('Xóa slider thành công!'));
    }
    public function insertOrUpdate($request, $id = ''){
        try {
            if($id){
                $item = MainModel::find($id);
                if($request->hasFile('avatar')){
                    $item->avatar = Controller::uploadImage($request->avatar,ArticleController::FOLDER_IMAGE);
                    if($request->linkImage) {
                      Controller::deleteFile(ArticleController::FOLDER_IMAGE.$request->linkImage);
                    }  
                }
                // $item->modified_by = $request->modified_by;
            }else{
                $item = new MainModel();
                if($request->hasFile('avatar')){
                  $item->avatar = Controller::uploadImage($request->avatar,ArticleController::FOLDER_IMAGE);
                }
                // $item->created_by       = $request->created_by;
            }
            $item->name             = $request->name;
            $item->slug             = Str::slug($request->name);
            $item->description      = $request->description;
            $item->content          = $request->content;
            $item->title_seo        = !empty($request->title_seo) ? $request->title_seo :  $request->name;
            $item->description_seo  = !empty($request->description_seo) ? $request->description_seo : $request->name;
            $item->keyword_seo      = !empty($request->keyword_seo) ?$request->keyword_seo : $request->name;
            $item->active           = !empty($request->active) ?$request->active : 0;
            $item->save();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
      }

}
