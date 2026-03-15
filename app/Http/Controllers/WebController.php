<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\PaymentMethod;
use App\Models\Delivery;
use App\Models\Book;

class WebController extends Controller
{
    public function index(){
        $products = Product::active()->orderBy('id','desc')->limit(4)->get();

        $favorites = Product::active()->withCount('details')->orderBy('details_count', 'desc')->having('details_count', '>', 0)->limit(4)->get();

        return view('index', compact('products', 'favorites'));
    }

    public function shop(Request $request){
        $categories = Category::active()->orderBy('name', 'asc')->get();
        $brands = Brand::active()->orderBy('name', 'asc')->get();
        $products = Product::active()->when($request->search, function($query, $search){
            return $query->where('name', 'LIKE', '%'.$search.'%');
        })->when($request->category_id, function($query, $category_id){
            return $query->where('category_id', $category_id);
        })->when($request->brand_id, function($query, $brand_id){
            return $query->where('brand_id', $brand_id);
        })->when($request->min_price, function($query, $min_price){
            return $query->where('price', '>=', $min_price);
        })->when($request->max_price, function($query, $max_price){
            return $query->where('price', '<=', $max_price);
        })->orderBy('name', 'asc')->paginate(12);

        return view('shop', compact('categories', 'products', 'brands'));
    }

    public function product(Product $product){
        return view('product', compact('product'));
    }

    public function cart(){
        $cart = session('cart', []);
        $total = array_reduce($cart, function($sum, $item){
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);
        return view('cart', compact('cart', 'total'));
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function dashboard(){
        $clients = Client::count();
        $products = Product::active()->count();
        $sales = Sale::active()->sum('total');
        return view('admin.index', compact('clients', 'products', 'sales'));
    }

    public function checkout(){
        $cart = session('cart', []);

        if(count($cart) == 0){
            return redirect()->route('index');
        }

        $total = array_reduce($cart, function($sum, $item){
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);
        $payment_methods = PaymentMethod::all();
        $deliveries = Delivery::all();
        return view('checkout', compact('cart', 'total', 'payment_methods', 'deliveries'));
    }

    public function finalize(Request $request){
        $request->validate([
            'voucher' => 'required',
            'city' => 'required',
            'address' => 'required',
            'payment_method_id' => 'required',
            'delivery_id' => 'required'
        ]);

        $client_id = auth()->user()->id;
        $delivery = Delivery::find($request->delivery_id);
        $cart = session('cart', []);
        $total = array_reduce($cart, function($sum, $item){
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        $number = DB::table('numbers')->where('voucher', $request->voucher)->first();

        $sale_number = $number->serie.'-'.str_pad($number->number, 8, "0", STR_PAD_LEFT);

        $sale = Sale::create([
            'bussiness_name' => $request->bussiness_name,
            'bussiness_document' => $request->bussiness_document,
            'voucher' => $request->voucher,
            'city' => $request->city,
            'address' => $request->address,
            'number' => $sale_number,
            'client_id' => $client_id,
            'total' => $total + $delivery->price,
            'payment_method_id' => $request->payment_method_id,
            'delivery_id' => $request->delivery_id,
            'date' => now(),
            'status' => 'Pendiente'
        ]);

        foreach($cart as $id => $item){
            SaleDetail::create([
                'sale_id' => $sale->id,
                'product_id' => $id,
                'price' => $item['price'],
                'quantity' => $item['quantity']
            ]);

            $product = Product::find($id);

            $product->update([
                'stock' => $product->stock - $item['quantity']
            ]);
        }

        DB::table('numbers')->where('voucher', $request->voucher)->update([
            'number' => $number->number + 1
        ]);

        session()->forget('cart');

        return redirect()->route('success')->with('voucher_url', route('sales.pdf', $sale)); 
    }

    public function success(){
        if(!session()->has('voucher_url')){
            return redirect()->route('index');
        }
        return view('success');
    }

    public function orders(){
        $client_id = auth()->user()->id;
        $sales = Sale::active()->where('client_id', $client_id)->orderBy('date', 'desc')->paginate(10);

        return view('orders', compact('sales'));
    }

    public function profile(){
        return view('profile');
    }

    public function update(Request $request){
        $user = auth()->user();
        
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:clients,email,'.$user->id
        ]);

        auth()->user()->update($request->all());

        return redirect()->route('profile');
    }

    public function book(){
        return view('book');
    }

    public function book_store(Request $request){

        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'document' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'product_type' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'order_number' => 'required',
            'claim' => 'required',
            'client_request' => 'required',
        ]);

        Book::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'document' => $request->document,
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'product_type' => $request->product_type,
            'description' => $request->description,
            'amount' => $request->amount,
            'order_number' => $request->order_number,
            'claim' => $request->claim,
            'client_request' => $request->client_request,
            'date' => now()
        ]);

        return redirect()->route('book');
    }
}
