<?php

namespace App\Helpers;

use App\Book;
use App\Department;
use App\User;
use App\Upload;
use App\Journal;
use App\ResearchProject;
use Illuminate\Support\Facades\Auth;



class ShowRepository 
{
    
    public function __construct()
    {
        $this->repository = collect();
        $this->user=Auth::user();
    }

    function makeAuthRepository()
    {

        $authjournals =$this->user->journals()->get();

        $authbooks = $this->user->books()->get();
       
        $authjournals->each(function($item,$key){

            $item->publishdate=$this->sortPublishDate($item);

            $item->repositorycategory= "Publication";

            $this->repository->push($item);

        });

        $authbooks->each(function($item,$key){

            $item->publishdate=$this->sortPublishDate($item);

            $item->repositorycategory= "Books";

            $this->repository->push($item);
        });

        // return $authjournals;

        return $this->repository;
    }


    public function countRepository()
    {
        // $user=Auth::user();

        $journals=$this->user->journals()->count();

        $books=$this->user->books()->count();

        $totalRepository = collect();

        $totalRepository->push($journals);
        $totalRepository->push($books);
        // $totalRepository->push($projects);


        $totalRepository->push(0);
        


        return $totalRepository;
        
    }
    
    public function makeJournalsRepository()
    {
        $journals=$this->user->journals()->get();

        $journals->each(function($item,$key){

            $item->publishdate=$this->sortPublishDate($item);

            $item->repositorycategory= "Publication";

        });

        return $journals;
        
    }

    public function makeBooksRepository()
    {
        $books=$this->user->books()->get();

        $books->each(function($item,$key){

            $item->publishdate=$this->sortPublishDate($item);

            $item->repositorycategory= "Books";

        });

        return $books;
        
    }
    public function makeResearchRepository()
    {
        $researchs=$this->user->researchprojects()->get();

        $researchs->each(function($item,$key){

            // $item->publishdate=$this->sortPublishDate($item);

            $item->authorship = $item->user_role;
            $item->repositorycategory= "Research Projects";

        });

        return  $researchs;
        
    }

    public function journalDetailsSlug($slug)
    {

        $journal = Journal::where('slug',$slug)->first();

        $journal->publishdate=$this->sortPublishDate($journal);

        $upload=Upload::where('work_id',$journal->id)->first();

        $journal->upload=$upload;

        return $journal;

    }

    public function booksDetailsSlug($slug)
    {

        $book = Book::where('slug',$slug)->first();

        $book->publishdate=$this->sortPublishDate($book);

        $upload=Upload::where('work_id',$book->id)->first();

        $book->upload=$upload;

        return $book;

    }

    public function researchDetailsSlug($slug)
    {

        $research = ResearchProject::where('slug',$slug)->first();

        // $book->publishdate=$this->sortPublishDate($book);

        $upload=Upload::where('work_id',$research->id)->first();

        $research->department = Department::findOrFail($research->department_id)->value('name');

        $research->upload=$upload;


        return $research;

    }

    public function totalRepositoryCount()
    {
        
        $totalRepository = collect();

        $totalRepository->push(Book::all()->count());
        $totalRepository->push(Journal::all()->count());
        $totalRepository->push(ResearchProject::all()->count());
        $totalRepository->push(User::where('role','faculty')->get()->count());
        return $totalRepository;



    }


    public function bookRepository()
    {
        $books=Book::with('user')->get();

        $books->each(function($item,$key){

            $item->publishdate=$this->sortPublishDate($item);

            $item->repositorycategory= "Books";

        });
        return $books;
    }

    public function journalsRepository()
    {
        $journals=Journal::with('user')->get();

        $journals->each(function($item,$key){

            $item->publishdate=$this->sortPublishDate($item);

            $item->repositorycategory= "Publications";

        });
        return $journals;
    }

    public function researchRepository()
    {
        $research=ResearchProject::with('user')->get();

        $research->each(function($item,$key){

            // $item->publishdate=$this->sortPublishDate($item);

            $item->repositorycategory= "Research Project";

            $item->authorship = $item->user_role;

        });
        return $research;
    }

    public function repository()
    {
        $journals=Journal::with('user')->get();

        $books=Book::with('user')->get();
        
        $research =ResearchProject::with('user')->get();


        $journals->each(function($item,$key){

            $item->publishdate=$this->sortPublishDate($item);

            $item->repositorycategory= "Publications";

            $this->repository->push($item);

        });

        $books->each(function($item,$key){

            $item->publishdate=$this->sortPublishDate($item);

            $item->repositorycategory= "Books";

            $this->repository->push($item);
        });

        $research->each(function($item,$key){

            // $item->publishdate=$this->sortPublishDate($item);

            $item->repositorycategory= "Research Project";

            $item->authorship = $item->user_role;

            $this->repository->push($item);
        });

        
        return $this->repository;

    }


    function sortPublishDate($item){

        if(is_null($item->date) && $item->month != null){

           
            $publishdate =$item->month.'-'.$item->year;

        }
        elseif($item->date == null && $item->month == null){

            $publishdate =$item->year;
        }
        else{

            $publishdate =$item->date.'-'.$item->month.'-'.$item->year;

        }

        return $publishdate;
    }
}
