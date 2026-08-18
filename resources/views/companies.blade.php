@extends('layouts.app',[
'description'=>'La creación y generación de empresas ha sido una de las características presentes en la Organización a lo largo de su historia. Hoy se consolida como dueña de un importante grupo empresarial que congrega a 13 empresas, cuya verdadera razón de ser está en el servicio genuino a la sociedad y no a la satisfacción de intereses particulares o la simple generación de rendimientos.', 
'title'=>'Nuestras empresas',
'keywords'=>'fundación, grupo, social, organización, empresas, programas, poblaciones, territorios, comunidades',
'ogimage'=>'img/fgs.jpg'
])
@section('content')

    @include('components.companies_page')

@endsection