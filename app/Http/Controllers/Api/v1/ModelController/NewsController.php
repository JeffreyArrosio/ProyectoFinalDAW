<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\News;
use App\Policies\NewsPolicy;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Orion\Concerns\DisablePagination;

class NewsController extends Controller
{
    use DisablePagination;

    protected $model = News::class;
    protected $policy = NewsPolicy::class;

    public function store(Request $request)
    {
        $request->validate([
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->date = $request->date;
        $news->type = $request->type;
        $news->urgent = $request->urgent ?? 0;
        $news->premium = $request->premium ?? 0;
        $news->user_id = $request->user_id;
        $news->category_id = $request->category_id;

        $path = $request->file('main_image')->store('news', 'public');
        $news->main_image = $path;

        $news->save();

        return response()->json($path, 201);
    }
}
