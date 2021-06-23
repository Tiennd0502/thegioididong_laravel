<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePageRequest;
use Illuminate\Support\Str;
use App\Models\Page as MainModel;
// use Illuminate\Support\Facades\View;
class PageController extends Controller
{
    private $pathViewController = 'backend.pages.';
    private $controllerName = 'page';
    private $current_page = 'page';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        view()->share('controllerName', $this->controllerName);
        view()->share('current_page', $this->current_page);

    }
    public function index()
    {
        $items = MainModel::paginate(10);

        return view($this->pathViewController.'index',[
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->pathViewController.'create',[
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $this->insertOrUpdate($request);
        return back()->with('message', __('Thêm trang thành công!'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $item = MainModelsDB::find($id);
        return view($this->pathViewController.'index',[
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         * Hàm findOrFail và firstOrFail sẽ trả kết quả đầu tiên của query
        *try {
        *    $page = Page::findOrFail(1);
        *    //hoặc
        *    $pages = Page::where('publish', true)->firstOrFail();
        *} catch (ModelNotFoundException $e) {
        *    echo $e->getMessage();
        *}
         */ 
        $item = MainModel::find($id);
        return view($this->pathViewController.'edit',[
            'item'      => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePageRequest $request, $id)
    {
        $this->insertOrUpdate($request, $id);    
        return back()->with('message', __('Sửa trang thành công!'));        
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
        return back()->with('message', __('Xóa trang thành công!'));
    }

    public function insertOrUpdate($request, $id = ''){
        try {
          $item = new MainModel();
          if($id){
            $item = MainModel::find($id);
          }
          $item->name = ucfirst($request->name);
          $item->link = '/'.(!empty($request->link) ? Str::slug($request->link) :Str::slug($request->name));
          $item->save();
        } catch (ModelNotFoundException $exception) {
          return back()->withError($exception->getMessage())->withInput();
        }
      }
}
