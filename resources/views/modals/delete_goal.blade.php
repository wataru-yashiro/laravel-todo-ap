<!-- Modal -->
<div class="modal fade" id="deleteGoalModal{{ $goal->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteGoalModalLabel{{ $goal->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="deleteGoalModalLabel{{ $goal->id }}">目標の更新</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{ route('goals.destroy', $goal) }}" method="post">
          @csrf
          @method('delete')
          <div class="modal-body">
          <input type="text" class="form-control" name="title" value="{{ $goal->title }}">
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-primary">削除</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>