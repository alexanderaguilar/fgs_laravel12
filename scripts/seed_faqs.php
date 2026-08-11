<?php

/**
 * Regenerates FAQ Statamic entries from curated tab content.
 * Run: php scripts/seed_faqs.php
 */

$base = dirname(__DIR__).'/content/collections/faqs';

if (! is_dir($base)) {
    mkdir($base, 0755, true);
}

foreach (glob($base.'/*.md') as $file) {
    unlink($file);
}

$categories = [
    'generales' => [
        [
            'title' => '¿Cuál es la obra social de Fundación Grupo Social?',
            'answer' => '<p>La obra social de Fundación Grupo Social tiene dos componentes: uno es el trabajo directo con comunidades a través de sus Territorios Progreso en los que la Fundación se instala en un territorio afectado por la exclusión, la pobreza y la conflictividad y acompaña a la población para que ella misma mejore de manera integral su calidad de vida. El otro componente que también es obra social en sí mismo son sus empresas para el bien común, que existen únicamente para servir a las personas, ampliar oportunidades, contribuir al bienestar de la sociedad y ser testimonio de que es posible hacer negocios de otra manera: con ética y foco en aquellos que más lo necesitan y generando riqueza para toda la sociedad.</p>',
        ],
        [
            'title' => '¿Cómo trabaja Fundación Grupo Social?',
            'answer' => '<p class="mb-4">La Fundación es una Organización que es dueña de empresas. A través de ellas y de la labor con las comunidades en varios territorios alrededor de Colombia, trabaja cada día para abrirle las puertas a más personas, especialmente a quienes no han tenido suficientes oportunidades.</p><p>Ingresa <a href="/conocenos/que-hacemos">aquí</a> para conocer más de la labor de la Fundación.</p>',
        ],
        [
            'title' => '¿Quién es el dueño de Fundación Grupo Social?',
            'answer' => '<p>La Fundación no tiene dueño, ni controlante, nunca lo ha tenido. Su voluntad no está referida a la de un tercero, ella misma es la única propietaria de su patrimonio y de sus empresas. Detrás de la Fundación no hay nadie. Es una verdadera fundación y como toda fundación, su patrimonio tiene como fin irrevocable de utilidad común su Misión. No tiene accionistas ni reparte dividendos. Todo lo que gana lo invierte en su propósito esencial de servicio a la sociedad.</p>',
        ],
        [
            'title' => '¿La Fundación presta ayuda directa a personas o comunidades?',
            'answer' => '<p>No, la Fundación tiene un enfoque promocional, que busca que cada persona o comunidad asuma las riendas de su progreso y bienestar y su trabajo se expresa a través de sus empresas para el bien común y el acompañamiento a comunidades en distintos lugares alrededor del país. No presta ayuda directa a comunidades o personas.</p>',
        ],
        [
            'title' => '¿Qué servicios ofrece la Fundación a los desplazados, discapacitados o migrantes?',
            'answer' => '<p>Fundación Grupo Social no tiene trabajo sectorial ni poblacional. Su enfoque es territorial y se desarrolla a través del empoderamiento de todos los actores de los territorios donde se encuentra y de los productos y servicios que prestan sus empresas a todos los que los necesiten.</p>',
        ],
        [
            'title' => '¿Fundación Grupo Social hace donaciones?',
            'answer' => '<p>No. La obra de la Fundación Grupo Social es de carácter promocional y no asistencial. Eso quiere decir que la Fundación Grupo Social busca que las personas tengan las capacidades para ser sujetos autónomos gestores y protagonistas de su propio desarrollo. En ese sentido, la Fundación no hace donaciones.</p>',
        ],
        [
            'title' => '¿Tiene la Fundación algún programa de sostenibilidad o responsabilidad social corporativa?',
            'answer' => '<p class="mb-4">La Fundación aborda el concepto de sostenibilidad, en el entendido que toda actividad es sostenible cuando cuenta con las condiciones que le permiten permanecer en el tiempo fiel a su esencia, persiguiendo el propósito para el que ha sido concebida, logrando impactar la sociedad eficazmente, haciéndola cada vez más digna para la humanidad.</p>
<p class="mb-4">La sostenibilidad, vista como se ha expresado, conlleva para una empresa u organización el compromiso de satisfacer los intereses de todas las personas que participan en su cadena de valor, con criterios de justicia, en un horizonte de largo plazo. Implica contar con la capacidad de asumir el impacto –negativo y positivo– que genera su quehacer, así como la capacidad que la empresa tiene de adaptarse rápidamente al entorno económico, político, social, ambiental, entre otros, en el cual se desarrolla su actividad. Acarrea preguntarse, incluso, por su eventual compromiso o la responsabilidad de extender la generación de riqueza a ´otros actores´ excluidos que no participan, dada su vulnerabilidad, en la cadena de producción.</p>
<p class="mb-4">Esta concepción de sostenibilidad, que ha acompañado el pensamiento de la Fundación desde muchos años atrás, tiene dos expresiones, según se trate de los Territorios Progreso o de sus empresas.</p>
<p>Haz clic <a href="/nuestro-impacto-social">aquí</a> para conocer cómo se expresa el concepto de sostenibilidad de Fundación Grupo Social en sus dos instrumentos de acción, es decir, su impacto social.</p>',
        ],
        [
            'title' => '¿La Fundación ofrece empleo a través de sus Territorios Progreso?',
            'answer' => '<p>No. El trabajo que hace Fundación Grupo Social desde los Territorios Progreso no está orientado a ofrecer empleo.</p>',
        ],
        [
            'title' => '¿Por qué canal se puede remitir una hoja de vida para trabajar en Fundación Grupo Social?',
            'answer' => '<p>Las personas interesadas en hacer parte de la Fundación Grupo Social pueden enviar su hoja de vida haciendo clic <a href="/conocenos/trabaja-con-nosotros">aquí</a>.</p>',
        ],
        [
            'title' => '¿Se puede realizar voluntariado en Fundación Grupo Social?',
            'answer' => '<p>No. La Fundación no tiene programas de voluntariado.</p>',
        ],
        [
            'title' => '¿Se pueden presentar proyectos a Fundación Grupo Social?',
            'answer' => '<p>La Fundación Grupo Social diseña sus propios campos de trabajo dentro de un plan estratégico diseñado para tal efecto. Además, la Fundación NO es financiadora, si no ejecutora. Desde los Territorios Progreso se acompañan proyectos de comunidades en el marco del despliegue de la estrategia y no como una actividad recurrente en la Organización.</p>',
        ],
        [
            'title' => '¿Las personas que trabajan en la Fundación pueden realizar trámites por los canales externos (web y redes sociales)?',
            'answer' => '<p>No, los colaboradores de la Fundación deben realizar todos los trámites y gestiones relacionadas con su labor a través de los canales internos que la organización ha definido para tal fin.</p>',
        ],
        [
            'title' => '¿La Fundación tiene acción fuera de Colombia?',
            'answer' => '<p>No, sus programas y empresas se desarrollan actualmente en Colombia.</p>',
        ],
        [
            'title' => '¿Es posible compartir a obras de titularidad y autoría de la Fundación a terceros?',
            'answer' => '<p>No, de acuerdo con lo estipulado en la Ley 23 de 1982 y las políticas internas de Fundación Grupo Social, esta no puede ceder ni licenciar sus obras a terceros.</p>',
        ],
    ],
    'empresas' => [
        [
            'title' => '¿Cómo es la actividad empresarial de Fundación Grupo Social?',
            'answer' => '<p class="mb-4">Desde hace más de un siglo, Fundación Grupo Social ha estado al lado de los pequeños empresarios, trabajadores independientes y familias colombianas que han buscado, a través del esfuerzo y la productividad, construir caminos de progreso. A lo largo de su historia, ha desarrollado un sólido grupo empresarial con el firme propósito de ofrecer soluciones integrales, a través de productos y servicios, que impulsen el crecimiento económico y mejoren la calidad de vida de quienes tradicionalmente han estado excluidos de muchas oportunidades. La Fundación ha dedicado su gestión a abrir puertas para la generación de desarrollo.</p>
<p class="mb-4">Estas empresas no existen únicamente para generar utilidades; su razón fundamental es aportar al bienestar colectivo y contribuir, a la construcción de una sociedad más justa. Están concebidas como parte esencial de su misión social.</p>
<p>Su actividad empresarial se centra en la actualidad en sectores con alta potencia para la inclusión como el de ahorro, crédito e inversión; protección; vivienda; y turismo.</p>',
        ],
        [
            'title' => '¿Qué significa que el dueño de las empresas sea la Fundación Grupo Social?',
            'answer' => '<p>Eso significa que el quehacer de las empresas que pertenecen al grupo liderado por Fundación Grupo Social son en sí mismas una obra social, es decir, tienen un impacto directo en para transformar la sociedad y también que las utilidades que generan se dirigen al cumplimiento de la misión de la Fundación: contribuir a superar las causas estructurales de la pobreza para construir una sociedad justa, solidaria, productiva y en paz.</p>',
        ],
        [
            'title' => '¿Por qué la Fundación considera la actividad empresarial como parte integral de su obra social?',
            'answer' => '<p class="mb-4">Porque el papel de lo empresarial no se circunscribe a ser fuente de financiación. Es de la esencia y parte integral de su obra social. La Fundación ha considerado que ´lo social´ es inherente al quehacer empresarial y no debe buscarse afuera de este a manera de adicional a la gestión en sí misma. En ese sentido, son cuatro las funciones por las cuales de manera deliberada ha decidido que sea interpretado su trabajo: (i) satisfacción de verdaderas necesidades, (ii) generación de la máxima riqueza para la sociedad en su conjunto, (iii) construcción y desarrollo de comunidades de personas y (iv) responsabilidad como actor clave de la sociedad civil.</p>
<p>Cabe aclarar que estas funciones son propias de todas las empresas, no solamente de aquellas que hacen parte de la Fundación Grupo Social.</p>',
        ],
        [
            'title' => '¿Por qué la Fundación hace presencia en los sectores en los que están sus empresas hoy?',
            'answer' => '<p class="mb-4">La Fundación definió en 2012 una ruta estratégica que ratificó su presencia en los sectores donde históricamente ha trabajado e impulsó la búsqueda de oportunidades en nuevos ámbitos con alto potencial de inclusión para poblaciones que han tenido acceso limitado al sistema económico.</p>
<p class="mb-4">Para avanzar en este propósito ha fortalecido el eje de protección y la actividad de ahorro, de crédito y de inversión. A estos sectores se suman como apuestas estratégicas, Construcción y Turismo.</p>
<p>Junto con estas líneas de negocio, desde 2012 se decidió impulsar proyectos de menor escala, pero de alta relevancia social, que requieren acompañamiento cercano y relaciones directas con emprendedores, comunidades y organizaciones no formales. Para ello se creó la Gestora de Proyectos Empresariales, encargada de liderar este tipo de iniciativas.</p>',
        ],
        [
            'title' => '¿Cuáles son las empresas de Fundación Grupo Social?',
            'answer' => '<p>Para conocer cuáles son las empresas de Fundación Grupo Social haz clic <a href="/nuestras-empresas">aquí</a>.</p>',
        ],
        [
            'title' => '¿Por qué una fundación tiene empresas en el sector de ahorro, crédito e inversión?',
            'answer' => '<p>Todo se remonta a la convicción del fundador, de vincular a los que más lo necesitaban a la gestión de su propio desarrollo y que para ello un potente instrumento era el ahorro. De hecho, la primera actividad que realizó, el mismo día en que nació la Fundación, (enero de 1911) fue la creación de una Sección de Ahorros que se convertiría luego en el Banco Caja Social, una de sus empresas hoy.</p>
<p>La actividad de ahorro, crédito e inversión es fundamental para el desarrollo; entre otras cosas, permite que los flujos de liquidez y ahorro de la sociedad fluyan para financiar la actividad de unos u otros. Estos servicios son fuente de inclusión, permiten a las personas participar de esos flujos para construir con seguridad un capital que permita superar situaciones de pobreza y marginamiento, enfrentar eventualidades y para financiarse. Estas empresas se han orientado fundamentalmente a atender poblaciones que no encuentran acceso a servicios de este tipo o si los encuentran, no son dignos o no tienen condiciones adecuadas.</p>',
        ],
        [
            'title' => '¿La Fundación Grupo Social es ahora dueña del Banco W?',
            'answer' => '<p class="mb-4">La Fundación Grupo Social cerró la adquisición, en el 2025, del 51% del Banco W, convirtiéndose en el actor privado más relevante del país en microfinanzas –herramienta de movilidad económica y desarrollo para quienes más lo necesitan– reafirmando su propósito de ser la organización que acompaña a los dueños de negocios y microempresarios en su crecimiento y su formalización para el fortalecimiento del tejido empresarial colombiano como motor clave de impacto social.</p>
<p>Fundación Grupo Social se une a la Fundación WWB (que mantiene el 49% de las acciones) como socio, compartiendo el mismo propósito, mejorar la vida de las personas, en este caso, a través de instrumentos financieros que impulsen su inclusión y progreso.</p>',
        ],
        [
            'title' => '¿Tiene la Fundación alguna actividad en lo rural?',
            'answer' => '<p class="mb-4">El interés por la ruralidad del país es un objetivo estratégico complementario para la organización pues ha entendido que, solo superando las dificultades en términos de seguridad, exclusión, infraestructura y conectividad, servicios sociales, entre otros, no será posible vivir en la sociedad que se sueña para todos. Por otra parte, un campo desarrollado, productivo y en paz es una necesidad para las aspiraciones de progreso que debe tener Colombia.</p>
<p>Así, la Fundación trabaja con toda la potencia de sus dos instrumentos (Territorios Progreso y empresas), para contribuir a superar las causas de la pobreza en ese ámbito.</p>',
        ],
        [
            'title' => '¿Cuál es el propósito del premio Emprender Paz que lidera la Fundación?',
            'answer' => '<p class="mb-4">El Premio Emprender Paz busca identificar y visibilizar iniciativas empresariales que brindan oportunidades a comunidades afectadas por la violencia y la exclusión. Con su actuar cotidiano, ellas son testimonios del rol que cumple la empresa privada como uno de los motores más potentes para generar transformaciones perdurables en favor del progreso y la paz en la sociedad. El Premio muestra al país que ser productivo y construir paz van de la mano.</p>
<p class="mb-4">Conoce más del premio liderado por Fundación Grupo Social haciendo clic <a href="https://www.emprenderpaz.org/" target="_blank">aquí</a>.</p>
<p>Para conocer más acerca del proceso y actualidad de la convocatoria hacer clic <a href="https://www.emprenderpaz.org/convocatoria" target="_blank">aquí</a>.</p>',
        ],
        [
            'title' => '¿Fundación Grupo Social ayuda para acceder a créditos con el Banco Caja Social y Entre Amigos?',
            'answer' => '<p>No. Para acceder a un crédito y cualquier otro servicio se deben utilizar únicamente los canales oficiales del Banco Caja Social y Entre Amigos.</p>',
        ],
        [
            'title' => '¿Fundación Grupo Social ayuda para acceder a créditos con el Banco Caja Social a personas reportadas?',
            'answer' => '<p>No. Para acceder a un crédito y cualquier otro servicio, en caso de estar o no reportado, se deben utilizar únicamente los canales oficiales del Banco Caja Social.</p>',
        ],
        [
            'title' => '¿A través de los canales de Fundación Grupo Social se puede recibir información acerca de productos / servicios de sus empresas?',
            'answer' => '<p>No. Para resolver cualquier inquietud con relación a productos y servicios de las empresas de Fundación Grupo Social es necesario contactarse a través de los canales oficiales de cada una de las compañías.</p>',
        ],
        [
            'title' => '¿La visibilidad de Fundación tiene por objetivo hacer publicidad a sus empresas para mejorar sus ventas?',
            'answer' => '<p>No, de ninguna manera. Los clientes escogen estas empresas por lo que reciben de ellas, por sus productos y servicios de calidad y pertinentes. Ahora bien, si algún cliente opta por elegir estas empresas en lugar de otras debido a conocer su dueño y lo que este hace, será una decisión valiosa y bienvenida. Pero no es ese el objetivo que la Fundación persigue al ser más visible.</p>',
        ],
        [
            'title' => 'Empresas como estas tienen detrás grupos poderosos, ¿quién responde por estas si detrás lo que hay es una fundación?',
            'answer' => '<p>Estas empresas son sólidas y robustas, cuentan con un patrimonio importante que respalda toda su actividad, pero además su dueña, Fundación Grupo Social, tiene un tamaño importante y una gran solidez patrimonial, de hecho, es la matriz de un grupo empresarial exitoso y de amplia trayectoria en el país. Algo más: tener el respaldo de una institución profundamente ética, respetuosa absoluta de la Ley y de la cual ningún privado puede beneficiarse ni tener acceso a su patrimonio, la hace en el fondo más sólida que un esquema normal de grupo con accionistas, cuya trazabilidad no siempre es tan clara y conocida como esta.</p>',
        ],
        [
            'title' => '¿Por el hecho de pertenecer a una fundación, las empresas dan productos más baratos?',
            'answer' => '<p>No. Los precios no dependen de la naturaleza jurídica de la matriz de la cual hacen parte las empresas. Los precios son solo un aspecto de la propuesta de valor que cualquier empresa hace a sus clientes. Por tanto, solo pueden compararse precios si se comparan condiciones de acceso, pertinencia de los productos y atención a las verdaderas necesidades de las personas. Las empresas de la Fundación Grupo Social ofrecen a sus clientes soluciones pertinentes para sus verdaderas necesidades, en las mejores condiciones posibles y a precios que son asequibles y adecuados.</p>',
        ],
        [
            'title' => '¿Qué hace Fundación con las ganancias que le genera ser dueña de empresas?',
            'answer' => '<p>Los excedentes de Fundación Grupo Social se dedican de manera exclusiva al cumplimiento de su propósito social, es decir, de su misión.</p>',
        ],
    ],
    'territorios' => [
        [
            'title' => '¿Cómo es el trabajo que realiza la Fundación con las comunidades marginadas?',
            'answer' => '<p>La Fundación Grupo Social a través de sus Territorios Progreso acompaña a comunidades excluidas, situadas en distintos territorios del país, buscando que ellas logren condiciones para su propio desarrollo y alcancen un mejoramiento sostenible en su calidad de vida, entendida esta no solo en el aspecto material, sino en la auténtica realización integral de las personas, en un marco de ética y valores.</p>',
        ],
        [
            'title' => '¿Cómo es la metodología de los Territorios Progreso que adelanta la Fundación?',
            'answer' => '<p class="mb-4">Desde hace más de una década, la Fundación trabaja sobre la base de su “Modelo de Calidad de Vida” para promover resultados integrales y sostenibles en sus Territorios Progreso. Esta labor la desarrolla un equipo interdisciplinario que hace su vida en los mismos territorios, lo cual facilita la construcción de relaciones de confianza y, desde un enfoque promocional y de largo plazo, contribuye al fortalecimiento de capacidades para que las comunidades sean protagonistas de su propio desarrollo.</p>
<p class="mb-4">Junto con la comunidad y las entidades públicas, privadas y organizaciones de la sociedad civil, se define una apuesta estratégica de mínimo 10 años basada en las necesidades y oportunidades locales, que se traduce en un ´sueño compartido´, que prioriza las transformaciones estructurales. Su desarrollo se hace con la participación de todos los actores del territorio que quieren vincularse, de tal manera que se puedan alcanzar resultados concretos que reflejen mejoras reales, retadoras y sostenibles para las comunidades.</p>
<p>Para conocer más sobre la forma de actuación de los Territorios Progreso haz clic <a href="/nuestros-territorios-progreso">aquí</a>.</p>',
        ],
        [
            'title' => '¿Con quién trabaja Fundación Grupo Social en sus Territorios Progreso?',
            'answer' => '<p>Con los distintos actores que residen en los territorios donde la Fundación desarrolla su trabajo y que, comprometidos con el desarrollo de su territorio, trabajan para lograr el mejoramiento de la calidad de vida de los habitantes.</p>',
        ],
        [
            'title' => '¿Cuáles son los lugares en donde la Fundación despliega hoy sus Territorios Progreso?',
            'answer' => '<p>Para conocer en qué lugares de Colombia despliega hoy la Fundación sus Territorios Progreso hacer clic <a href="/nuestros-territorios-progreso">aquí</a>.</p>',
        ],
        [
            'title' => '¿Cómo elige la Fundación los lugares en donde desplegará sus Territorios Progreso?',
            'answer' => '<p class="mb-4">La Fundación Grupo Social selecciona nuevos Territorios Progreso a partir de un Portafolio de Territorios guiado por cuatro principios: acompañar a las comunidades más excluidas, reconocer la diversidad territorial del país, combinar territorios con distintos niveles de desafío para potenciar aprendizajes y trabajar en nodos de desarrollo que conecten territorios y promuevan innovación. Con base en estos principios, la Fundación definió rutas diferenciadas para municipios y ciudades que permiten priorizar territorios donde exista una combinación clara de necesidad, viabilidad operativa y potencial transformador.</p>
<p>En municipios, la selección sigue un proceso progresivo: primero se identifican los territorios más pobres mediante filtros de pobreza, tamaño poblacional, accesibilidad, riesgos y condiciones de seguridad; luego se evalúa su “fertilidad” para el modelo de calidad de vida, analizando capacidades institucionales, infraestructura, capital humano y ecosistema productivo; y finalmente se realiza una validación en profundidad con análisis territorial y trabajo de campo. En ciudades, el proceso inicia con la elección de ciudades estratégicas y, dentro de ellas, la identificación de micro territorios urbanos con alta pobreza y condiciones de viabilidad, que luego se validan mediante análisis técnico y visitas de campo, hasta seleccionar un subterritorio por ciudad como candidato a Territorio Progreso.</p>',
        ],
    ],
];

function slugify(string $title): string
{
    $map = [
        'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ñ' => 'n',
        'Á' => 'a', 'É' => 'e', 'Í' => 'i', 'Ó' => 'o', 'Ú' => 'u', 'Ñ' => 'n',
        '¿' => '', '?' => '', '´' => '', '"' => '', '“' => '', '”' => '', '/' => '-',
    ];
    $s = strtr($title, $map);
    $s = strtolower($s);
    $s = preg_replace('/[^a-z0-9]+/', '-', $s) ?? '';
    $s = trim($s, '-');

    return substr($s, 0, 80);
}

function yamlQuote(string $value): string
{
    return "'".str_replace("'", "''", $value)."'";
}

$id = 1;
$count = 0;

foreach ($categories as $category => $faqs) {
    foreach ($faqs as $order => $faq) {
        $slug = slugify($faq['title']);
        $filename = sprintf('%s-%d.md', $slug, $id);
        $path = $base.'/'.$filename;

        $content = "---\n"
            ."id: faq-{$id}\n"
            ."blueprint: faq\n"
            .'title: '.yamlQuote($faq['title'])."\n"
            ."category: {$category}\n"
            .'order: '.($order + 1)."\n"
            ."answer: |\n";

        // Indent multiline HTML for YAML literal block
        foreach (explode("\n", trim($faq['answer'])) as $line) {
            $content .= '  '.$line."\n";
        }

        $content .= "---\n";

        file_put_contents($path, $content);
        $id++;
        $count++;
    }
}

echo "Wrote {$count} FAQ entries to {$base}\n";
