<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;


class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->orderBy('created_at', 'desc')->paginate(7);    // 新しい順に7件ずつ取得

        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')
            ->keywordSearch($request->keyword)
            ->genderSearch($request->gender)
            ->categorySearch($request->category_id)
            ->dateSearch($request->date)
            //  上の部分はそれぞれローカルスコープを使用して検索
            ->orderBy('created_at', 'desc')
            ->paginate(7)
            ->appends($request->query());   //2ページ目に行くときに条件が消えないようにURLを引き継ぐ

        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function reset()
    {
        return redirect('/admin');
    }

    public function destroy(Request $request)
    {
        //  もし削除対象のID番号がデータベースにない場合404エラーを返すためfindOrFailを使用
        $contact = Contact::findOrFail($request->id);
        $contact->delete();

        return redirect('/admin');
    }

    //  エクスポート機能の実装
    public function export(Request $request)
    {
        //  ファイル名がcontacts_年月日
        $fileName = 'contacts_' . now()->format('Ymd_His') . '.csv';

        // ローカルスコープを利用
        $contacts = Contact::with('category')
            ->keywordSearch($request->keyword)
            ->genderSearch($request->gender)
            ->categorySearch($request->category_id)
            ->dateSearch($request->date)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->streamDownload(
            function () use ($contacts) {
                $handle  = fopen('php://output', 'w');
                //  excelで表示された時日本語が文字化けするのを対策
                $convert = fn($value) => mb_convert_encoding($value, 'SJIS-win', 'UTF-8');

                //  出力情報の各名前
                fputcsv($handle, array_map($convert, [
                    'お名前',
                    '性別',
                    'メールアドレス',
                    '電話番号',
                    '住所',
                    '建物名',
                    'お問い合わせの種類',
                    'お問い合わせ内容',
                    '作成日',
                ]));

                $genderLabel = [1 => '男性', 2 => '女性', 3 => 'その他'];

                // 名前に対応したデータが下に出る
                foreach ($contacts as $c) {
                    $row = [
                        $c->last_name . ' ' . $c->first_name,
                        $genderLabel[$c->gender] ?? '',
                        $c->email,
                        $c->tel,
                        $c->address,
                        $c->building,
                        optional($c->category)->content,
                        $c->detail,
                        $c->created_at->format('Y-m-d'),
                    ];

                    fputcsv($handle, array_map($convert, $row));
                }

                fclose($handle);
            },
            $fileName,
            [
                'Content-Type' => 'text/csv; charset=Shift_JIS',
            ]
        );
    }
}
