@extends('header')
@section('content')
<div class="container">
  <div class="row">
    <!-- article -->
    <div class="col-sm-2">
      </div>
      <div class="col-sm-8" style="background: rgba(204, 204, 204,
      0.5);padding:5%">
        <h3>L'ex-téléboutique de la chaussée de Jette se mue en logements, vides de parachèvement</h3>
      <br>
      <p>JETTE Non, vous n'avez pas la berlue ! Le 550 chaussée de Jette abritait bien une téléboutique Belgacom il y a quatre, cinq ans. Le chantier actuel dissimule à peine un bon 4.000 m2 de lofts. Du logement moyen de belle qualité, à la vérité, auquel s'ajouteront encore des appartements.</p>
      <br>
      <p>Reprise de la <a href="https://www.dhnet.be/archive/22-v-la-des-lofts-casco-51b7f1c6e4b0de6db99aa703">DH</a> par Guy Bernard</p>
      <br>
      <br>
      <h3>Histoire d'ADA</h3>
      <p>ADA est un bureau d’architecture, fondé en 1990 par un architecte à son
        retour d’Afrique du Sud ou il avait exercé le métier d’architecte au sein du
        groupe SAUTCH VORSTER AND PARTNERS depuis 1986.</p>
        <p>
          ADA a démarré ses activités comme partenaire et membre du groupe
          SAUTCH VORSTER AND PARTNERS INTERNATIONAL.
        </p>
        <p>En 1993 ADA a rompu son partenariat avec le groupe Sud-Africain et à
          recentrer ses activités sur la Belgique.</p>
        <p>De 1993 à 2000 les principaux projets d’ADA furent des projets de type
          industriel.</p>
        <p>A partir de 2001, le bureau d’architecture s’orienta vers des projets de types
          résidentiels.</p>
        <p>
        ADA comprend trois branches l’architecture, la gestion de chantier ainsi
        qu’une branche chargée de la responsabilité administrative ainsi que la
        comptabilité.
        </p>
        <br>
        <br>
        <h3>Avis de la clientèle</h3>

        @foreach ($comments as $comment)
        <tr>
            <td>"{{ $comment->com }}"</td>
            <br>
            <form action="{{ route('comments.destroy',$comment->id)  }}" method="POST">
                @csrf
                @method('DELETE')
            @hasrole('user')

                @if(Auth::user()->id==$comment->user_id)
                <a class="btn btn-secondary" href="{{ route('comments.edit',$comment->id) }}">Modifier</a>
                <button type="submit" class="btn btn-danger">Supprimer</button>
                @endif

            @endhasrole

            @hasrole('Super-Admin')
            <a class="btn btn-secondary" href="{{ route('comments.edit',$comment->id) }}">Modifier</a>
            <button type="submit" class="btn btn-danger">Supprimer</button>
            @endhasrole

            </form>
        </tr>
        @endforeach
        @role('user')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Problème avec le commentaire.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                        <div class="mb-3 mt-3">
                            <label for="comment">Comments:</label>
                            <textarea class="form-control" rows="5" id="comment" name="com"></textarea>
                        </div>
                        <input type="hidden" id="version" name="user_id" value="{{ Auth::user()->id }}" />
                        <button type="submit" class="btn btn-secondary">Valider</button>
                </form>

            @endrole
    @role('Super-Admin')
        <div class="row">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> Problème avec le commentaire.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form action="{{ route('comments.store') }}" method="POST">
            @csrf
                <div class="mb-3 mt-3">
                    <label for="comment">Commentaire:</label>
                    <textarea class="form-control" rows="5" id="comment" name="com"></textarea>
                </div>
                <input type="hidden" id="version" name="user_id" value="{{ Auth::user()->id }}" />
                <button type="submit" class="btn btn-secondary">Valider</button>
          </form>
        </div>
    @endrole
    </div>

    <div class="col-sm-2">
      </div>

  </div>

</div>
@endsection

