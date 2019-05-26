var showBookModal = function showBookModal(url, book){
  $.ajax({
      url:url,
      type:'GET',
      data:{
        'id':book.id,
        'name':book.name,
        'published_at':book.published_at,
        'isbn_code':book.isbn_code
    }
  })
  .done( (data) => {
    var $modalBox = $("#modal-box");
    $("#modal-overlay").removeClass("hidden");
    $("#modal-box").html(data)
    .removeClass("hidden")
    .css("top", ( $(window).height() - $modalBox.height() ) / 2+$(window).scrollTop() + "px")
    .css("left", ( $(window).width() - $modalBox.width() ) / 2+$(window).scrollLeft() + "px");
  })
  .fail( (data) => {
      console.log('モーダルウィンドウの表示に失敗しました。');
  })
  .always( (data) => {

  });
};

var cancelModal = function cancelModal(){
  $("#modal-overlay").addClass("hidden");
  $("#modal-box").html("").addClass("hidden");
}