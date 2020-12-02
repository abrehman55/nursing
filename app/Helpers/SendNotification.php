<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class SendNotification{

  public static function  sendPushNotification($user, $request)
    {
        // $event_json = json_decode($_GET["p"],true); 
        $tokon=$user->firebase_token;//$event_json['receiverid'];
        $title=Auth::user()->name;
        $message=$request->txt;
        $icon="";
        $senderid="";
        $receiverid="";
        $action_type="";
        
        
        $notification['to'] = $tokon;
        $notification['notification']['title'] = $title;
        $notification['notification']['body'] = $message;
        // $notification['notification']['text'] = $sender_details['User']['username'].' has sent you a friend request';
        $notification['notification']['badge'] = "1";
        $notification['notification']['sound'] = "default";
        $notification['notification']['icon'] = "";
         $notification['notification']['image'] = "";
        $notification['notification']['type'] = "";
        
        $notification['data']['title'] = $title;
        $notification['data']['body'] = $message;
        $notification['data']['icon'] = $icon;
        $notification['data']['senderid'] = $senderid;
        $notification['data']['receiverid'] = $receiverid;
        $notification['data']['action_type'] = $action_type;    
        
     self::sendPushNotificationToMobileDevice(json_encode($notification));  
    }
    
    public static function sendPushNotificationToMobileDevice($data)
    {
         
        
      
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "authorization: key= AAAA8OOjoCQ:APA91bHMZF9Ruk5WIXU2hx4y77h4VrTEKcKCr5UhD9VoNyxIADlsxN5kE4ydp8FCT_OHWt7dpMwNoxB0sZnbd1dymUgVO5g2iAXumayOVLgp2niQ8w3AeNxrI5BmsKW6sX4SVBeZJ1Dl",
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: 85f96364-bf24-d01e-3805-bccf838ef837"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) 
        {
        //   print_r($err);
        } 
        else 
        {
            // print_r($response);
        }
    }
}