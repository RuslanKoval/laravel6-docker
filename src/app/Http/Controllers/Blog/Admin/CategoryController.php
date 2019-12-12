<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\Blog\BlogCategory;
use App\Repositories\BlogCategoryRepository;

/**
 * Class CategoryController
 * @property BlogCategoryRepository $blogCategoryRepository
 */
class CategoryController extends Controller
{
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $paginator = $this->blogCategoryRepository->getAllWithPaginate(5);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->blogCategoryRepository->getCategoryList();
        return view('blog.admin.categories.create', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogCategoryCreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogCategoryCreateRequest $request)
    {

        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = str_slug($data['title']);
        }

//        $item = new BlogCategory($data);
//          $result = $item->save();

        $item = (new BlogCategory())->create($data);


        if ($item) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
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
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param                        $id
     * @param BlogCategoryRepository $blogCategoryRepository
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //       $item[] = BlogCategory::find($id); //null
        //       $item[] = BlogCategory::where(['id' => $id])->first(); //null
        //       $item[] = BlogCategory::findOrFail($id); //404
        //       $collect = collect($item)->pluck('id');

        $item = $this->blogCategoryRepository->getEdit($id);

        if (empty($item)) {
            abort(404);
        }

        $categoryList = $this->blogCategoryRepository->getCategoryList();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }


    /**
     * @param BlogCategoryUpdateRequest $request
     * @param                           $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        //        $rules = [
        //          'title' => 'required|min:5|max:200',
        //          'slug' => 'max:200',
        //          'description' => 'string|min:5',
        //          'parent_id' => 'required|integer|exists:blog_categories,id',
        //        ];

        //        $validate = $this->validate($request, $rules);
        //        $validate = $request->validate($rules);

        //        $validator = \Validator::make($request->all(), $rules);
        //        $validateData[] =  $validator->passes();
        //        $validateData[] =  $validator->validate();
        //        $validateData[] =  $validator->valid();
        //        $validateData[] =  $validator->errors();
        //        $validateData[] =  $validator->fails();
        //        $validateData[] =  $validator->failed();


        $item = BlogCategory::find($id);
        if (empty($item)) {
            return back()
                ->withErrors([
                    'msg' => "Запись {$id} не найдена"
                ])
                ->withInput();
        }
        //        $data = $request->all();
        $data = $request->input();

        if (empty($data['slug'])) {
            $data['slug'] = str_slug($data['title']);
        }

        $result = $item
            ->fill($data)
            ->save();

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
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
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
