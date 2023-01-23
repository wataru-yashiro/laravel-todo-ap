<!-- Modal -->
<div class="modal fade" id="addTodoModal{{ $goal->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTodoModalLabel{{ $goal->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="addTodoModalLabel{{ $goal->id }}">目標の更新</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{ route('goals.todos.store', $goal) }}" method="post">
          @csrf
          <div class="modal-body">
          <input type="text" class="form-control" name="content">
          <div class="d-flex flex-wrap">
            @foreach($tags as $tag)
            <label>
              <div class="d-flex align-items-center mt-3 me-3 mb-2">
                <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}">
                <span class="badge bg-secondary ms-1">{{ $tag->name }}</span>
              </div>
            </label>
            @endforeach
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-primary">作成</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>