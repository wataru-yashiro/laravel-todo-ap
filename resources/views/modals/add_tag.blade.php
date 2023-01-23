@include('modals.edit_tag')

@include('modals.delete_tag')

<!-- Modal -->
<div class="modal fade" id="addTagModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="addTagModalLabel">タグの追加</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{ route('tags.store') }}" method="post">
          @csrf
          <div class="modal-body">
          <input type="text" class="form-control" name="name">
          <div class="d-flex flex-wrap">
            @foreach($tags as $tag)
            <div class="d-flex align-items-center mt-3 me-3">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editTagModal" data-bs-dismiss="modal" data-tag-id="{{ $tag->id }}" data-tag-name="{{ $tag->name }}">{{ $tag->name }}</button>
            <button type="button" class="btn-close ms-1" aria-label="削除" data-bs-toggle="modal" data-bs-target="#deleteTagModal" data-bs-dismiss="modal" data-tag-id="{{ $tag->id }}" data-tag-name="{{ $tag->name }}"></button>                                 
            </div>
            @endforeach
          </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-primary">追加する</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>