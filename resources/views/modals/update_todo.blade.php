<!-- Modal -->
<div class="modal fade" id="updateTodoModal{{ $todo->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateTodoModalLabel{{ $todo->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="updateTodoModalLabel{{ $todo->id }}">Todoの更新</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{ route('goals.todos.update', [$goal, $todo]) }}" method="post">
          @csrf
          @method('patch')
          <div class="modal-body">
          <input type="text" class="form-control" name="content" value="{{ $todo->content }}">
          <div class="d-flex flex-wrap">
            @foreach ($tags as $tag)
            <label>
              <div class="d-flex align-items-center mt-3 me-3 mb-3">
                @if ($todo->tags()->where('tag_id',$tag->id)->exists())
                <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}"checked>
                @else
                <input type="checkbox" name="tag_ids[]" value=""{{ $tag->id }}>
                @endif
                <span class="badge bg-secondary ms-1 fw-light"> {{ $tag->name }}</span>
              </div>
            </label>
            @endforeach
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-primary">更新</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>