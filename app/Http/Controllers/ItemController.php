<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * レシピ一覧
     */
    public function index(Request $request)
    {   
        // 検索キーワードを取得
        $keyword = $request->input('keyword');
         // カテゴリーを取得
        $type = $request->input('type');

         // キーワードとカテゴリーが空かどうかをチェック
        if (empty($keyword) && empty($type)){
            // キーワードとカテゴリーがない場合は全てのアイテムを新しい順に取得   
            $items = item::orderBy('updated_at', 'desc')->paginate(10);
            
            // キーワードのみがある場合は、そのキーワードで検索
            } else if(!empty($keyword) && empty($type)){
            $items = Item::where('name', 'LIKE', "%{$keyword}%")
                ->orwhere('type','LIKE', "%{$keyword}%")
                ->orderBy('updated_at', 'desc')->paginate(10);

            // キーワードとカテゴリー両方がある場合は、そのキーワードで検索
            } else if (!empty($keyword) && !empty($type)) {
            $items = Item::where('name', 'LIKE', "%{$keyword}%")
                ->orwhere('type','LIKE', "%{$keyword}%")
                ->where('type', $type)
                ->orderBy('updated_at', 'desc')->paginate(10);

            // カテゴリーのみがある場合は、そのカテゴリーで検索
            } else {
            $items = Item::where('type', $type)
                ->orderBy('updated_at', 'desc')->paginate(10);
            }

            // 検索結果をビューに渡す
            return view('item.index', [
                'items' => $items,
                'keyword' => $keyword,
                'type'=> $type
        ]);
    }     

    /**
     * レシピ登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // レシピ登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'season' => $request->season,
                'duration_in_minutes' => $request->duration_in_minutes,
                'cost_per_meal' => $request->cost_per_meal,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    /**
     * レシピ編集・削除
     */
    public function edit($id)
    {

        //idに該当するデータを取得
        $items = Item::find($id);

        //ビューを返す
        return view('item.edit', compact('items'));
    }

    /**
     * レシピ詳細表示
     */
    public function detail($id)
    {
        //idに該当するデータを取得
        $items = Item::find($id);

        //ビューを返す
        return view('item.detail', compact('items'));
    }
}
