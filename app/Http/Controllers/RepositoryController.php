<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ShowRepository;

class RepositoryController extends Controller
{
    
    public function index($category,$slug)
    {
        $showrepository = new ShowRepository();
        
        if($category =="Publications"){

            $repository=$showrepository->journalDetailsSlug($slug);
            return view('repository.journals',compact('repository'));

        }
        elseif($category == "Books"){
            

            $repository=$showrepository->booksDetailsSlug($slug);

            return view('repository.books',compact('repository'));

        }
        else{

            $repository=$showrepository->researchDetailsSlug($slug);

            return view('repository.research',compact('repository')); 

        }       

    }
    
    public function repositoryDownload($title,$filename)
    {   
        $path=public_path().'/uploads/'.$filename;
        
        return response()->download($path, $title);
    }
}
