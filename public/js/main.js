$(function(){

/********************************************
コメント編集
*********************************************/
$commentEdit = $('.js-comment-edit');
$commentEdit.on('click',function(){
	$commentEditDetail = $(this).siblings('.comment-edit-detail');
    $commentEditDetail.toggle();
});


});
