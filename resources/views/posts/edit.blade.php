<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>投稿編集</title>
 </head>
 
 @extends('layouts.app')

 <body> 
     <main>
        <div class="container">  
           <div class="mt-5">         
            <p class="text-center">No.{{$post->id}} メモ編集</p>  
                @if ($errors->any())
                <div>
                    @foreach( $errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
            </div>

            
            <div class="mx-auto" style="width: 300px;">
                <form action="{{ route('posts.update', $post) }}" method="post">
                @csrf
                @method('patch')
               
               <p>メモ内容</p>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" style="width: 300px;">
                <div class="mt-4">
                <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-success btn-sm">戻る</button></a>
                </div>
                <div>
                    <button type="button submit" class="btn btn-primary btn-sm">確定</button> 
                </div>
                </div>
                </div>
                </form>                                 
            </div>
        </div>
                

                
        </div>
       
     </main>
 </body>
 
 </html>