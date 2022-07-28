<?php 

namespace App\Components;

class AlertComponent
{

    public function index()
    {
        $data = "";
        if(session()->get("status") !== null){
            $tur = session()->get("status") === TRUE ? "success" : "danger";
            $message = session()->get("message");
            $message = is_array($message) ? implode("<br />", $message) : $message;

            $data .= '<div class="alert alert-'.$tur.'">';
            $data .= $message;
            $data .= '</div>';
            
            session()->set(["status" => null, "message" => null]);
        }

        return $data;
    }

}

