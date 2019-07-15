<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\File;
use App\Http\Requests\UploadFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\FileMessage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return view('admin.files.index', compact('files'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadFile $request)
    {
        $input = $request->all();
        if($file = $request->file('file')){
          $time = time();
          $user = Auth::user();
          $dp_number = "DP".$user->provider->number;
          $input['file'] = $name = $dp_number."_".$time."_".$file->getClientOriginalName();
          $input['original_name'] = $file->getClientOriginalName();
          $input['change_name'] = $change_name = $dp_number."_".$time."_CODE_CHANGE".".csv";
          $input['hashed_name'] = $hashed_name = $dp_number."_".$time."_HASHED".".csv";
          //$file->move('base_path', $name);
          $path = $request->file('file')->storeAs('data_provision', $name);
        }

        $user = Auth::user();
        $input['user_id'] = $user->id;
        $input['provider_id'] = $user->provider_id;
        File::create($input);

        $original = fopen('../storage/app/'.$path,"r");

        $i=0;
        while(!feof($original)) {
          $original_data[$i] = fgetcsv($original,0,",");
          $i++;
        }
        fclose($original);

        $l=0;
        foreach($original_data as $row_original) {
          if(!empty($row_original)) {
            $clean_data[$l] = $row_original;
            $l++;
          }
        }

        $hashed_data = $clean_data;
        $code_change[0][0] = "Original key";
        $code_change[0][1] = "Hashed key";

        $j=0;
        foreach($clean_data as $row) {
          $k=0;
          foreach($row as $cell) {
            if($k==0 && $j!=0) {
              $code_change[$j][0] = $hashed_data[$j][0];
              $code_change[$j][1] = $hashed_data[$j][0] = "PRV_2_".sha1($cell);
            }
            $k++;
          }
          $j++;
        }

        $hashed = fopen("../storage/app/transfer_to_db/".$hashed_name,"w");
        foreach ($hashed_data as $line)
          {
          fputcsv($hashed,$line,",");
          }
        fclose($hashed);


        $change = fopen("../storage/app/code_change/".$change_name,"w");
        foreach ($code_change as $line)
        {
            fputcsv($change,$line,",");
        }
        fclose($change);

        $data = [
            'dp_number'=>$dp_number,
            'illness'=>$request->illness,
            'file_message'=>$request->file_message
        ];

        Mail::send('emails.new_file', $data, function($message){
            $message->from('it@synapse-managers.com', 'Harmony Data Transfer Area');
            $message->to('it@synapse-managers.com','Harmony Data Transfer Area');
            $message->subject('New .csv file received on the Harmony Data Transfer Area');
        });

        // Storage::delete($path); //Deletes original files.

        return redirect('/')->with('success','Your file has been successfuly uploaded.');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function graph()
    {
    $viewData = $this->loadViewData();

    return view('graph', $viewData);
    }

}
