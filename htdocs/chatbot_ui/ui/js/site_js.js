
  function shownews(id)
  {
    $.post("news.php",{postid:id},function (data) {
      var w = window.open('_blank');
      w.document.open();
      w.document.write(data);
      w.document.close();
    });
  }