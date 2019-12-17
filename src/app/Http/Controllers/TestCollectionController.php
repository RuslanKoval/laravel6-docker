<?php

namespace App\Http\Controllers;

use App\Models\Blog\BlogPost;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collection()
    {
       $eloquentCollection = BlogPost::withTrashed()->get();

       $collection = collect($eloquentCollection->toArray());

//       $result['first'] = $collection->first();
//       $result['last'] = $collection->last();
//       $result['collection_where'] = $collection
//           ->where('category_id', 5)
//           ->values()
//           ->keyBy('id');
//        $result[] = $result['collection_where']->count();
//        $result[] = $result['collection_where']->isEmpty();
//        $result[] = $result['collection_where']->isNotEmpty();
//        $result['first_where'] = $collection->firstWhere('category_id', '>', 5);
//        $result['map'] = $collection->map(function ($item) {
//            return [
//                'id' => $item['id'],
//                'exist' => is_null($item['deleted_at'])
//            ];
//        });
//        $result['not_exist'] = $result['map']
//            ->where('exist', '=', false)
//            ->values()
//            ->keyBy('id');

        $collection->transform(function ($item) {
            $item['created'] = Carbon::parse($item['created_at']);
            return $item;
        });
//        $newItem = new \stdClass();
//        $newItem->id = 9999;
//        $collection->prepend($newItem); // в начало
//        $collection->push($newItem); // в конец
//        $collection->pull(1); // забрать по ключу


//Фильтрация
//        $filter = $collection->filter(function ($item) {
//           $byDay = $item['created']->isFriday();
//           $byDate = $item['created']->day == 15;
//           $result = $byDay && $byDate;
//           return $result;
//        });

       // $sort = $collection->sortByDesc('created');


       dd($collection);

    }

}
