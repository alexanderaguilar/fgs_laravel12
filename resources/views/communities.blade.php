@extends('layouts.app',[
'description'=>'Fundación Grupo Social acompaña a las comunidades para que ellas construyan condiciones para su propio desarrollo y logren un mejoramiento integral y sostenible en su calidad de vida.', 
'title'=>'Nuestro acompañamiento a comunidades',
'keywords'=>'fundación, grupo, social, organización, empresas, programas, poblaciones, territorios, comunidades, desarrollo',
'ogimage'=>'img/fgs.jpg'
])
@section('content')

    @include('components.communities_page')

@endsection