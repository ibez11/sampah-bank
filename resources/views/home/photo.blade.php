<div class="photo-gallery col-sm-6 col-md-4 col-lg-4">
  <div class="thumbnail">
    <img src={{ $photo->path }} width="300" alt="...">
    <div class="caption">
      <h3>{{ $photo->title }}</h3>
      <p>{{ $photo->description }}</p>
      <p style="display: inline-block;">
        <a 
        href={{ $isAdmin ? '/gallery/' . $photo->id : $photo->path}} 
        class="btn btn-default" role="button">Lihat</a>
        @if(!empty($isAdmin))
        &nbsp;
        <form style="display: inline-block;" action={{ route('gallery.destroy', $photo->id) }} method="post">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
        <button class="btn btn-danger" type="submit"
          onclick="return confirm('Anda yakin mau menghapus foto ini?')">Hapus</button>
        </form>
        @endif
      </p>
    </div>
  </div>
</div>
