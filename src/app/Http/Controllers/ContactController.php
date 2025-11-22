<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();
        return view('confirm', compact('inputs'));
    }

    public function send(ContactRequest $request)   // フォーム送信処理のためsendで命名
    {
        $action = $request->input('action');
        $inputs = $request->except('action', '_token');   // action と _token 以外の入力値だけを取り出す

        // 「修正する」ボタンが押された場合入力値を持ったままフォーム画面に戻る
        if ($action === 'back') {
            return redirect('/')->withInput($inputs);
        }
        // 「送信する」押されたときの処理
        $data = $request->validated();    //  バリデーションチェックを通過したデータのみ保存
        $tel = $data['tel1'] . $data['tel2'] . $data['tel3'];   // 電話番号を結合

        Contact::create([
            'category_id' => $data['category_id'],
            'last_name'   => $data['last_name'],
            'first_name'  => $data['first_name'],
            'gender'      => $data['gender'],
            'email'       => $data['email'],
            'tel'         => $tel,
            'address'     => $data['address'],
            'building'    => $data['building'] ?? null,     //  buildingに値があればそのまま通し空ならnullをいれる
            'detail'      => $data['detail'],
        ]);
        return view('thanks');
    }
}
