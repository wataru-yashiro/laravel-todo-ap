@extends('layouts.app')

@push('scripts')
  <script src="{{ asset('/js/scripts.js') }}"></script>
@endpush

@section('content')
<div class="containar h-100">
  @if ($errors->any())
   <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
     @endforeach
    </ul>
   </div>
   @endif


@include('modals.add_goal')

@include('modals.add_tag')

<div class="d-flex mb-3">
   <a href="#" class="link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addGoalModal"><div class="d-flex align-items-center">
     <span class="fs-5 fw-bold">&nbsp;＋目標の追加</span>
   </div>
  </a>
  <a href="#" class="link-dark text-decoration-none mx-5"data-bs-toggle="modal" data-bs-target="#addTagModal">
    <div class="d-flex align-items-center">
      <span class="fs-5 fw-bold">&nbsp;＋タグの追加</span>
    </div>
  </a>

 </div>
 <div class="row row-cols-1 row row-cols-md-2 row row-cols-lg-3 g-4">
  @foreach ($goals as $goal)
   
  @include('modals.update_goal')

  @include('modals.delete_goal')

  @include('modals.add_todo')

  <div class="col">
    <div class="card bg-light">
      <div class="card-body d-flex justify-content-between align-items-center">
        <h4 class="card-title ms-1 mb-0">{{ $goal->title }}</h4>
        <div class="d-flex align-items-center">
        <a href="#" class="px-2 fs-5 fw-bold link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addTodoModal{{ $goal->id }}">＋</a>
        <div class="dropdown">
        <a class="dropdown-toggle text-decoration-none link-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item text-center" href="#" data-bs-toggle="modal" data-bs-target="#updateGoalModal{{ $goal->id }}">編集</a></li>
              <div class="dropdown-divider"></div>
              <li><a class="dropdown-item text-center" href="#" data-bs-toggle="modal" data-bs-target="#deleteGoalModal{{ $goal->id }}">削除</a></li>
            </ul>
            </div>
          </div>
        </div>

        @foreach ($goal->todos()->orderBy('done','asc')->get() as $todo)
        
        @include('modals.update_todo')
        @include('modals.delete_todo')
        <div class="card mx-2 mb-2">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center ">
              <h5 class="card-title">
                @if ($todo->done)
                <s>{{ $todo->content }}</s>
                @else
                {{ $todo->content }}
                @endif
              </h5>
              <div class="dropdown">
              <a class="dropdown-toggle text-decoration-none link-dark" href="#" role="button" id="dropdownTodoMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
               </a>
               <ul class="dropdown-menu" aria-labelledby="dropdownTodoMenuLink">
                <li>
                  <form action="{{ route('goals.todos.update',[$goal, $todo]) }}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="content" value="{{ $todo->content }}">
                    @if ($todo->done)
                    <input type="hidden" name="done" value="false">
                    <button type="submit" class="dropdown-item btn btn-link text-center">未完了</button>
                    @else
                    <input type="hidden" name="done" value="true">
                    <button type="submit" class="dropdown-item btn btn-link text-center">完了</button>
                    @endif
                  </form>
                </li>
                <div class="dropdown-divider"></div>
               <li><a class="dropdown-item text-center" href="#" data-bs-toggle="modal" data-bs-target="#updateTodoModal{{ $todo->id }}">編集</a></li>
               <div class="dropdown-divider"></div>
               <li><a class="dropdown-item text-center" href="#" data-bs-toggle="modal" data-bs-target="#deleteTodoModal{{ $todo->id }}">削除</a></li>
              </ul>
              </div>
            </div>
            <h6 class="card-subtitle text-muted mt-2 mx-1">{{ $todo->created_at }}</h6>
            <div class="d-flex flex-wrap mx-1 mb-2">
              @foreach($todo->tags()->orderBy('id', 'asc')->get() as $tag)
              <span class="badge bg-secondary mt-2 me-2 fw-light">{{ $tag->name }}</span>
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  @endforeach
 </div>
</div>
@endsection