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
　　　});

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


/********************************************
ハンバガーメニューの設定
*********************************************/

    //クリック時の設定
    //-------------------------------------------
    function toggleNav() {
        let body = document.body;
        let $hamburger = $('#js-hamburger');

        $hamburger.on('click', function() {
            body.classList.toggle('nav-open');
        });
    }

    toggleNav();


/********************************************
セッションメッセージ
*********************************************/

    //セッションメッセージをフェードアウト表示
    //-------------------------------------------
    $('.flash_message').slideUp(2000,'slow');


/********************************************
退会画面
*********************************************/

    //退会時のポップアップ表示
    //-------------------------------------------
    $unsubscribe = $('.js-unsubscribe');
    $unsubscribe.on('click',function(e){
        e.preventDefault();
        if(confirm('本当に退会しますか？')){
            $('.js-unsubscribe-form').submit();        
        }
    })
});
