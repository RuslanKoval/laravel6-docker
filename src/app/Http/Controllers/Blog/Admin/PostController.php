<?php

namespace App\Http\Controllers\Blog\Admin;
use App\Http\Controllers\Blog\BaseController;
use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Jobs\TestJob;
use App\Models\Blog\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPost\BlogPostSearchInterface;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;

/**
 * Class PostController
 * @property BlogPostRepository $blogPostRepository
 */
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
    public function index(Request $request)
    {
        $paginator = $this->blogPostRepository->getAllWithPaginate(10);

//        $page = $request->get('page') ?? 1;
//        $paginator =  \Cache::remember('users-'.$page, 200, function () {
//            return $this->blogPostRepository->getAllWithPaginate(10);
//        });

        return view('blog.admin.posts.index', compact('paginator'));
    }

    /**
     * @param BlogCategoryRepository $blogCategoryRepository
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(BlogCategoryRepository $blogCategoryRepository)
    {
        $item = new BlogPost();
        $categoryList = $blogCategoryRepository->getCategoryList();

        return view('blog.admin.posts.create', compact('item', 'categoryList'));
    }


    /**
     * @param BlogPostCreateRequest  $request
     * @param BlogCategoryRepository $blogCategoryRepository
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogPostCreateRequest $request, BlogCategoryRepository $blogCategoryRepository)
    {
        $data = $request->input();

        $item = (new BlogPost())->create($data);

        if ($item) {
            return redirect()
                ->route('blog.admin.posts.edit', $item->id)
                ->with(['success' => 'Сохранено']);
        } else {
            return back()
                ->withErrors([
                    'msg' => "Ошибка"
                ])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(111);
    }


    /**
     * @param                        $id
     * @param BlogCategoryRepository $blogCategoryRepository
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, BlogCategoryRepository $blogCategoryRepository)
    {
        $item = $this->blogPostRepository->getEdit($id);

        if (empty($item)) {
            abort(404);
        }

        $categoryList = $blogCategoryRepository->getCategoryList();

        return view('blog.admin.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * @param BlogPostUpdateRequest   $request
     * @param                         $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->blogPostRepository->getEdit($id);
        if (empty($item)) {
            return back()
                ->withErrors([
                    'msg' => "Запись {$id} не найдена"
                ])
                ->withInput();
        }
        $data = $request->input();

        $result = $item
            ->fill($data)
            ->save();

        if ($result) {
            return redirect()
                ->route('blog.admin.posts.edit', $item->id)
                ->with(['success' => 'Сохранено']);
        } else {
            return back()
                ->withErrors([
                    'msg' => "Ошибка"
                ])
                ->withInput();
        }
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result = BlogPost::destroy($id); //soft delete
//        $result = BlogPost::find($id)->forceDelete(); //Удалить с базы

        if ($result) {
            return redirect()
                ->route('blog.admin.posts.index')
                ->with(['success' => 'Удалено']);
        }

        return back()->withErrors([
            'msg' => "Ошибка"
        ]);
    }
}
