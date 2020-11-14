<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Products;

use Illuminate\Http\Request;

class ProductsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Products::latest()->paginate(100);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $extension = explode('/', mime_content_type($request->image))[1];
        $name = time().rand().'.'.$extension;

        \Image::make($request->image)->save(public_path('img/products/').$name);

        $request->merge(['image' => $name]);
        $ske = time().rand();

        return Products::create([
            'name' => $request['name'],
            'image' => $request['image'],
            'ske' => $ske
        ]);

    }


    public function updateProfile(Request $request)
    {

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
        $product = Products::findOrFail($id);

        $currentPhoto = $product->image;

        if($request->image != $currentPhoto){ // if there is different image

            $extension = explode('/', mime_content_type($request->image))[1];
            $name = time().rand().'.'.$extension;

            // image intervention package
            // instead of import Image we use \
            \Image::make($request->image)->save(public_path('img/products/').$name);

            $request->merge(['image' => $name]);

            $productImage = public_path('img/products/'.$currentPhoto); //Replace the old photo with the new
            if(file_exists($productImage)){
                @unlink($productImage); //unlink delete the photo
            }
        }

        $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product  = Products::findOrFail($id);
        $product->delete();

    }
    public function search($name){

        //$product = Products::all();
        return Products::where('name', 'LIKE' , "%{$name}%")->get();

    }
}
