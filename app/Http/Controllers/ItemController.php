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

           /*  // アップロードされたファイルを取得
                $image = $request->file('image');

                // storage/app/public/images に画像を保存
                $path = $image->store('images', 'public');

                // 保存された画像のパスを返す
                return $path; */


            return redirect('/items');
        }

        return view('item.add');
    }

    /**
     * レシピ編集・削除
     */
    public function edit(Request $request , $id)
    {

        //idに該当するデータを取得
        $item = Item::find($request->id);

        //ビューを返す
        return view('item.edit', compact('item'));
    }

     /**
        * 編集したデータを登録
        */

    public function update(Request $request,$id)
    {
        // アイテムの更新
        $item = new Item();
        $item = Item::findOrFail($id);
        //$price=str_replace(['￥',','],'',$request->cost_per_meal);

        // アイテムの更新
        $item->update([
            'name'=>$request->name,
            'type'=>$request->type,
            'season'=>$request->season,
            'duration_in_minutes'=>$request->duration_in_minutes,
            'cost_per_meal'=>$request->cost_per_meal,
            'detail'=>$request->detail,
        ]);

        // リダイレクト
        return view('item.edit', compact('item'));
    }

    // データを削除
    public function delete(Request $request)
    {
        $item = Item::find($request->id);
        $item->delete();

        return redirect('/items');
    }


    /**
     * レシピ詳細表示
     */
    public function detail($id)
    {
        $item = Item::find($id);
        return view('item.detail', [
            'item' => $item,
        ]);
    }
}
