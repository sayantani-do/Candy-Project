<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Resources\CartResource;
use App\Models\Candy;
use App\Models\Cart;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // dd(Cart::all());
            $items = CartResource::collection(Cart::with('getCandy')->get());
            $response['status'] = 'success';
            $response['message'] = 'Data fetched succesfully';
            $response['data'] = $items;
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartRequest $request)
    {
        try {
            $ins = $request->passedValidation();
            // dd($ins);
            $candy = Candy::where('uuid', $request->candy_id)->first();
            $ins['candy_id'] = $candy->id;
            $item = Cart::create($ins);

            $response['status'] = 'success';
            $response['message'] = 'Item added to cart.';
            $response['data'] = $item;
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        try {
            $cart->delete();
            $response['status'] = 'success';
            $response['message'] = 'Item deleted succesfully.';
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
        return response()->json($response, Response::HTTP_OK);
    }

    public function addQuantity(Cart $cart){
        try {
            // dd((int)$cart->quantity + 1);
            $cart->quantity = (int)$cart->quantity + 1;
            $cart->save();
            $response['status'] = 'success';
            $response['message'] = 'Item added succesfully.';
            $response['data'] = $cart;
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
        return response()->json($response, Response::HTTP_OK);
    }

    public function reduceQuantity(Cart $cart){
        try {
            if($cart->quantity <= 1) $cart->delete();
            else {
                $cart->quantity = (int)$cart->quantity - 1;
                $cart->save();
            }
            $response['status'] = 'success';
            $response['message'] = 'Item added succesfully.';
            $response['data'] = $cart;
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
        return response()->json($response, Response::HTTP_OK);
    }

}
