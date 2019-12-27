<?php

namespace App\Http\Controllers\Blog;
use App\Repositories\BlogPost\BlogPostSearchInterface;
use App\Repositories\BlogPostRepository;
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
    public function index(Request $request, BlogPostSearchInterface $blogPostSearch)
    {
//        \Log::channel('custom')->info(1);
//        \Log::channel('custom')->error(2);
//        \Log::channel('custom')->debug(3);
//        \Log::channel('custom')->notice(4);
//        \Log::channel('custom')->warning(5);
//        \Log::channel('custom')->critical(6);

//        \Log::channel('logstash')->critical("My first log");

        $client = new \phpcent\Client("centrifugo:8000/api");
        $client->setApiKey("cf8b594b-ec4d-409f-86f4-fc4b067e1098");

        $search = $request->input('search');
        $perPage = $request->input('per-page') ?? 5;

        if ($search) {
            $items = $blogPostSearch
                ->search($search)
                ->paginate($perPage);
        } else {
            $items = $this
                ->blogPostRepository
                ->getAllWithPaginate($perPage);
        }


        $client->publish("news", $items);

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
