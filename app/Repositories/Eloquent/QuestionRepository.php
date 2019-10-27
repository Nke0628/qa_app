<?php

namespace App\Repositories\Eloquent;

use App\Repositories\QuestionRepositoryInterface;
use App\Questions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class QuestionRepository implements QuestionRepositoryInterface
{
    /**
     * 投稿された質問を作成します。
     *
	 * @param $request
	 * @return Illuminate\Database\Eloquent\Model
     */
    public function storeQuestion($request)
    {
        //トランザクション開始
        DB::beginTransaction();
        try{
            $question = new Questions;

            //画像処理          
            if(!empty($request0->file['photo'])){
                $file_name = $request->file('photo')->store('public/question_images');
                $question->image_path = $file_name;
            }

            $question->user_id = Auth::id();
            $question->title = $request->title;
            $question->content = $request->content;
            $question->delete_flag = 0;
            $question->category_id = $request->category;
            $question->save();

            //トランザクションコミット
            DB::commit();

            return $question;

        }catch(\Exception $e){
            //エラー時にはロールバック
            DB::rollback();
            Log::critical($e->getMessage());
            return false;
        }
    }
}
