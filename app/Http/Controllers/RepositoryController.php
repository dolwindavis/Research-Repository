<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use App\Journal;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Helpers\ShowRepository;
use App\ResearchProject;

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
        if(Auth::user()){

            $path=public_path().'/uploads/'.$filename;
        
            return response()->download($path, $title);
            
        } 
        
    }

    public function searchUsers(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(User::class,'name')
            ->search($request->q);

        $searchResults->each(function($item,$key)use(&$searchResults){

            if($item->searchable->role == "admin"){

                $searchResults->forget($key);

            }

        });
        dd($searchResult);
        return $searchResults->toJson();
    }

    public function searchRepo(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Journal::class, 'title')
            ->registerModel(Book::class, 'title')
            ->registerModel(ResearchProject::class, 'title')            
            ->search($request->q);
        
        return $searchResults->toJson();
    }
}
