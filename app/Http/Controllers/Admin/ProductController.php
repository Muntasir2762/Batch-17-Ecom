<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function createProduct ()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $subCategories = SubCategory::orderBy('name', 'asc')->get();
        return view('admin.product.create', compact('categories', 'subCategories'));
    }

    public function storeProduct (Request $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->sku_code = $request->sku_code;
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->buying_price = $request->buying_price;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->qty = $request->qty;
        $product->product_type = $request->product_type;
        $product->description = $request->description;
        $product->product_policy = $request->product_policy;

        if(isset($request->image)){
            $imageName = rand().'-mainimage.'.$request->image->extension(); //8767898-mainimage.png
            $request->image->move('admin/product/', $imageName);

            $product->image = $imageName;
        }

        $product->save();

        //Upload Gallery Images
        if(isset($request->gallery_image)){

            foreach($request->gallery_image as $galleryImage){

                $galleryImageObj = new GalleryImage();

                $galleryImageName = rand().'-galleryimage.'.$galleryImage->extension(); //8767898-galleryimage.png
                $galleryImage->move('admin/galleryimage/', $galleryImageName);

                $galleryImageObj->gallery_image = $galleryImageName;
                $galleryImageObj->product_id = $product->id;
                $galleryImageObj->save();
            }
        }

        //Upload Colors
        if(isset($request->color) && $request->color[0] != null){
            foreach($request->color as $color_name){
                if($color_name != null){
                    $color = new Color();

                    $color->name = $color_name;
                    $color->slug = Str::slug($color_name);
                    $color->product_id = $product->id;

                    $color->save();
                }
            }
        }

        //Upload sIZES
        if(isset($request->size) && $request->size[0] != null){
            foreach($request->size as $size_name){
                if($size_name != null){
                    $size = new Size();

                    $size->name = $size_name;
                    $size->slug = Str::slug($size_name);
                    $size->product_id = $product->id;

                    $size->save();
                }
            }
        }

        toastr()->success('Product Uploaded Successfully!');
        return redirect()->back();
    }
}
