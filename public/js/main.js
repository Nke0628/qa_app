$(function(){

/********************************************
コメント編集/削除
*********************************************/

    //編集用ポップアップ表示
    //-------------------------------------------
    $commentEdit = $('.js-comment-edit');
    $commentEdit.on('click',function(e){
	    $commentEditDetail = $(this).siblings('.comment-edit-detail');
        $commentEditDetail.toggle();


    //削除クリック時の確認
    //-------------------------------------------
    $commentDelete = $('.js-comment-delete');
    $commentDelete.on('click',function(e){
    	e.preventDefault();
       	e.stopPropagation();
       	$commentDeleteForm = $commentDelete.parent('.js-comment-delete-form')
    	if(confirm('このコメントを削除しますか?')){
    		$commentDeleteForm.submit();
    	}
    });

});


});
