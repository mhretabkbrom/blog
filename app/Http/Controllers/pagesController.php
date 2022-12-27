<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller{
    public function getIndex(){
        $posts = Post::orderBy('created_at','asc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);

        #process variable data or params
        #talk to the model
        #recieve from the model
        #compile or process data from the model if needed
        #pass that data to the correct view
    }
        public function getAbout(){
          $first='Alex';
          $last='Curtis';
          
          $fullname=$first ."". $last;
          $email='alex@jacurtis.com';
          $data= [];
          $data['email']=$email;
          $data['fullname']=$fullname;


       return view('pages.about')->withData($data);
    }
    public function getContact(){

        return view('pages.Contact');

    }
    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10']);

            $data = array(
                'email' => $request->email,

                'subject' => $request->subject,
                'bodyMessage'=> $request->message
            );
        Mail::send('emails.contact', $data, function($message) use ($data){
           $message->from($data['email']);
           $message->to('hello@devmarketer.io');
           $message->subject($data['subject']);
        });
        Session::flash('success', 'Your Email was Sent!');
        
        return redirect('/');
        
    }


}