$(function() {
  /********************************************
コメント編集/削除
*********************************************/

  //編集用ポップアップ表示
  //-------------------------------------------
  $commentEdit = $('.js-comment-edit');
  $commentEdit.on('click', function(e) {
    $commentEditDetail = $(this).siblings('.comment-edit-detail');
    $commentEditDetail.toggle();
  });

  //削除クリック時の確認
  //-------------------------------------------
  $commentDelete = $('.js-comment-delete');
  $commentDelete.on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $commentDeleteForm = $commentDelete.parent('.js-comment-delete-form');
    if (confirm('このコメントを削除しますか?')) {
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
  $('.flash_message').slideUp(2000, 'slow');

  /********************************************
退会画面
*********************************************/

  //退会時のポップアップ表示
  //-------------------------------------------
  $unsubscribe = $('.js-unsubscribe');
  $unsubscribe.on('click', function(e) {
    e.preventDefault();
    if (confirm('本当に退会しますか？')) {
      $('.js-unsubscribe-form').submit();
    }
  });

  /********************************************
社員検索
*********************************************/

  //社員検索機能
  //---
  var targetList = [];
    
  $searchButton = $('.js-search-button');
  $searchButton.on('click', function(e) {
    e.preventDefault();

    $kekkinName = $('.js-kekkin-name');
    $kekkinBusyo = $('.js-kekkin-busyo');
    $dialogNameList = $('.js-dialog-namelist');

    var data = {};
    data['kbn'] = 1;
    var that = $(this);

    $.ajax({
      type: 'GET',
      url: '/questions/getShain',
      data: data,
      dataType: 'json',
      success: function(data) {
        console.log(data);
        var length = data.length;
        if (length === 1) {
          var { id, name, busyo } = data[0];
          $kekkinName.text(id + ' / ' + name);
          $kekkinBusyo.text(busyo);
        } else if (length > 1) {
          $dialogNameList.html('');
          _showDialog();
          $.each(data, function(index, value) {
            $dialogNameList.append(
              '<div class="dialog__item">' +
                value.id +
                value.name +
                value.busyo +
                '</div>'
            );
          });
        }
      },
      error: function(e) {},
    });
  });

  //ダイアログ時のクリックイベント
    $dialogItem = $('.dialog__item');
    $dialogItem.on('click', functin(e){

    })
});

function _showDialog() {
  $dialog = $('.dialog');
  $dialog.toggleClass('dialog--isshow');
}
