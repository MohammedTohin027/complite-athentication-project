<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Multi_Img;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    //  index
    public function add()
    {
        $all_publish_brands = Brand::where('status', 1)->orderBy('brand_name_en', 'ASC')->get();
        $all_publish_categories = Category::where('status', 1)->orderBy('category_name_en', 'ASC')->get();
        $all_publish_subcategories = SubCategory::where('status', 1)->orderBy('subcategory_name_en', 'ASC')->get();
        $all_publish_subsubcategories = SubSubCategory::where('status', 1)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return view('admin.product.add_product', compact('all_publish_brands', 'all_publish_categories', 'all_publish_subcategories', 'all_publish_subsubcategories'));
    }
    //  Stote
    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
        ], [
            'brand_id.required' => 'Brand name field is required',
            'category_id.required' => 'Category name field is required',
            'subcategory_id.required' => 'SubCategory name field is required',
            'subsubcategory_id.required' => 'Sub-SubCategory name field is required',
        ]);

        $image = $request->file('product_thambnail');
        $image_name = dechex(uniqid()) . octdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'uploads/products/product_thambnails/' . $image_name;
        Image::make($image)->resize(970, 900)->save($save_url);
        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_bn' => str_replace(' ', '-', $request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'sale_tag' => $request->sale_tag,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $images = $request->file('multi_img');

        foreach ($images as $img) {
            $img_name = dechex(uniqid()) . octdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $upload_url = 'uploads/products/multi_images/' . $img_name;
            Image::make($img)->resize(970, 900)->save($upload_url);

            Multi_Img::insert([
                'product_id' => $product_id,
                'photo_name' => $upload_url,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Store Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function manage()
    {
        $products = Product::latest()->get();
        return view('admin.product.manage_product', compact('products'));
    }

    //  Published
    public function published($id)
    {
        Product::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Published Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Unpublished
    public function unpublished($id)
    {
        Product::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Unpublished Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Delete
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        $product->delete();

        $multi_images = Multi_Img::where('product_id', $product->id)->get();
        foreach ($multi_images as $img) {
            unlink($img->photo_name);
            $img->delete();
        }
        $notification = array(
            'message' => 'Product Delete Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Edit
    public function edit($id)
    {
        // $brand = Brand::findOrFail($id);
        $product = Product::findOrFail($id);
        $multi_images = Multi_Img::where('product_id', $product->id)->get();
        $all_publish_brands = Brand::where('status', 1)->orderBy('brand_name_en', 'ASC')->get();
        $all_publish_categories = Category::where('status', 1)->orderBy('category_name_en', 'ASC')->get();
        return view('admin.product.edit', compact('product', 'multi_images', 'all_publish_brands', 'all_publish_categories',));
    }
    //  Update
    public function update(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
        ], [
            'brand_id.required' => 'Brand name field is required',
            'category_id.required' => 'Category name field is required',
            'subcategory_id.required' => 'SubCategory name field is required',
            'subsubcategory_id.required' => 'Sub-SubCategory name field is required',
        ]);

        $product_id = $request->product_id;
        $product = Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_bn' => str_replace(' ', '-', $request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'sale_tag' => $request->sale_tag,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'updated_at' => Carbon::now(),
        ]);


        $notification = array(
            'message' => 'Prodcut Update Success',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function productThambnailUpdate(Request $request)
    {
        $product_id = $request->product_id;
        $old_product_thambnail = $request->old_product_thambnail;
        unlink($old_product_thambnail);
        $image = $request->file('product_thambnail');
        $image_name = dechex(uniqid()) . octdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'uploads/products/product_thambnails/' . $image_name;
        Image::make($image)->resize(970, 900)->save($save_url);
        $product = Product::findOrFail($product_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Prodcut Update Success',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function productMultiImageDelete($id)
    {
        $multi_image = Multi_Img::findOrFail($id);
        $multi_image->delete();
        unlink($multi_image->photo_name);

        $notification = array(
            'message' => 'Prodcut Update Success',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function productMultiImageUpdate(Request $request)
    {
        $images = $request->multiImg;
        foreach ($images as $id => $img) {
            $multi_image = Multi_Img::findOrFail($id);
            unlink($multi_image->photo_name);
            $image_name = dechex(uniqid()) . octdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $save_url = 'uploads/products/multi_images/' . $image_name;
            Image::make($img)->resize(970, 900)->save($save_url);
            $img = Multi_Img::findOrFail($id)->update([
                'photo_name' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Prodcut Update Success',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
