<!-- Modal -->
<div class="modal fade" id="deleteTodoModal{{ $todo->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteTodoModalLabel{{ $todo->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="deleteTodoModalLabel{{ $todo->id }}">{{ $todo->content }}を削除しますか？</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <form action="{{ route('goals.todos.destroy', [$goal, $todo]) }}" method="post">
          @csrf
          @method('delete')          
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">キャンセル</button>
          <button type="submit" class="btn btn-danger">削除</button>
        </form>
      </div>
    </div>
  </div>
</div>