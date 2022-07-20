<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use Storage;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(config('custom.items_per_page'));

        return BrandResource::collection($brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $data = $request->validated();

        // i know how to pass image as base 64 but it needs to allow some extension in php.ini in your local machine
        // so i suggested to take the easy way for now

        /*if ($request->image) 
            $data['image'] = uploadImageBase64($request->image, 'storage\\brand-images\\');*/

        if ($request->hasFile('image')) 
            $data['image'] = $request->file('image')->store('storage/brand-images');

        $brand = Brand::create($data);

        return new BrandResource($brand);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return new BrandResource($brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) 
        {
            Storage::delete($brand->image ?? '');
            $data['image'] = $request->file('image')->store('storage/brand-images');
        }

        $brand->update($data);

        return new BrandResource($brand);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        Storage::delete($brand->image ?? '');

        $brand->delete();

        return new BrandResource($brand);
    }
}
