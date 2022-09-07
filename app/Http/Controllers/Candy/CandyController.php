<?php

namespace App\Http\Controllers\Candy;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandyRequest;
use App\Http\Resources\CandyResource;
use App\Models\Candy;
use App\Models\Cart;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CandyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $candies = CandyResource::collection(Candy::orderBy('id', 'desc')->get());
            $response['status'] = 'success';
            $response['message'] = 'Data fetched succesfully';
            $response['data'] = $candies;
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
    public function store(CandyRequest $request)
    {
        try {
            // dd($request->all());
            $ins = $request->passedValidation();
            $ins['sku'] = generateSKU();
            $ins['price'] = (float)$ins['price'];

            $candy = Candy::create($ins);
            $response['status'] = 'success';
            $response['message'] = 'Candy created succesfully.';
            $response['data'] = CandyResource::make($candy);;
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
    public function show(Candy $candy)
    {
        // dd($candy);
        try {
            $response['status'] = 'success';
            $response['message'] = 'Data fetched succesfully.';
            $response['data'] = $candy;
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandyRequest $request, Candy $candy)
    {
        try {
            $candy->update($request->passedValidation());
            $response['status'] = 'success';
            $response['message'] = 'Candy updated succesfully.';
            $response['data'] = $candy;
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candy $candy)
    {
        try {
            $cart_item = Cart::where('candy_id', $candy->id)->first();
            if(@$cart_item) $cart_item->delete();
            $candy->delete();
            $response['status'] = 'success';
            $response['message'] = 'Candy deleted succesfully.';
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
        return response()->json($response, Response::HTTP_OK);
    }
}
