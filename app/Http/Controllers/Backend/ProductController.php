<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as MainModel;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductRequest; 
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    private $pathViewController = 'backend.products.';
    private $controllerName = 'product';
    public $current_page = 'product';
    const FOLDER_IMAGE = 'images/products';
    const FOLDER_ICON = 'images/icons';

    public function __construct()
    {
      view()->share('controllerName', $this->controllerName);
      view()->share('current_page', $this->current_page);
      view()->share('categories', Category::get(['id','name']));
      view()->share('brands', Brand::get(['id','name']));

    }
    public function index(Request $request)
    {
        $items = MainModel::orderBy('id','desc');
        if($request->name){
            $items = $items->where('name','LIKE', '%'.$request->name.'%');
        }
        if($request->category_id){
            $items = $items->where('category_id', $request->category_id);
            view()->share('brands', Brand::where('category_id', $request->category_id)->get(['id','name']));
        }
        if($request->brand_id){
            $items = $items->where('brand_id', $request->brand_id);
        }
        $items = $items->select(['avatar','id','name','category_id','brand_id','active'])->paginate(10);
        return view($this->pathViewController.'index',[
            'items'         => $items, 
        ]);
    }

    public function getBrand($category_id){

       $result = Brand::where('category_id', $category_id)->get(['id','name']);
      return $result;
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
        $brands = Brand::where('category_id', 1)->get(['id', 'name']);
        return view($this->pathViewController.'create',compact('brands'));
    }

    public function store(StoreProductRequest $request)
    {
      $this->insertOrUpdate($request);
      return back()->with('message', __('Thêm sản phẩm thành công!'));
    }

    public function show($id)
    {
        
        $item = MainModel::find($id);
        return view($this->pathViewController.'show',compact('item'));
    }

    public function edit($id)
    {
        $item = MainModel::find($id);
        
        return view($this->pathViewController.'edit',['item'=>$item]);
    }
    public function copy($id){
        $item = MainModel::find($id);
        // $brands = $item->category->brands->select('id','name')->get();
        // dd($item->category->brands->get());
        return view($this->pathViewController.'copy',['item'=>$item]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return back()->with('message', __('Sửa sản phẩm thành công!'));
    }

    public function insertOrUpdate($request, $id = ''){
        try {
        
            if($id){
                $item              = MainModel::find($id);
                $item->modified_by = $request->modified_by;

                if($request->hasFile('avatar')){
                    $item->avatar = Controller::uploadImage($request->avatar,ProductController::FOLDER_IMAGE);
                    Controller::deleteFile(ProductController::FOLDER_IMAGE.$request->linkImage);
                }
                // img icon
                if(isset($request->linkIcon)){
                    if(!empty($request->linkIcon)){
                        if($request->hasFile('icon')){
                            $item->icon = Controller::uploadImage($request->icon,ProductController::FOLDER_ICON);
                        }else{
                            $item->icon = '';
                        }
                        Controller::deleteFile(ProductController::FOLDER_ICON.$request->linkIcon);
                    }
                }else{
                    if($request->hasFile('icon')){
                        $item->icon = Controller::uploadImage($request->icon,ProductController::FOLDER_ICON);
                    }
                }
                // image hot
                if(isset($request->linkHot)){
                    if(!empty($request->linkHot)){
                        if($request->hasFile('image_hot')){
                            $item->image_hot = Controller::uploadImage($request->icon,ProductController::FOLDER_IMAGE);
                        }else{
                            $item->image_hot = '';
                        }
                        Controller::deleteFile(ProductController::FOLDER_IMAGE.$request->linkHot);
                    }
                }else{
                    if($request->hasFile('image_hot')){
                        $item->image_hot = Controller::uploadImage($request->image_hot,ProductController::FOLDER_IMAGE);
                    }
                }

                //  lấy ảnh library củ va thao tác cũ
                $image_detail_new = json_decode($item->image_detail); 
                // ảnh củ còn lại
                if(isset($request->linkLibrary) && !empty($request->linkLibrary)){
                    // delete file 
                    foreach ($request->linkLibrary as $key => $value){
                        if($value != ''){
                            Controller::deleteFile(ProductController::FOLDER_IMAGE.$value);
                        }
                    }
                    // return arr with index =0
                    $image_detail_new = array_values(array_diff($image_detail_new, $request->linkLibrary));    
                }

                //  up load new image library
                if($request->hasFile('library')){
                    $image_detail_upload = Controller::noMore($request->delete_library, $request->library);
                    foreach ($image_detail_upload as $key => $value) {
                        $image_detail_new[] = Controller::uploadImage($value,ProductController::FOLDER_IMAGE);
                    }
                }
                $item->image_detail = json_encode($image_detail_new);
                //  lấy ảnh carousel củ 
                $image_carousel_new = json_decode($item->image_carousel); 
                // ảnh củ còn lại
                if(isset($request->linkCarousel) && !empty($request->linkCarousel)){
                    // delete file 
                    foreach ($request->linkCarousel as $key => $value){
                        if($value != ''){
                            Controller::deleteFile(ProductController::FOLDER_IMAGE.$value);
                        }
                    }
                    // return arr with index =0
                    $image_carousel_new = array_values(array_diff($image_carousel_new, $request->linkCarousel));    
                }
                //  up load new image carousel
                if($request->hasFile('carousel')){
                    $image_carousel_upload = Controller::noMore($request->delete_carousel, $request->carousel);
                    foreach ($image_carousel_upload as $key => $value) {
                        $image_carousel_new[] = Controller::uploadImage($value,ProductController::FOLDER_IMAGE);
                    }
                }
                $item->image_carousel = json_encode($image_carousel_new);
            }else{
                $item = new MainModel();
                $item->created_by       = $request->created_by;
                $item->avatar = Controller::uploadImage($request->avatar,ProductController::FOLDER_IMAGE);
                if($request->hasFile('image_hot')){
                    $item->image_hot = Controller::uploadImage($request->image_hot,ProductController::FOLDER_IMAGE);
                }
                if($request->hasFile('icon')){
                    $item->icon = Controller::uploadImage($request->file('icon'),ProductController::FOLDER_ICON);
                }
                if($request->hasFile('library')){
                    $path_lib = [];
                    $library = Controller::noMore($request->delete_library, $request->library);
                    foreach ($library as $key => $value) {
                        $path_lib[]= Controller::uploadImage($value,ProductController::FOLDER_IMAGE);
                    }
                    $item->image_detail =json_encode($path_lib);

                }
                if($request->hasFile('carousel')){
                    $path_carousel = [];
                    $carousel = Controller::noMore($request->delete_carousel, $request->carousel);
                    foreach ($carousel as $key => $value) {
                        $path_carousel[]= Controller::uploadImage($value,ProductController::FOLDER_IMAGE);
                    }
                    $item->image_carousel = json_encode($path_carousel);
                }

            }
            $item->category_id      = $request->category_id;
            $item->brand_id         = $request->brand_id;
            $item->name             = $request->name;
            $item->slug             = Str::slug($request->name);
            $item->price            = $request->price;
            $item->discount         = $request->discount;
            $item->gift             = $request->gift;
            $item->property         = $request->property;
            $item->hot              = $request->hot == 1 ? 1 : 0;
            $item->active           = $request->active == 1 ? 1 : 0;
            $item->description      = $request->description;
            $item->content          = $request->content;
            $item->title_seo        = $request->title_seo ? $request->title_seo : $request->name;
            $item->description_seo  = $request->description_seo? $request->description_seo : $request->name;
            $item->keyword_seo      = $request->keyword_seo ? $request->keyword_seo : $request->name ;
            $item->save();
        } catch (ModelNotFoundException $exception) {
          return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function destroy($id){
        $item = MainModel::find($id);
        Controller::deleteFile(ProductController::FOLDER_IMAGE .MainModel::find($id)->avatar);
        if(!empty($item->icon)){
            Controller::deleteFile(ProductController::FOLDER_IMAGE .MainModel::find($id)->icon);
        }
        if(!empty($item->image_hot)){
            Controller::deleteFile(ProductController::FOLDER_IMAGE .MainModel::find($id)->icon);
        }
        if(!empty($item->image_detail)){
            foreach (json_decode($item->image_detail) as $key => $value) {
                Controller::deleteFile(ProductController::FOLDER_IMAGE .$value);
            }
            
        }
        if(!empty($item->image_carousel)){
            foreach (json_decode($item->image_carousel) as $key => $value) {
                Controller::deleteFile(ProductController::FOLDER_IMAGE .$value);
            }
            
        }
        MainModel::destroy($id);
    }
}
