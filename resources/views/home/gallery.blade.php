<section class="gallery" id="gallery">
  <div class="container">
    <div class="section-heading text-center">
      <h2>Galeri</h2>
      <p>Lihat bagaimana bank sampah membawa dampak bagi masyarakat</p>
      <hr>
    </div>
    <div class="galleries row">
      @foreach($galleries as $photo)
        @component('home.photo', ['photo' => $photo, 'isAdmin' => false])
        @endcomponent
      @endforeach
    </div>
    <nav class="paging">
      {{ $galleries->links() }}
    </nav>
  </div>
</section>