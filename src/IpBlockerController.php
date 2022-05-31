<?php


namespace tauseedzaman\LaravelIpBlocker;

use App\Http\Controllers\Controller;
use tauseedzaman\LaravelIpBlocker\RestrictedIps;
use Illuminate\Http\Request;

class IpBlockerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("RestrictedIps.index", [
            "restrictedIps" => RestrictedIps::latest()->get(['id', 'ip_address'])
        ]);
    }

    public function create()
    {
        return view("RestrictedIps.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip|unique:restricted_ips,ip_address,except,id'
        ]);
        $ip = RestrictedIps::create([
            'ip_address' => $request->ip_address
        ]);
        session()->flash("success", $ip->ip_address . " was successfully added.");
        return redirect()->route("restricted-ips.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestrictedIps  $restrictedIps
     * @return \Illuminate\Http\Response
     */
    public function destroy($restrictedIps)
    {
        RestrictedIps::find($restrictedIps)->delete();
        session()->flash("success", "IP was successfully deleted.");
        return redirect()->route("restricted-ips.index");
    }
}
