@extends ('layouts.app')

  @section('content')
        <!-- slide 1 jumbotron e form search -->
        <div id="j" class="jumbo">
          <div class="opacity">
          <img id="first-img" class="photo-carousel first" src={{asset('img/img1.jpeg')}} alt="" >
          <img id="second-img" class="photo-carousel" src={{asset('img/img2.jpg')}} alt="" >
          <img id="third-img" class="photo-carousel" src={{asset('img/img3.jpg')}} alt="" >
          <img id="fourth-img" class="photo-carousel" src={{asset('img/img4.jpg')}} alt="" >
        <div class="search_container">
          <form class="form" action="{{route("guest.homepage.search")}}" method="get" enctype="multipart/form-data">
            @csrf
            @method('GET')
            <div class="form-group">
              <input type="search" id="address" class="form-control" placeholder="Inserisci indirizzo" />
              <p>Selected: <strong id="address-value">none</strong></p>
            </div>
            <div class="form-group">
              <label for="guests">Numero di ospiti</label>
              <input name="guests" type="number" class="form-control" id="guests" placeholder="Aggiungi ospiti" min="0" max="254" required>
            </div>
            <div class="form-group">
              <label for="title">Check-in</label>
              <input name="title" type="date" class="form-control" id="title" placeholder="Inserisci titolo" min="3" max="255" required>
            </div>
            <div class="form-group">
              <label for="title">Check-out</label>
              <input name="title" type="date" class="form-control" id="title" placeholder="Inserisci titolo" min="3" max="255" required>
            </div>
              <button type="submit" class="btn btn-primary">Cerca</button>
          </form>
        </div>
        </div>
        </div>
        
      <!-- slide 2 pubblicità sito e appartamenti in evidenza -->
      <div class="container">
      <div class="project-description row">
        <section class="left col-6">
          <h1>Qui ci andrà la descrizione del progetto</h1>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor distinctio dignissimos reprehenderit illo aliquam ab non vel repellat recusandae voluptatibus unde, ullam iste, iusto eveniet accusamus quia soluta minus dolores.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
        </section>
        <section class="right col-6">
          <p>
            Posizionato tra i primi 10 siti di prenotazioni
          </p>
        </section>
      </div>
      <div id="sponsored-flats" class="row">
        @foreach ($flats as $flat)
          <div class="flat_box col-2">
            <a href="{{route("guest.users.show", $flat->id)}}">
            <div class="overlay">
              <h3>{{$flat->title}}</h3>
              <p>{{$flat->city}}</p>
              <span>valutazione: {{$flat->stars}}</span>
            </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
</div>
  @endsection
