<?php

namespace App\Http\Controllers;

use App\Models\money;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\tablevente;

class MoneyController extends Controller
{
    public function index()
    {
        $money=money::where("id",1)->first();

        $Totalproducts=product::count();
        $Totalachat=$money->prixachattotal;
        $Totalvente=$money->prixventetotal;
        $gain=$money->gain;
        $products = product::all();
        return view('sell-product', compact('products','Totalproducts','Totalachat','Totalvente','gain'));
    }

    public function sell(Request $req)
    {
        $product = product::where("id",$req->product)->first();

        if( $product->qte > $req->qte){
        $product->qte=$product->qte - $req->qte ;
        $product->save();
    } else return redirect()->back()->with("error","error");
       
    $prixvente=$product->prixv * $req->qte;

        $money=money::where("id",1)->first();

        $money->prixventetotal= $money->prixventetotal + $prixvente ;

        $money->gain=  $money->gain + ($money->prixventetotal - $money->prixachattotal);

        $money->save();

            $tablevente= new tablevente();

            $tablevente->client=$req->client;
            $tablevente->qte=$req->qte;
            $tablevente->adresse=$req->adresse;
            $tablevente->product=$product->titre;
            $tablevente->totalprix=$prixvente;
            $tablevente->save();

        return redirect("/list");
    }

}
