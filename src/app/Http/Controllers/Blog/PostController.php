<?php

namespace App\Http\Controllers\Blog;
use App\Repositories\BlogPostRepository;
use Faker\Generator;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    private $blogPostRepository;

    public function __construct()
    {
        parent::__construct();
        $this->blogPostRepository = app(BlogPostRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Generator $faker)
    {
//        \Log::channel('custom')->info(1);
//        \Log::channel('custom')->error(2);
//        \Log::channel('custom')->debug(3);
//        \Log::channel('custom')->notice(4);
//        \Log::channel('custom')->warning(5);
//        \Log::channel('custom')->critical(6);

//        \Log::channel('logstash')->critical(6);


        $items = $this->blogPostRepository->getAllWithPaginate(3);

        return $items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
