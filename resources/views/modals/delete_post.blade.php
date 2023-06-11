<div class="modal fade" id="deletePostModal{{ $post->id }}" tabindex="-1" aria-labelledby="deletePostModalLabel{{ $post->id }}">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="deletePostModalLabel{{ $post->id }}">本当に削除してもよろしいですか？</h5>
             </div>
             <div class="modal-footer">
                 <form action="{{ route('posts.destroy', $post) }}" method="post">
                     @csrf
                     @method('delete')
                     <button type="submit" class="btn btn-danger">OK</button>
                 </form>
                 <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-outline-primary">今はしない</button></a>
             </div>
         </div>
     </div>
 </div>