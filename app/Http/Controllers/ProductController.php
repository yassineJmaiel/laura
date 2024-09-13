<?php

namespace App\Http\Controllers;

use App\Models\money;
use App\Models\product;
use App\Models\tablevente;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    { $money=money::where("id",1)->first();

        $Totalproducts=product::count();
        $Totalachat=$money->prixachattotal;
        $Totalvente=$money->prixventetotal;
        $gain=$money->gain;
        $articles = product::all();
        return view('list-product', compact('articles','Totalproducts','Totalachat','Totalvente','gain'));
    }

    public function indexxx()
    {
         $money=money::where("id",1)->first();

        $Totalproducts=product::count();
        $Totalachat=$money->prixachattotal;
        $Totalvente=$money->prixventetotal;
        $gain=$money->gain;
        $articles = tablevente::all();
        return view('tabledevente', compact('articles','Totalproducts','Totalachat','Totalvente','gain'));
    }

    public function indexx()
    { $money=money::where("id",1)->first();

        $Totalproducts=product::count();
        $Totalachat=$money->prixachattotal;
        $Totalvente=$money->prixventetotal;
        $gain=$money->gain;
        return view('add-article', compact('Totalproducts','Totalachat','Totalvente','gain'));
    }
   

    // Store new article
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'qte' => 'required|integer',
            'prixa' => 'required|numeric',
            'prixv' => 'required|numeric',
        ]);

       $product= product::create([
            'titre' => $request->titre,
            'qte' => $request->qte,
            'prixa' => $request->prixa,
            'prixv' => $request->prixv,
        ]);

        $prixtotal = $product->prixa * $product->qte;

        $money=money::where("id",1)->first();

        $money->prixachattotal = $money->prixachattotal +  $prixtotal;

        $money->save();

        return redirect("list")->with('success', 'Article added successfully.');
    }

    public function updateview($id)
    {

        $money=money::where("id",1)->first();

        $Totalproducts=product::count();
        $Totalachat=$money->prixachattotal;
        $Totalvente=$money->prixventetotal;
        $gain=$money->gain;
      
 $article=product::where('id',$id)->first();

        return view('update-article',compact('article','Totalproducts','Totalachat','Totalvente','gain'));
    }

    public function update(Request $request, $id)
    {
      
 $product=product::where('id',$id)->first();

 $request->validate([
    'titre' => 'required|string|max:255',
    'qte' => 'required|integer',
    'prixa' => 'required|numeric',
    'prixv' => 'required|numeric',
]);
        $product->update([
            'titre' => $request->titre,
            'qte' => $request->qte,
            'prixa' => $request->prixa,
            'prixv' => $request->prixv,
        ]);

        return redirect("/list")->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $product=product::where('id',$id)->first();

        $product->delete();
        return redirect("list")->with('success', 'Article deleted successfully.');
    }
}
