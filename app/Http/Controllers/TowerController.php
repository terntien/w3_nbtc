<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tower;
use DB;
class TowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tower = Tower::all();
        return view('towers.index', compact('tower'));
    }

    public function selectCus(){
        $list=DB::table('towers_customer')->get();
        $nets=DB::table('towers_network')->get();
        return view('towers.create')->with('list',$list)->with('nets',$nets);
    }


    public function marker(){

        $dom = new \DOMDocument();
        $node = $dom->createElement("marker");
        $parnode = $dom->appendChild($node);
        $tower = DB::table('towers')->get();
        // print_r ($tower);
        return view('home');
        // print_r ($tower);

        if (!$tower) {
        die('Invalid query: ' . mysql_error());exit;
        }

        header("Content-type: text/xml");
        foreach( $tower as $row){
          
            $node = $dom->createElement("marker");
            $newnode = $parnode->appendChild($node);

            $newnode->setAttribute("id", $row['tower_id']);
            // $newnode->setAttribute("image", $row['towers_image']);
            $newnode->setAttribute("name", $row['towers_typeleaf']);
            $newnode->setAttribute("sending", $row['towers_sending']);
            $newnode->setAttribute("parish", $row['towers_parish']);
            $newnode->setAttribute("district", $row['towers_district']);
            $newnode->setAttribute("pravince", $row['towers_pravince']);
            $newnode->setAttribute("code", $row['towers_code']);
            // $newnode->setAttribute("customer", $row['customer_name']);
            // $newnode->setAttribute("network", $row['network_name']);
            $newnode->setAttribute("license_code", $row['towers_license_code']);
            $newnode->setAttribute("license_date", $row['towers_license_date']);
            $newnode->setAttribute("lat", $row['LATDEG']);
            $newnode->setAttribute("lng", $row['LONGDEG']);
            // $newnode->setAttribute("type", $row['customer_id']);
        }

        $xmlfile = $dom->saveXML();
        echo $xmlfile; 

        return view('home');
    }


    public function create()
    {
         return view('towers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            // 'towers_customer'    => 'required',
            // 'towers_network'     => 'required',
            'towers_sending'     => 'required',
            'towers_typeleaf'    => 'required',
            'towers_parish'      => 'required',
            'towers_district'    => 'required',
            'towers_pravince'    => 'required',
            'towers_code'        => 'required',
            'LATDEG'             => 'required',
            'LONGDEG'            => 'required',
            'towers_license_code'=> 'required',
            'towers_license_date'=> 'required'
        ]);
        $tower = new tower([
            // 'towers_customer'    => $request->get('towers_customer'),
            // 'towers_network'     => $request->get('towers_network'),
            'towers_sending'     => $request->get('towers_sending'),
            'towers_typeleaf'    => $request->get('towers_typeleaf'),
            'towers_parish'      => $request->get('towers_parish'),
            'towers_district'    => $request->get('towers_district'),
            'towers_pravince'    => $request->get('towers_pravince'),
            'towers_code'        => $request->get('towers_code'),
            'LATDEG'             => $request->get('LATDEG'),
            'LONGDEG'            => $request->get('LONGDEG'),
            'towers_license_code'=> $request->get('towers_license_code'),
            'towers_license_date'=> $request->get('towers_license_date')
        ]);
        $tower->save();
        return redirect('/towers')->with('success', 'Tower saved!');
    }



    public function show($id)
    {
        $tower = Tower::find($id);
        return view('towers.show', compact('tower')); 
    }

    


    public function edit($id)
    {
        $tower = Tower::find($id);
        return view('towers.edit', compact('tower')); 
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'towers_customer'       => 'required',
            // 'towers_network'        => 'required',
            'towers_sending'     => 'required',
            'towers_typeleaf'    => 'required',
            'towers_parish'      => 'required',
            'towers_district'    => 'required',
            'towers_pravince'    => 'required',
            'towers_code'        => 'required',
            'LATDEG'             => 'required',
            'LONGDEG'            => 'required',
            'towers_license_code'=> 'required',
            'towers_license_date'=> 'required'
        ]);

        $tower = Tower::find($id);
        // $tower->towers_customer = $request->get('towers_customer');
        // $tower->towers_network = $request->get('towers_network');
        $tower->towers_sending = $request->get('towers_sending');
        $tower->towers_typeleaf = $request->get('towers_typeleaf');
        $tower->towers_parish = $request->get('towers_parish');
        $tower->towers_district = $request->get('towers_district');
        $tower->towers_pravince = $request->get('towers_pravince');
        $tower->towers_code = $request->get('towers_code');
        $tower->LATDEG = $request->get('LATDEG');
        $tower->LONGDEG = $request->get('LONGDEG');
        $tower->towers_license_code = $request->get('towers_license_code');
        $tower->towers_license_date = $request->get('towers_license_date');
        $tower->save();

        return redirect('/towers')->with('success', 'Tower updated!');
    
    }

    public function destroy($id)
    {
        $tower = Tower::find($id);
        $tower->delete();

        return redirect('/towers')->with('success', 'Tower delete');
    }
}
