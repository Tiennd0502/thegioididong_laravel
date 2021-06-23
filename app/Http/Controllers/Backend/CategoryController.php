<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as MainModel;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    private $pathViewController = 'backend.categories.';
    private $controllerName = 'category';
    public $current_page = 'category';

    public function __construct()
    {
      view()->share('controllerName', $this->controllerName);
      view()->share('current_page', $this->current_page);

    }
    
    public function index()
    {
			
      $items = MainModel::select(['id','name','icon','active','title_seo'])->paginate(10);
      return view($this->pathViewController.'index',compact('items'));
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

    
    public function store(StoreCategoryRequest $request)
    {
        $this->insertOrUpdate($request);
	    return back()->with('message', __('Thêm danh mục thành công!'));
    }

    
    public function show($id)
    {
      return dd($id. '--- show');
    }

    public function edit($id)
    {
			$item = MainModel::find($id);
			return view($this->pathViewController.'edit',[
				'item' => $item,
			]);
    }

    
    public function update(StoreCategoryRequest $request, $id)
    {	
			$this->insertOrUpdate($request,$id);
			return back()->with('message',__('Sửa danh mục thành công')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			MainModel::destroy($id);
			return back()->with('message', __('Xóa danh mục thành công!'));

    }

    public function insertOrUpdate($request, $id = ''){
      try {
        $item = new MainModel();
        if($id){
          $item = MainModel::find($id);
        }
        $item->name = $request->name;
        $item->slug = Str::slug($request->name);
        $item->status = $request->status;
        $item->position = $request->position;
        $item->icon = !empty($request->icon) ? $request->icon : '';
        $item->title_seo = !empty($request->title_seo) ? $request->title_seo :  $request->name;
        $item->description_seo =  !empty($request->description_seo) ? $request->description_seo : $request->name;
        $item->keyword_seo = !empty($request->keyword_seo) ?$request->keyword_seo : $request->name;
        $item->save();
      } catch (ModelNotFoundException $exception) {
        return back()->withError($exception->getMessage())->withInput();
      }
    }
}
