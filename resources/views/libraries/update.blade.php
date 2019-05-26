<div>
    <form method="POST" action="/library/update" class="table-form">
      {{ csrf_field() }}
      <div class="modal_title">
        <p>蔵書更新画面</p>
      </div>
      <p>更新したい項目を編集し、更新ボタンを押してください。</p>
      <table>
          <tr>
            <th>蔵書名</th>
            <td><input type="text" name="name" value="{{$name}}"></td>
          </tr>
          <tr>
            <th>発行日</th>
            <td><input type="text" name="published_at" value="{{$publishedAt}}"></td>
          </tr>
          <tr><th>ジャンル</th>
            <td><ul class="button-ajust-left flex-wrap">
              <li><label><input type="radio" name="" checked="">指定なし</label></li>
              <li><label><input type="radio" name="">Java</label></li>
              <li><label><input type="radio" name="">PHP</label></li>
              <li><label><input type="radio" name="">Python</label></li>
            </ul></td>
          </tr>
          <tr>
            <th>ISBNコード</th>
            <td><input type="text" name="isbn_code" value="{{$isbnCode}}"></td>
          </tr>
      </table>
      <input type="hidden" name="id" value="{{$id}}">
      <div class="button_box">
        <input type="submit" value="更新" class="button button-default quarter-width">
        <input type="button" value="キャンセル" onclick="cancelModal()" class="button button-cancel quarter-width">
      </div>
    </form>
  </div>