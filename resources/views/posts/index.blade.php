<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Simple Memo</title>
     <link rel="stylesheet" href="/css/style.css" >
 </head>
 
 
 @extends('layouts.app')
 
 
 <body> 
  <div class="container"> 
    <p class="fs-6 my-3">新規投稿</p>
      <form action="{{ route('posts.store') }}" method="post">
        @csrf
      
        <td>
        <input type="text" name="title" value="{{ old('title') }}">
        </td>
        
        <td>
        <button type="submit button" class="btn btn-primary btn-sm">投稿</button>
        </td>

        @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
        @endif
      
        @if ($errors->any())
        <div>
          @foreach( $errors->all() as $error)
          <p class="text-danger">{{ $error }}</p>
          @endforeach
        </div>
        @endif

      </form>
  </div>

</body>
 

      <div class="container">
      <div class="mt-5">
        <p class="border-top border-3"></p>
        <p class="fs-6 my-3">メモ一覧</p>
        <p class="fs-6 my-3">@sortablelink('id', '並び替え')</p>
        
      <!-- // 検索機能　// -->
        <div>
          <form action="{{ route('posts.index') }}" method="GET">
            <input type="text" name="keyword" value="{{ $keyword }}">
            <input type="submit" class="btn btn-primary btn-sm" value="検索">
          </form>
        </div>
      <!-- 検索機能ここまで　// -->
        
      <table class="table">
        <tr>
          <th scope="col">No</th>
          <th scope="col">メモ内容</th>
          <th scope="col">作成日時</th>
          <th scope="col">更新日時</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
       
        @foreach($posts as $post)

        @include('modals.delete_post')
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td>{{$post->created_at}}</td>
          <td>{{$post->updated_at}}</td>
          <td><a href="{{ route('posts.edit', $post) }}"><button type="button" class="btn btn-success btn-sm">編集</button></a></td>
          <td>
            <form action="{{ route('posts.destroy', $post) }}" method="post">
              @csrf
              @method('delete')
              <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deletePostModal{{ $post->id }}"><button type="button" class="btn btn-danger btn-sm">削除</button></a>
            </form>
          </td>
        </tr>
        
        @endforeach
        
      </table>
     {{$posts->links()}}
    </div>
   </div>
   


 
 </html>
