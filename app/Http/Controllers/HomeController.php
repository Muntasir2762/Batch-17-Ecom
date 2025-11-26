<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Policy;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        $categories = Category::get();
        $hotProducts = Product::where('product_type', 'hot')->get();
        $newProducts = Product::where('product_type', 'new')->get();
        $regularProducts = Product::where('product_type', 'regular')->get();
        $discountProducts = Product::where('product_type', 'discount')->get();
        return view('frontend.index', compact('categories', 'hotProducts', 'newProducts', 'regularProducts', 'discountProducts'));
    }

    public function shop (Request $request)
    {
        if($request->cat_id){
            $products = Product::orderBy('id', 'desc')->where('cat_id', $request->cat_id)->paginate(20);
        }
        elseif($request->sub_cat_id){
            $products = Product::orderBy('id', 'desc')->where('sub_cat_id', $request->sub_cat_id)->paginate(20);
        }
        else{
            $products = Product::orderBy('id', 'desc')->paginate(20);
        }
        $productCount = $products->count();
        $categories = Category::get();
        $subCategories = SubCategory::get();
        return view('frontend.shop', compact('products', 'categories', 'subCategories', 'productCount'));
    }

    public function returnProcess ()
    {
        $returnProcess = Policy::select('return_process')->first();
        return view('frontend.return-process', compact('returnProcess'));
    }

    public function viewCart ()
    {
        return view('frontend.view-cart');
    }

    public function checkout ()
    {
        return view('frontend.checkout');
    }

    public function categoryProducts ($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('cat_id',$category->id)->get();
        $productCount = $products->count();
        return view('frontend.category-products', compact('products', 'productCount', 'category'));
    }

    public function subCategoryProducts ($slug)
    {
        $subCategory = SubCategory::where('slug', $slug)->first();
        $products = Product::where('sub_cat_id',$subCategory->id)->get();
        $productCount = $products->count();
        return view('frontend.sub-category-products', compact('subCategory', 'products', 'productCount'));
    }

    public function productDetails ($slug)
    {
        $product = Product::where('slug', $slug)->with('color', 'size', 'galleryImage')->first();
        $categories = Category::get();
        return view('frontend.product-details', compact('product', 'categories'));
    }

    public function viewTypeProducts ($product_type)
    {
        $products = Product::where('product_type', $product_type)->get();
        $productCount = $products->count();
        return view('frontend.view-type-products', compact('products', 'productCount', 'product_type'));
    }

    public function privacyPolicy ()
    {
        $privacyPolicy = Policy::select('privacy_policy')->first();
        return view('frontend.privacy-policy', compact('privacyPolicy'));
    }

    public function termsCondition ()
    {
        $termsConditions = Policy::select('terms_conditions')->first();
        return view('frontend.terms-conditions', compact('termsConditions'));
    }

    public function refundPolicy ()
    {
        $refundPolicy = Policy::select('refund_policy')->first();
        return view('frontend.refund-policy', compact('refundPolicy'));
    }

    public function paymentPolicy ()
    {
        $paymentPolicy = Policy::select('payment_policy')->first();
        return view('frontend.payment-policy', compact('paymentPolicy'));
    }

    public function aboutUs ()
    {
        $aboutUs = Policy::select('about_us')->first();
        return view('frontend.aboutus', compact('aboutUs'));
    }

    public function contactUs ()
    {
        return view('frontend.contact-us');
    }

    public function contactMessageStore (Request $request)
    {
        $contact = new ContactMessage();

        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();
        toastr()->success('Your message is sent successfully!');
        return redirect()->back();
    }

    //Cart functions...
    public function addToCartDetails (Request $request)
    {

        $previousCart = Cart::where('product_id', $request->product_id)->where('ip_address', $request->ip())->first();

        if($previousCart == null){
            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->ip_address = $request->ip();
            $cart->color = $request->color;
            $cart->size = $request->size;
            $cart->qty = $request->qty;
            $cart->price = $request->price;

            $cart->save();
        }
        else{
            $previousCart->color = $request->color;
            $previousCart->size = $request->size;
            $previousCart->qty = $request->qty;

            $previousCart->save();
        }

        toastr()->success('Added to cart successfully');

        if($request->action == "addToCart"){
            return redirect()->back();
        }
        else{
            return redirect('/checkout');
        }
    }

    public function addToCart (Request $request, $id)
    {
         $previousCart = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
         $product = Product::find($id);

        if($previousCart == null){
            $cart = new Cart();
            $cart->product_id = $id;
            $cart->ip_address = $request->ip();
            $cart->qty = 1;
            $cart->price = $product->discount_price ?? $product->regular_price;

            $cart->save();
        }
        else{
            $previousCart->qty = $previousCart->qty+1;
            $previousCart->save();
        }

        toastr()->success('Added to cart successfully!');
        return redirect()->back();
    }

    public function deleteCart ($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    //Conform Order...
    public function confirmOrder (Request $request)
    {
        $order = new Order();

        $order->ip_address = $request->ip();

        //Previous Orders Count...
        $orderCount = Order::count();
        if($orderCount == 0){
            $generatedInvoice = "XYZ-1";
        }
        else{
            $generatedInvoice = "XYZ-".$orderCount+1;
        }
        $order->invoice_number = $generatedInvoice;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->charge = $request->charge;
        $order->price = $request->grandTotalInput;
        $order->save();

        //Order Details...
        $carts = Cart::where('ip_address', $request->ip())->get();

        foreach($carts as $cartProduct){
            $orderDetails = new OrderDetails();

            $orderDetails->order_id = $order->id;
            $orderDetails->product_id = $cartProduct->product_id;
            $orderDetails->color = $cartProduct->color;
            $orderDetails->size = $cartProduct->size;
            $orderDetails->qty = $cartProduct->qty;
            $orderDetails->price = $cartProduct->price;

            $orderDetails->save();
            $cartProduct->delete();
        }

        return redirect('success-order/'.$generatedInvoice);
    }

    public function successOrder ($orderId)
    {
        $order = Order::where('invoice_number', $orderId)->first();
        if($order == null){
            toastr()->error('Invalid OrderId');
            return redirect('/');
        }
        else{
            return view('frontend.thankyou', compact('order'));
        }
    }
}
