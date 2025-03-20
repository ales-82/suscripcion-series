<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            [
                'titulo'=>'Breaking Bad',
                'slug'=>'breaking-bad',
                'resumen'=>'Walter White es un esforzado profesor de química de preparatoria.  Cuando la vida ya le era bastante complicada para Walter, le diagnostican un cáncer pulmonar terminal, lo que le lleva a quebrantar la ley e instalar un laboratorio de metanfetamina con su antiguo estudiante Jesse Pinkman para así asegurar el bienestar económico de su familia.',
                'contenido'=>'Altamente aclamado por la crítica, este drama televisivo escrito y producido por Vince Gilligan ("Expediente X") nos muestra la vida de Walter White (Bryan Cranston "Malcolm"), un genio en el campo de la Química cuya existencia está marcada por una enorme frustración tanto a nivel personal como laboral.\r\n Hundido por una monótona e insulsa relación con su mujer e incapaz de poner a prueba su brillantez trabajando como profesor de instituto, Walter da un giro radical a su forma de vida cuando descubre que tiene un cáncer terminal. Desde entonces, a su manera, decide reafirmar el amor por su familia y por la química montando un laboratorio de metanfetaminas junto a Jesse Pinkman (Aaron Paul), un antiguo y problemático alumno, para dejar a su esposa y a su hijo en buen lugar cuando él falte.\r\n La serie explora los límites del ser humano y expone a Walter a situaciones en las que nunca antes podría haberse imaginado estar. Desde muy pronto, la serie muestra a este profesor de química disfrutando este tipo de situaciones, lo que choca directamente con su anterior estilo de vida. No en vano, la traducción más acertada del título original de la serie es: "Portandose mal".',
                'imagen'=>'https://es.web.img3.acsta.net/pictures/18/04/04/22/52/3191575.jpg',
                'usuario_id'=> 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'titulo'=>'Game of Thrones',
                'slug'=>'game-of-trones',
                'resumen'=>'Es una adaptación de la saga de novelas de fantasía Canción de Hielo y Fuego de George R. R. Martin. La primera de las novelas es la que da nombre a la serie.',
                'contenido'=>'a serie nos sitúa en Invernalia, uno de los siete reinos del continente de Poniente. Tras un largo verano, Lord Eddard "Ned" Stark (Sean Ben, "El señor de los anillo", "Troya", "Equilibrium"), señor de Invernalia, es llamado a ocupar el cargo de Mano del Rey. Se verá obligado a dejar su tierra para unirse a la corte del rey Robert Baratheon "El Usurpador" (Mark Addy, "Robin Hood", "Los Picapiedra en Viva Rock Vegas"), señor de los Siete Reinos, hombre díscolo y otrora un gran guerrero. Pronto, los principios y la ética de Ned Stark chocarán con la forma de vida del rey Baratheon, pero incluso más con la de los Lannister, una de las siete familias más importantes del reino de la cual la reina Cersei Lannister (Lena Headey, "300") proviene. No menos tormentosa será la relación con su hermano Jaime Lannister (Nikolaj Coster-Waldau, "Black Hawk derribado", "El reino de los cielos") y el enano Tyrion (Peter Dinklage, "Elf", "Las Crónicas de Narnia").\r\n Inmerso en este mundo cuyas estaciones duran décadas y en el que retazos de una magia inmemorial y olvidada surgen en los rincones más sombríos y maravillosos, Ned Stark tendrá que lidiar con la traición, la lealtad, la compasión y la sed de venganza. Desde su nueva posición más cercana al rey, ocupará el lugar ideal para intentar desentrañar una maraña de intrigas que pondrá en peligro tanto su vida como la de los miembros de su familia: su esposa Catelyn (Michelle Fairley, "Harry Potter") y sus hijos Robb (Richard Madden, "Sirens"), Bran (Isaac Hempstead-Wright), Arya (Maisie Williams), Sansa (Sophie Turner) y el bastardo Jon Nieve (Kit Harington). Giros drásticos en la trama, épica, violencia, sangre y sexo se juntan en esta superproducción que te dejará pegado a la pantalla.',
                'imagen'=>'https://flxt.tmsimg.com/assets/p8553063_b_v13_ax.jpg',
                'usuario_id'=> 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'titulo'=>'Chernobyl',
                'slug'=>'chernobyl',
                'resumen'=>'En abril de 1986, una explosión en la planta de energía nuclear de Chernobyl en la URSS se convierte en una de las peores catástrofes provocadas por el hombre en el mundo.',
                'contenido'=>'El 26 de abril de 1986, una de las peores catástrofes humanas se cierne sobre la faz de la tierra. La planta nuclear de Chernobyl, que por aquel entonces pertenecía a la República Socialista Soviética de Ucrania, explota causando uno de los mayores desastres medioambientales de la historia, debido al sobrecalentamiento del núcleo del reactor nuclear.\r\n Esta serie se centra en los hombres y mujeres que sacrificaron sus vidas para salvar al resto de Europa de unas consecuencias aún mayores de las sufridas. Además, gira en torno a la figura de Boris Shcherbina, Vicepresidente del Consejo de Ministros y jefe de la Oficina de Combustibles y Energía de la URSS, a quien le asignan la tarea de dirigir la comisión del gobierno de Chernobyl durante las primeras horas del accidente, antes de conocerse todos los datos y de las graves consecuencias ocasionadas. \r\n Pronto, Shcherbina se encuentra atascado en un sistema político y burocrático que deja mucho que desear frente a las pérdidas humanas ocasionadas.',
                'imagen'=>'https://images.ecestaticos.com/V4CiL2KFeh63i3c3KUE3pHSleOY=/0x2:1437x810/1200x675/filters:fill(white):format(jpg)/f.elconfidencial.com%2Foriginal%2Ffe2%2F3c0%2Fb28%2Ffe23c0b2878276032fe5f0d69732ef95.jpg',
                'usuario_id'=> 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'titulo'=>'Stranger Things',
                'slug'=>'stranger-things',
                'resumen'=>'A raíz de la desaparición de un niño, un pueblo desvela un misterio relacionado con experimentos secretos, fuerzas sobrenaturales aterradoras y una niña muy extraña.',
                'contenido'=>'Stranger Things (originalmente titulada Montauk) es una serie de televisión dramática de misterio que está ambientada en una localidad de Indiana. Dicho lugar adquiere fama por los extraños acontecimientos que están sucediendo, similares a los del "Proyecto Montauk", un supuesto proyecto secreto llevado a cabo por el gobierno de los Estados Unidos en el que se realizaban experimentos con la finalidad de desarrollar técnicas de guerra psicológica.',
                'imagen'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/Stranger_Things_logo.png/640px-Stranger_Things_logo.png',
                'usuario_id'=> 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'titulo'=>'The Big Bang Theory',
                'slug'=>'the-big-bang-theory',
                'resumen'=>'The Big Bang Theory se centra en la vida de cinco personajes que residen en Pasadena, California: los compañeros de piso Leonard Hofstadter y Sheldon Cooper; su vecina Penny, una guapa camarera; y los amigos de trabajo de Leonard y Sheldon - el ingeniero mecánico Howard Wolowitz y el astrofísico Raj Koothrappali.',
                'contenido'=>'Creada y escrita por Chuck Lorre ("Dos hombres y medio", "Dharma y Greg"), Bill Prady ("Las chicas Gilmore", "Dharma y Greg") y Steven Molaro ("iCarly"), "The Big Bang Theory" trata las peripecias de un grupo de "geeks", cuyos conocimientos de física superan la brillantez pero que, sin embargo, sus habilidades sociales son de lo más limitadas.\r\n La vida de dos de estos peculiares personajes, Leonard Hofstadter (Johnny Galecki, "Roseanne", "Vanilla Sky") y Sheldon Cooper (Jim Parsons, "Juzgando a Amy"), cambia radicalmente cuando Penny (Kaley Cuoco, "Embrujadas"), una atractiva camarera, se convierte en su nueva vecina. El simple hecho de una presencia femenina al otro lado del pasillo se convierte en todo un desafío para ellos y principal causa de todo tipo de situaciones disparatadas.\r\n No menos entretenidas son las visitas de los otros dos incondicionales miembros del grupo, Howard Wolowitz (Simon Helberg, "Studio 60") y Rajesh Koothrappali (Kunal Nayyar), quienes acostumbran a pasar una gran cantidad de tiempo en el piso de sus amigos. El primero de ellos es amante de los cómics y superhéroes, conoce cinco idiomas y siente devoción por el género femenino, mientras el segundo sufre de vejiga hiperactiva y nunca, bajo ninguna circunstancia, habla en presencia de mujeres o les dirige la palabra.',
                'imagen'=>'https://images-na.ssl-images-amazon.com/images/S/pv-target-images/27dad4f1f79ea44b96fc726ddef21d04294c1b1654e06d6126c256f4db76054c._RI_V_TTW_.jpg',
                'usuario_id'=> 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

/*
titulo
slug
resumen
contenido
image
*/
