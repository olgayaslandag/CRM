<?php 

namespace App\Components;

class AlertComponent
{

    public function index()
    {

        $data = "";
        if(session()->get("status") !== null){
            $tur = session()->get("status") === TRUE ? "success" : "danger";

            $data .= '<div class="alert alert-'.$tur.'">';
            $data .= session()->get("message");
            $data .= '</div>';
            
            session()->set(["status" => null, "message" => null]);
        }

        return $data;

    }

}

