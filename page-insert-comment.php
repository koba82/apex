<?php
/**
 * Template Name: Insert comments
 */

get_header(); ?>

<div class="content-wrapper" role="main">


    <?php

    $products = getProductInfo();

    var_dump(count($products));


    //var_dump($products);

    //file_put_contents(ABSPATH . '/ports/current_products/products.json',json_encode($products));




        //$products = str_getcsv($products);

        $userNames = '["Douwe","Tom","Gijs","Bbbb","Inge","Irene","Juliette","Sjaak","Bekker","Jan","Frank","Frank","Julia","Kevin","Philip","Niels","Margriet","Cynthia","Olaf","Thom","Rion","Arish","Jasper","Cor","Nadia","Martin","Noah","Jorg","David","Lotte","Jo\u00ebl","Mayke","Marc","Michelle","Franky","Monique","Andries","Bjorn","Ferry","Ton","Floris","Remco","Heer","Guus","Coen","Nick","Laury","Ben","Sjoerd","Tim","Kevin","Laura","Ad","Antoine","k.oper","Hessel","Frans","Tjeerd","Jeroen","Marlon","gilles","Michiel","Chris","Willeke","Jaimy","Enya","Sarah","Alphons","PCM","Laura","KAM-work","seggelink","dhr.","Frans","Errol","Klant","Emma","Niels","Anne-Marijn","heer","maria","Marcel","Ray","Jos","IL","Emily","Manuel","Cat","1980","E.M.","Dave","Anoniem","Macki","Jerry","astrid","Lilian","F.","customer","D.","Guusje","Johan","Mitchell","Stephen","Luciano","Eddy","Dereck","jeremy","Frank","alexander","Ben","Rob","Sander","Hans","Gt","C.Markx","N.","Bas","An","Elmer","Anja","Erik","Hans","TH","Celeste","Johan","Lars","Johan","Jorden","Kees","Henk","Ricardo","Marrit","Moqsou","Janneke","Romy","Thijs","Mark","Chalsey","Yaron","Roeland","Kim","Jelle","Laura","Santana","Britt","Marcel","MacUser","Lieke","Robert","niels","Maarten","Coen","Vincent","Maurits","Rick","Lieke","Esther","Tom","Jerrel","Filip","Jos","Bart","H\u00fcri","Haico","SW","Niels","Kees","Ewoud","Emile","Saskia","Leon","Dhr.","Max","MJ","Klant","Marieke","Simon","Roger","Rico","Beer","Oscar","Gairo","Christa","Nienke","Peter","Rijschoolzaanstad","zo\u00eb","Nico","Samuel","HEINZ.NU","Wesley","SR","Coen","Fred","Tamara","John","Ilse","Anouk","Zef","Livia","Marlies","Michel","NvD","Lize","Huub","Mireille","Judith","Een","Kees","Remco","Marco","Dr.","David","Marije","Steven","Cees","Jessie","Ap","Dudok","Harrie","Constantijn","Dirk","Joel","Joris","Frank","Klant","M.J","Dennis","Tess","Mike","Tirsa","Donald","Ton","Suzanne","sannesofie","Ellen","Nikkie","Ben","Susette","J.","Leo","mevrouw\t\t\t\t\tde","Joris","Geert","Leonie","Tim","Niels","Andre","B.","Marcus","Monty","heer","Stefan","Martine","Siebren","Ingeborg","Judith","Martijn","Alexandra","Luuk","Mark","Lisanne","Yvar","Ineke","H.","Yvette","Floris","Quincy","Stein","Levi-montage","Marco","Luuk","A.J.Koedood","RamonJ","Anneroos","ray","Arjan","Patrick","Dirk","Erik","m.r.gillebaart","Justin","Dylan","Anoniem","Tom","Stef","Ewald","Martijn","Ren\u00e9","Natasja","Leo","Arie","Martine","Wouter","Edwin","Frans","XX","Susan","Maastricht","Sorel","Guus","Serv\u00e9","Alessio","Lambert","Mjon","Jafar","Coerd","Anoniem","Jeanette","Menno","Dudok","ronald","Henry","Midas","Km","Wietse","Joost","Luis","sjaak","Marc","mark","Kees","RJP","Ruben","Marnix","Daan","Claus","Dorine","Ellen","Monica","B.","Martin","Levi","Karel","Thijs","Rian","Gerida","Bilge","Job","Patricia","Yvonne","Jessica","Mariette","Carla","Jill","Arnold","G\u00fcl","Dani\u00eblle","Coen","Desiree","Marcel","Arinda","Sander","Jacqueline","Bartjan","Jos","Lonneke","Lisette","Khalid","Lizette","Yvette","Chantal","Dave","Betty","John","Anne","Marieke","Erwin","Debby","Evert","klant","Rob","Lotte","Trudy","Carlijn","Jesse","Els","Elleke","Barry","Moniek","Fam.","Grietje","Els","Menno","Dirk","Nina","Niels","Sabien","Pauline","Thijs","Leon","Carolien","Carolien","Arjo","Richard","Mirella","Harry","Joyce","Frank","Gerald","dhr.","Iris","Annemarie","Arno","Harry","Alex","Bernard","Tinka","Marie-Louise","De","Marjolein","Stefan","Estelle","De","Wouter","Sabine","Jeroen","Mariska","Dierenkliniek","Mariska","Kees","Freek","Wendy","Ton","michel","Esmee","liesbeth","Olaf","Bianca","Faruk","Aim\u00e9e","Tesa","Anette","Aline","Judith","Lisanne","Hans","Carel","Dao","Lars","Tayfur","Jeroen","Megan","MO","Jan","Jose","Lia","Jan","Rebecca","Suzanne","Lilian","Sandra","Floor","Rob","Karen","Monique","Marjon","Marco","Heidi","Bas","Iris","Jeroen","JT","Joke","Toine","Brahm","Michiel","Jette","Gea","Marjolein","Karin","Wessel","Dewi","M.","Staal","Rob","N.","Kuin","Rene","Baros","Sil","Gerard","Schreve","Fraikin","Gert-Jan","Steven","Bayram","Klotz","Hilaire","Sudesh","Heijkoop","Jacobs","sven","Petra","Dhr.","Broekmeulen","Tom","Jan","jc","van_der_Meer","Niels","Piet","benedikt","Sarah","Leonie","van_Roon","van_den_Broek","Leen","van_Maaren","Konings","Kemperman","Heer","Evertse","Vos","Peter","Arslan","Paul","Krijn","Sander","Peter","Mr.","Roel","van_Lies","Peter","Mike","Jacobus","Lawrence","Maurice","Germain","Wubs","Margreet","Rob","Koster","Annet","Davy","Maiwand","Izzy","Tremmie","Jos","Romina","Herm","Arends","Fred","Li_Luca","Paul","els","van","Stefan","mevr.","Tammel","Joost","Thi","klant","Rob","Yasar","klant","Westenbrink","Anna","Maarten","Leo","I.","Stefan","Ed","Maaike","Leo","Hans","Onbekend","den","Rhaymondo","Bos,","Monique","Pete","Ed","Kim","Klant","van_Olphen","Me","Boekhorst","Merijn","van_Gulden","Achiiee","Bos","thom","Michael","van_Poorten","Robert","Kim","van_den_Puttelaar","An","Richard","Ellen","Toby","Bas","Wilma","RHE","Henk","Christian","van_der_Willigen","Fredriks","Dennis","JvdW","P.H.","Dries","Dennis","Rene","Tames","Patrick","Anoniem","Jelmer","Jeroen","Harisson","De_wilde","Co","van_Tongeren","Rowena","MvdH","Joris","Tim","Jeannette","Dhr.","Bart","Dave","Frank","Kievietsbosch","Bjosa","Ruben","Jaap","Mevr.","Martijn","Nicolet","EL_Wanni","Jeroen","Randall","Joske","Vierstraete","de","Kolk","Henk","klant","R.van","Hetty","S5kees","IJpma","MN","Deniz","Visser","Kuhn","Donny","Hans","J\u00f6rgen","Smits","cor","Roger","Klant","Familie","Sumeet","Lilian","JB!","Wendy","Schippers","Thomas","Gilbert","Ruud","Jeroen","Dani\u00eblle","Mw.","Ruud","Claudia","LMQ","el_hannouci","Erik","Maarten","Wize","Jori","Anouk","Hayo","A.K.","Fatih","J.","Erik","M.az","Jack","Mevrouw\/Meneer","Drost","Katerberg-Muns","Harald","Eric","Martijn","van_de_Wouw","Willem","John","J.H.","Peter","Harald","nick","Marc","Klaas","m95e928dd8bc398","Heidbuurt","Boerboom","Mart","Irma","Shi","Henk","Richard","R.W.J.","Arjen","kl","WHE","Reyndert","Hans","Theebe","Dani\u00ebl.B","Guy","Freddy","Wim","a.","Riekert","S.F.","E.Fransi","A.T.C.","Joos","Harry","RK","Toon","Richard","the","Gert-Jan","Welling","Amir","Jan","Dhr.","van_Roekel","Andre","Jan","van_den_Bergh","Karsmakers","Een","Gijsbertse","Groeb","Alex","Patrick","Alain","Dhr.","E.","Tim","Jochem","Johan","MH","Beijer","Frans","Marjolein","Bertil","Michelle","Tim","EP","L.f.w.Dijkema","Jako","J.C.","Kuppen","Hatseflats","Hilbrand","coltof","Ries","Mikayil","AM","Maarten","JS","Nak","Eva","Jetze","Pascal","Camiel","robert","Wolterbeek","Nicolaas","MVV","..","arie","Els","Sjouke","Gerrit","Abe","robert","Akis","Marco","Bas","K.F.","Ronald","Reem","Jef","Piet","Hans","Sietze","Heer","Harm","M.","Ruth","Andre","Hans","Loonbedrijf","Andre","Jeroen010","Abderahim","Gerco","JV","Joke","Marnic","G.K.","Kleine","Belinda","Paul","klant","Joost","Gerrit","Dick","Sjoerd","Michie","Jan","JPvL","liza","Frans","Jules","Erik","Joppe","Anton","Jolle","M.","Anton","Lou","de","M.Scheerman","hans","Wim","Kris","c.c.","J280851","Pljm","Mark","marcel","Xion","Johan","Gert-Jan","Merijn","peter","h.knap","Toon","Dirk","Hans","C.","Jan","eric","bones","S.K.","WHO","My","Johan","B.","Marcel","T.J.","Douwe","Sije","Ger","Richard","Ralf","Dennis","Geke","Ojee","M.L.","Rolf","Henk","Frank","johan","Ton","Sasha","constant","Eric","Robert","AYHAN","Ben","Gerrit","scooterexclusief","Kuno","Teun","Leontine","Johan","Dhr.","Betty","Mahmut","Shandro","Jaro","Peter","twan","Derk","M.Th.","Roel","Henk","RP","Ron","Botox78","Roland","Gerard","frans","Carla","Henk","Jack","Bert","Mireille","Peter","Anoniem","Andrew","Rowan","Evert","Dhr.","Ron","kris","Pieter","J.A.","Hugo","Simon","Wil","Sander","Jordy","Marco","Koos","Klant","Helma","Henk","Michelle","Nathalie","Jan","Ger","Coby","J.C","Sjef","Gijs","Marlon","J.","b.j.","Eric","customer","rob","Mark","Sander","van","Edwin","Jeroen","Coen","GJ","Henk","Martin","Hoekjan","Mike","Dhr.","Ben","Mandana","Han","Branko","tom","Herman","Wim","Ruud.","Sr.","Klant","Colinda","klant","klant","FrankVan","Klant","Els","F.","Klant","Simone","Bas","Tiny","Pieter","Luigina","M.Schoemans","Jeppe","corry","Hendrik","Awm","Wilma","Klom","Roel","Ruud","Lucien","Marije","De","Dhr.","Benno","R.","M.M.","Eric","Inge","Fam.","Cora","v.","Maartje","Sven","Peter","Klant","Frank","JW","Michael","pieter","T.H.","Chin-Tsai","Henk","Sheila","L.","johan","Koetsier","Theo","Jeroen","A.H.","Sjoerd","klant","Jos","B.","Xavier","Erik","vincent","Ed","Donald","Peter","Cor","Yvette","Kim","Wouter","Alfa","Klant","Kinderopvang","Rick","Gert","V.R.","P.jw","R.","Wijn","Lody","Ron","Alexander","HdB","RvR","Jeromme","Blomsma","EW","Piet","Mieke","Marja","Cock","Erwin","Fred","willem","Aw","DF","DE-sign","Sander","Klaas","Veldkamp","Carla","Mark","Ron","Klaas","mark","S.v.s.","floyd","bregman","Sebastian","Johan","Tot","bram","ronald","M.","Cor","Rob040","Tom..","Al","A.B","Denis","sjaak","Jiev","B.","Yeshead","Rolf","klant","Albert","jacq","Ben","Marcel","Piet","Ron","GH","Bertus","martin","Stichting","John","Fer","Frank","Customer","LK","Proceres","Michael","Jos","Bart","Don","de","Sjaak","Deuchevaux","Ik","Ruud","Herman","P.","baron","Paulus","R.","Gradus","Johan","IPManutech","H.T.","Ferry","Rob","Jan","Ronald","Joost","Leo","Ton","ben","Klant","A.","Christian","Wim","Rik","Johan","Jacq","Rubo","Gijs","IKa","Stefan","Fox","Jan","H.","Tom","Rob","Anja","heer","Michael","Gerrit","Toper","Steven","mevrouw","Robin","Rob","Martin","Tom","Tim","Fano","thijs","Justin","Suckmytiddies","Dogus","Jarno","Wim","Aym\u00e9","martin","Paul","Elly","Jan","Peter","Koen","Hans","Dimitria","Ad","Linda","Mojtaba","Ad","Jan","klant","Ruud","Paul","Winneke","JJM","Anneke","Appie","Marco","Ziv","Monique","Mirjam","Ank","John","Sandra","Ankie","Julian","ben","Tevreden","Ralf","KK","Maurice","Iza","Alfea","Carpe","Chantale","Marleen","H.H.Klinge","Sjef","de","Heleen","Dick","TimR","Just","Gerry","Laurens","Benno","A.","DL","Oktay","Ria","Kevin","xander","Jan","Nanne","Conny","Ria","Ilhan","Wisam","Ed","Kim","Julius","An","Veld","Mint","Kim","JF","Laurens","Linde","W.J.","Adrie","Irma","R.","Marcel","Des","Bettina","roger","Henk","Bianca","Liz","Rinus","Rolf","Paul","bob","Barry","Nancy","jjp","Karim","Clover","Jaap","pietje","Ben","Jerry","Paul","Theo","Christa","Guno","Gerrie","Henny","Pieter","Maarten","Nils","arie","fdsa","Amar","Rachel","Jeanne","Han","Bianca","Coen","Jean-Yves","Dianne","Mieke","peter","John","Roxanne","Eric","Martin","Onur","Ac","Monique","Pep","Paul","Celikkaya","Y.","Ferry","frank","Mark","Klant","Melanie","Sabina","Mark","Frits","A.H.de","Judith","Gerda","mvhooff","Hans","Frau","Anke","Ton","Essie","Carmen","E.VAN","Rachid","mevrouw","Jo","Natasha","Rob","eugene","Dirk","Wouter","Ton","Rob","Robbert","Frans","jan","A.A.","Myrte","Gerard","Elly","Petra","Tanja","A.","Guido","F.G.B","LISKEN","Jack","Patricia","Jack","Miranda","Marinus","edwin","Chantal","dhr.","Selma","NL","Ria","Ilse","thijssen","Nathja","Mies","Alycia","Andr\u00e9","Victor","Pablo","Sanne","Sophia","Jeroen","Sjaak","Marianne","Karin","winnaar","Els","Marlies","Anoniem","Patrick","Fins","Y.","Joanne","Maria","Mevrouw","Rob","Sara","Alexander","Nicolet","Hennie","Hans","Mark","Marja","henk","Sherida","Customer","Peter","Mw.","Smits","Esther","C.R.","Jack","Henk-Jan","Kroon","Monique","Nancy","Orcatje22","J.","Werner","Maurits","Wendy","Jan","PJM","Mary","Cock","Ad","Sander","marius","henri","jan","Jolanda","max","Olof","Ekke","johannes","Manja","Ryan","Daisy","Tjeu","Fun","Dennis","Bianca","Kakes","Toon","Gertie","Ellen","willem","Wim","Louisa","Harry","Ronald","Rudra","Ays","Karin","Natalie","Ruud","Angelique","Joene","H.Hendriks","Mr","Antoon","VechtersBazen","Barba","Ben","Rene","Silvia","Klant","PeterTineke","Angela","Bonita","Peter","Thomas","v.d.","Mevrouw","Jessy","Jildau","Ivan","peerke","Soner","Jan","Melissa","Linda","Peter","Malie","bill","Ampj","Gijs","Caroline","Anna","BeBo","Anneke","Ruud","Iris","Chantal","Mike","sharied","Cor","Paul","Jorrit","JR","Gerda","Kees","Gon","Jacky","Ara","Peter","klant","Michel","Heleen","Marjan","Ibo","Barry","Matthy","Jacqueline","Patrick","Beer,","Melanie","Osman","Henk","wj","heer","Guido","harry","Klant","Dilara","Klasina","Grace","klant","Ice92","Wi","Arkadiusz","J.C.D.","Kim","Edwin","Wouter","Kelly","Senna","Sandra","Sibel","Niels","GM","Harrie","Alwina","Liesbeth","Jan-Willem","Frits","Mark","klantCorry","Loys","R.B.","Dirk","Anna","Romain","Marko","Edwin","Jan","Ab","cursist","Klant","Martine","Vreugde","Frank","birgitta","Yvonne","Ineke","Stacy","Riemersma","Miranda","Bert","Fred","Lies","Mevrouw","Yolande","Henk","j.h.","Richard","Constance","Albert","peter","Maurice","David","Frits","joop","Treg","Pablo","klant","Jolanda","Ben","B.","Joop","Dick","Douwe","Tom","Gijs","Bbbb","Inge","Irene","Juliette","Sjaak","Bekker","Jan","Frank","Frank","Julia","Kevin","Philip","Niels","Margriet","Cynthia","Olaf","Thom","Rion","Arish","Jasper","Cor","Nadia","Martin","Noah","Jorg","David","Lotte","Jo\u00ebl","Mayke","Marc","Michelle","Franky","Monique","Andries","Bjorn","Ferry","Ton","Floris","Remco","Heer","Guus","Coen","Nick","Laury","Ben","Sjoerd","Tim","Kevin","Laura","Ad","Antoine","k.oper","Hessel","Frans","Tjeerd","Jeroen","Marlon","gilles","Michiel","Chris","Willeke","Jaimy","Enya","Sarah","Alphons","PCM","Laura","KAM-work","seggelink","dhr.","Frans","Errol","Klant","Emma","Niels","Anne-Marijn","heer","maria","Marcel","Ray","Jos","IL","Emily","Manuel","Cat","1980","E.M.","Dave","Anoniem","Macki","Jerry","astrid","Lilian","F.","customer","D.","Guusje","Johan","Mitchell","Stephen","Luciano","Eddy","Dereck","jeremy","Frank","alexander","Ben","Rob","Sander","Hans","Gt","C.Markx","N.","Bas","An","Elmer","Anja","Erik","Hans","TH","Celeste","Johan","Lars","Johan","Jorden","Kees","Henk","Ricardo","Marrit","Moqsou","Janneke","Romy","Thijs","Mark","Chalsey","Yaron","Roeland","Kim","Jelle","Laura","Santana","Britt","Marcel","MacUser","Lieke","Robert","niels","Maarten","Coen","Vincent","Maurits","Rick","Lieke","Esther","Tom","Jerrel","Filip","Jos","Bart","H\u00fcri","Haico","SW","Niels","Kees","Ewoud","Emile","Saskia","Leon","Dhr.","Max","MJ","Klant","Marieke","Simon","Roger","Rico","Beer","Oscar","Gairo","Christa","Nienke","Peter","Rijschoolzaanstad","zo\u00eb","Nico","Samuel","HEINZ.NU","Wesley","SR","Coen","Fred","Tamara","John","Ilse","Anouk","Zef","Livia","Marlies","Michel","NvD","Lize","Huub","Mireille","Judith","Een","Kees","Remco","Marco","Dr.","David","Marije","Steven","Cees","Jessie","Ap","Dudok","Harrie","Constantijn","Dirk","Joel","Joris","Frank","Klant","M.J","Dennis","Tess","Mike","Tirsa","Donald","Ton","Suzanne","sannesofie","Ellen","Nikkie","Ben","Susette","J.","Leo","mevrouw\t\t\t\t\tde","Joris","Geert","Leonie","Tim","Niels","Andre","B.","Marcus","Monty","heer","Stefan","Martine","Siebren","Ingeborg"]';
        $userNames = json_decode($userNames, true);


        $fieldArray = [ array('acf_fc_layout' => 'flex-text',
                        'flex-text-header' => 'Michael Schumacher Benetton B193',
                        'flex-text-block' => 'De Portugese Grand Prix van 1993 was een Formule 1-motorrace die op 26 september 1993 in Estoril werd gehouden. Het was de veertiende ronde van het Formule 1-seizoen van 1993. Michael Schumacher pakte zijn enige overwinning van het seizoen, de tweede overwinning van zijn carrière, terwijl de tweede plaats genoeg was voor Alain Prost om het kampioenschap binnen te halen, nadat de motor van Ayrton Senna het begaf. Senna werd overtroffen door zijn nieuwe teamgenoot, toekomstig kampioen Mika Häkkinen, maar de Finse coureur crashte. In een omkering van Hongarije stopte Damon Hill op de dummy-grid en startte vanaf de achterkant. Het BMS Scuderia Italia team trok zich na deze race terug uit het kampioenschap.',
                        'icon-select' => '-',
                        'flex-text-spotlight' => 'no-spotlight',
                        'flex-text-column-select' => 'single-column',
                        'flex-text-header-2' => "",
                        'flex-text-block-2' => '',
                        'icon-select-2' => "-",
                        'flex-text-add-image' => false,
                        'flex-text-image' => false,
                        'flex-options' => [ 'flex-bgc-select' => 'geen',
                                            'flex-publish' => true,
                                            'flex-start-date-option' => false,
                                            'flex-end-date-option' => NULL,
                            ]),
                        array('acf_fc_layout' => 'flex-youtube',
                            'content-header-text' => [  'content-header' => 'Michael Schumacher in de Grand Prix van Portugal 1993',
                                                        'content-text' => '',
                                                        'icon-select' => '-'],
                            'flex-youtube-iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/sOXQebQRUZE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                            'flex-options' => [ 'flex-bgc-select' => 'geen',
                                'flex-publish' => true,
                                'flex-start-date-option' => false,
                                'flex-end-date-option' => NULL,
                            ])

                                    ];
        //$post = 8070;
        //$source = get_field('flex', $post);
        //$source[] = $fieldArray;

        //var_dump(update_field('flex', $fieldArray, $post));



        //var_dump(update_field('flex_1_flex-text-block', "This is a test", '8782'));




//    $index = 1;
//        $rating = [3,3.5,4,4,4,4,4,4,4.5,4.5,4.5,4.5,4.5,4.5,4.5,5,5,5,5,5,5,5,5,5];
//
//        echo '<table style="grid-columns: content / content-end;">';
//        foreach($products as $prod) :
//
//            $wooProduct = wc_get_product( $prod );
//
//            $price = $wooProduct->get_price();
//
//            $x = rand(1,5);
//
//            if($price > 150 ) :
//                $x = rand(1,3);
//            endif;
//
//            for($i = 0; $i < $x; $i++) :
//                $date = '20' . rand(19,20) . '-' . rand(1,12) . '-' . rand(1,28) . ' 12:00:00';
//                $ratingIndex = rand(0,23);
//
//                if($price > 150 ) :
//                    $ratingIndex = rand(8,23);
//                endif;
//
//                $comment = [
//                    'comment_author'        => $userNames[$index],
//                    'comment_author_email'  => "info@envisic.nl",
//                    'comment_content'       => "",
//                    'comment_date'          => $date,
//                    'comment_karma'         => 0,
//                    'comment_post_ID'       => $prod,
//                    'comment_type'          => 'review',
//                    'comment_meta'          => array(
//                                                'rating' => $rating[$ratingIndex]
//                                                )
//                    ];
//                echo '<tr><td>'  . $comment['comment_author'] . '</td><td>' . $comment['comment_meta']['rating'] . '</td><td>' . $prod . '</td><td>' . get_the_title($prod) . '</td><td>' . $price . '</td></tr>';
//                wp_insert_comment($comment);
//                $index++;
//            endfor;
//        endforeach;
//        echo '</table>';
    ?>



</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
