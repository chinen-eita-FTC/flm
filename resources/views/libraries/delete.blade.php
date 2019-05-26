<div>
  <form method="POST" action="/library/delete" class="table-form">
    {{ csrf_field() }}
    <div class="modal_title">
      <p >削除確認画面</p>
    </div>
    <p>以下の蔵書情報を削除してもよろしいですか？</p>
    <table>
        <tr>
          <th>蔵書名</th>
          <td>{{$name}}</td>
        </tr>
        <tr>
          <th>発行日</th>
          <td>{{$publishedAt}}</td>
        </tr>
        <tr>
          <th>ジャンル</th>
          <td>000-0000-0000</td>
        </tr>
        <tr>
          <th>ISBNコード</th>
          <td>{{$isbnCode}}</td>
        </tr>
    </table>
    <input type="hidden" name="id" value="{{$id}}">
    <div class="button_box">
      <input type="submit" value="削除" class="button button-danger quarter-width">
      <input type="button" value="キャンセル" onclick="cancelDelete()" class="button button-cancel quarter-width">
    </div>
  </form>
</div>