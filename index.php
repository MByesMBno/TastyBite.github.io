<?php
    include ('databse.php');
    $error='Авторизация';
    if(!empty($_POST['login_auth']) && !empty($_POST['password_auth'])){

        $login=$_POST['login_auth'];
        $Apass=$_POST['password_auth'];
        $aquery = 'SELECT*FROM users WHERE (username OR email)="'.$login.'" AND password="'.$Apass.'"';
        $result = mysqli_query($link, $aquery); 
		$user = mysqli_fetch_assoc($result);
        if(!empty($user)){
            setcookie("login", $login);
            $error=$login;
            flush();
        }else{
            $error= 'Неверный пользователь или пароль!';
        }
    }

    $reg_login=$_POST['login'];
    $reg_pass=$_POST['password'];
    $reg_email=$_POST['email'];
    if(!$reg_email || !$reg_pass || !$reg_login){
        $err='Регистрация';
    }else{
    $query = "INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES (NULL, '$reg_login', '$reg_email', '$reg_pass')";
        mysqli_query($link, $query);
        $err='';
        
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TastyBite</title>
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="font-awesome\css\fontawesome.min.css" type="text/css">
    <link href="style.css" rel="stylesheet">
    <link rel="shortcut icon" href="icon.png" type="image/png">
    

</head>
<body>
    <div class="container wow bounceInDown" id="index">
        <div class="header">
            <a href="#index" id="logo"><img src="icon.png" ></a>
            <div class="nav">
                <ul>
                    <li><a href="#RU">Русская кухня</a></li>
                    <li><a href="#ENG">Иностранная кухня</a></li>
                    <li><a href="#Des">Десерты</a></li>
                    <li><a href="#Drinkables">Напитки</a></li>
                    <li><a onclick="openForm('Reg')"><?=$err?></a></li>
                    <li><a onclick="openForm('myForm')"><?=$error?></a></li>
                    
                </ul>
                </div>
        </div>
    </div>
    
    <div class="form-popup wow fadeInDown" id="myForm">
        <form action="" class="form-container" id="my_form" method="POST">
            
          <label for="email"><b>Почта/Логин</b></label>
          <input type="text" placeholder="Введите Почту" name="login_auth" required>
            
          <label for="psw"><b>Пароль</b></label>
          <input type="password" placeholder="Введите Пароль" name="password_auth" required>
      
          <button type="submit" class="btn" name="sending">Войти</button>
          <button type="submit" class="btn2" onclick="closeForm('myForm')"><i class="fa-solid fa-xmark fa-3x"></i></button>
        </form>
      </div>
    
    <div class="form-popup2 wow fadeInDown" id="Reg">
        <form action="" class="form-container2" method="POST">
           
        <label for="named"><b>Имя</b></label>
        <input type="text" placeholder="Введите Имя пользователя" name="login" required>
        
        <label for="email"><b>Почта</b></label>
          <input type="text" placeholder="Введите Почту" name="email" required> 

        <label for="passw"><b>Пароль</b></label>
        <input type="password" placeholder="Введите Пароль" name="password" required>
          <button type="submit" class="btn4" name="send">Регистрация</button>
          <button type="submit" class="btn5" onclick="closeForm('Reg')"><i class="fa-solid fa-xmark fa-3x"></i></button>
        </form>
    </div>

    <div class="dishes wow fadeInLeft">
        <div class="ru wow fadeInRight" id="RU">
            <div class="card">
                <h1>Русская кухня</h1>
                    <ul>    
                        <li>
                            <h3 id="borshh">Борщ</h3>
                            <img src="borsh.jpg"  target="_blank">
                            <p>Борщ — горячий заправочный суп на основе свёклы, которая придаёт ему характерный красный цвет.
                                Является основным первым блюдом нашей страны.
                            </p>
                            <button id="button-0" onclick="check('goneButton-0','button-0')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-0" class="goneButton" onclick="unlike('goneButton-0','button-0')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>
                        </li>
                        <hr>
                        <li>
                            <h3>Окрошка</h3>
                            <img src="okroshka.jpg" target="_blank">
                            <p>Окрошка — традиционный холодный суп русской кухни, который готовят в весенне-летний период.
                            Обязательными компонентами окрошки являются хлебный (ржаной, ячменный) квас, свежие огурцы, 
                            укроп, растёртый с солью зелёный лук, столовая горчица, крутое яйцо и сметана.
                            В переносном смысле слово «окрошка» употребляется в значении «смесь, смешение разнородных понятий и предметов».   
                            </p>
                            <button id="button-1" onclick="check('goneButton-1','button-1')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-1" class="goneButton" onclick="unlike('goneButton-1','button-1')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>
                        </li>
                        <hr>
                        <li>
                            <h3>Пюре с котлетками</h3>
                            <img src="pure.jpg" target="_blank">
                            <p>Котлеты - это мясное блюдо из фарша в виде лепёшки.
                                Отличным гарниром для котлет, служит картофельное пюре, приготовленное из тертого отварного картофеля и молока.
                            </p>
                            <button id="button-2" onclick="check('goneButton-2','button-2')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-2" class="goneButton" onclick="unlike('goneButton-2','button-2')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>
                        </li>
                        <hr>
                        <li>
                            <h3>Бутерброд</h3>
                            <img src="buter.jpg" target="_blank">
                            <p>Бутерброд — ломтик хлеба или булки с намазанной или уложенной сверху начинкой из какого-либо продукта, готового к употреблению (например масла, сыра, колбасы) или их сочетания. 
                            Популярный вид закуски благодаря простоте приготовления, удобству поедания и переноски. </p>
                            <button id="button-3" onclick="check('goneButton-3','button-3')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-3" class="goneButton" onclick="unlike('goneButton-3','button-3')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>
                        </li>
                        <hr>
                        <li>
                            <h3>Картошка в мундире</h3>
                            <img src="potato.jpg" target="_blank">
                            <p>Картофель в мундире — картофель, подвергшийся для своего приготовления термической обработке целиком, без очистки от кожуры. 
                            Горячий картофель в мундире подаётся в качестве гарнира к рыбе или мясу и очищается от кожуры руками за столом. 
                            Также существуют специальные вилки для очистки картофеля.</p>
                            <button id="button-4" onclick="check('goneButton-4','button-4')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-4" class="goneButton" onclick="unlike('goneButton-4','button-4')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>
                        </li>
                        <hr>
                        <li>
                            <h3>Пельмени</h3>
                            <img src="pelmeni.jpg" target="_blank">
                            <p>Пельмени  — блюдо, распространённое в традиционной кухне народов Северной Евразии: русской, удмуртской, коми и некоторых других финно-угорских народов. 
                            Изготавливаются в виде термически обработанных изделий из пресного теста с начинкой из рубленого мяса или рыбы.</p>
                            <button id="button-5" onclick="check('goneButton-5','button-5')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-5" class="goneButton" onclick="unlike('goneButton-5','button-5')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>
                        </li>
                        <hr>
                        <li>
                            <h3>Драники</h3>
                            <img src="draniki.jpg" target="_blank">
                            <p>Драники готовят из натёртого или давленного сырого картофеля с добавлением соли и яиц. Также добавляется мука — для связывания крахмала. По вкусу могут добавляться другие ингредиенты — например, лук, чеснок. 
                            Полученное тесто перемешивают и жарят на сковороде на растительном масле.
                            В СССР широкое распространение получило приготовление драников с начинкой из фарша по примеру голубцов.
                            </p>
                            <button id="button-6" onclick="check('goneButton-6','button-6')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-6" class="goneButton" onclick="unlike('goneButton-6','button-6')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>
                        </li>
                        <hr>
                        <li>
                            <h3>Шашлык</h3>
                            <img src="meat.jpg" target="_blank">
                            <p>
                                Шашлык — изначально блюдо стран Западной и Центральной Азии, а также Восточной Европы, из баранины мелкой нарезки, нанизанное на шампур и запечённое на древесном угле в мангале; 
                            при этом возможно применение маринада, от простейших специй (соль, чёрный перец, уксус) до сложных многокомпонентных составов, требующих особого приготовления. 
                            Позже название «шашлык» в русском языке распространилось на блюда из свинины, птицы, рыбы, овощей, грибов, приготовленные тем же способом.
                            </p>
                            <button id="button-7" onclick="check('goneButton-7','button-7')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-7" class="goneButton" onclick="unlike('goneButton-7','button-7')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>
                        </li>
                
                    </ul>
            </div>    
        </div>
       
        <div class="eng wow fadeInRight" id="ENG">
            <div class="card">
                <h1>Иностранная кухня</h1>
                    <ul>
                        <li>
                            <h3>Лазанья</h3>
                            <img src="lasagnia.jpg" target="_blank">
                            <p>
                                Лазанья  — макаронное изделие, тонкий лист теста в форме квадрата или прямоугольника, а также блюдо итальянской кухни, традиционно приготовляемое из тонких листов теста (собственно и называющихся лазанья) со слоями различной начинки.
                                Наиболее традиционной начинкой для лазаньи считается начинка на основе рагу с мясным фаршем, залитым соусом бешамель и посыпанным сыром пармезан.
                            </p>
                            <button id="button-8" onclick="check('goneButton-8','button-8')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-8" class="goneButton" onclick="unlike('goneButton-8','button-8')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>
                        </li>
                        <hr>
                        <li>
                            <h3>Бургер</h3>
                            <img src="burger.jpg" target="_blank">
                            <p>
                                Гамбургер (сокр. бургер) — это блюдо, обычно состоящее из котлеты из измельченного мяса, как правило, говядины, помещенной внутрь нарезанной булочки.
                            </p>
                            <button id="button-9" onclick="check('goneButton-9','button-9')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-9" class="goneButton" onclick="unlike('goneButton-9','button-9')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>
                        </li>
                        <hr>
                        <li>
                            <h3>Паста Карбонара</h3>
                            <img src="paste.jpg" target="_blank">
                            <p>
                                Спагетти карбонара – самая известная традиционная итальянская паста в мире. 
                                Карбонара – это нежный сырно-яичный соус, обволакивающий пасту, вперемешку с сочным, поджаренным беконом. 
                                Все это присыпано сыром пармезан и черным молотым перцем
                            </p>
                            <button id="button-10" onclick="check('goneButton-10','button-10')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-10" class="goneButton" onclick="unlike('goneButton-10','button-10')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                        <hr>
                        <li>
                            <h3>Ролл Филадельфия</h3>
                            <img src="fila.jpg" target="_blank">
                            <p>
                                Ролл Филадельфия отличают две особенности: изысканный вкус и питательность. 
                                Нежное сочетание классических ингредиентов: риса, слабосоленого лосося и сыра филадельфия покорило сердца многих ценителей японской кухни.
                                Название ролла «Филадельфия» происходит от бренда сливочного сыра Филадельфия.
                            </p>
                            <button id="button-11" onclick="check('goneButton-11','button-11')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-11" class="goneButton" onclick="unlike('goneButton-11','button-11')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                        <hr>
                        <li>
                            <h3>Ребрешки BBQ</h3>
                            <img src="BBQ.jpg" target="_blank">
                            <p>
                                Под термином «барбекю» в США подразумевается техника приготовления, предполагающая долгое томление мяса при низкой температуре с дымком от поленьев. 
                                Процесс приготовления проходит на открытом воздухе. Обычно, когда говорят о барбекю, имеют в виду гриль, а также специальное приспособление для жарки мяса. 
                                Такой вид готовки обеспечивают мясу особый копчёный вкус. Свиные ребрешки BBQ готовят на основе данного способа приготовления, а также маринуя мясо в соусе BBQ.
                            </p>
                            <button id="button-12" onclick="check('goneButton-12','button-12')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-12" class="goneButton" onclick="unlike('goneButton-12','button-12')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                    </ul>
            </div>    
        </div>
        
        <div class="dessert wow fadeInUp" id="Des">
            <div class="card">  
                <h1>Десерты и выпечка</h1>
                    <ul>
                        <li>
                            <h3>Торт Наполеон</h3>
                            <img src="napoleon.jpg" target="_blank">
                            <p>
                                Наполеон — торт с масляным или заварным кремом.
                                В России и других странах бывшего СССР, а также скандинавских странах используется название «наполеон», происхождение которого неясно. 
                                Одна из версий — искажение французского слова napolitain («неаполитанский»).
                            </p>
                            <button id="button-13" onclick="check('goneButton-13','button-13')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-13" class="goneButton" onclick="unlike('goneButton-13','button-13')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                        <hr>
                        <li>
                            <h3>Пицца</h3>
                            <img src="pizza.jpg" target="_blank">
                            <p>
                                Пицца  — традиционное итальянское блюдо в виде круглой дрожжевой лепёшки, выпекаемой с уложенной сверху начинкой из томатного соуса, сыра и зачастую других ингредиентов, таких как мясо, овощи, грибы и других продуктов. 
                                Небольшую пиццу иногда называют пиццеттой.
                            </p>
                            <button id="button-14" onclick="check('goneButton-14','button-14')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-14" class="goneButton" onclick="unlike('goneButton-14','button-14')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                        <hr>
                        <li>
                            <h3>Ватрушки</h3>
                            <img src="vatrushka.jpg" target="_blank">
                            <p>
                                Ватрушка — выпечное изделие из сдобного дрожжевого теста в виде лепёшки, в середине которой находится начинка как правило из творога, реже из варенья или повидла. 
                                Также их часто называют сметанниками.
                                Изделие древнеславянской, русской и украинской кухонь.
                            </p>
                            <button id="button-15" onclick="check('goneButton-15','button-15')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-15" class="goneButton" onclick="unlike('goneButton-15','button-15')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                        <hr>
                        <li>
                            <h3>Пирожки с картошкой</h3>
                            <img src="piroshki.jpg" target="_blank">
                            <p>
                                Пирожок — небольшое кулинарное изделие из дрожжевого, пресного или слоёного теста с начинкой внутри, которое выпекают в печи или жарят во фритюре. 
                                Форма печёных пирожков «лодочкой» (удлинённо-приплюснутая с заострёнными концами) или овальная, жареных пирожков — овально-приплюснутая или «полумесяцем».
                            </p>
                            <button id="button-16" onclick="check('goneButton-16','button-16')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-16" class="goneButton" onclick="unlike('goneButton-16','button-16')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                        <hr>
                        <li>
                            <h3>Выпечка из Пятерочки(которая нравится половине нашей группы)</h3>
                            <img src="5ochka.jpg" target="_blank">
                            <p>
                                Данная выпечка обладает исключительным вкусом, и за счет низкой стоимости, она превращается из обычного перекуса, в настоящий и полный обед для студента.
                                Она дает при употреблении необычайные способности, например после перекуса слойкой, можно сдать мат. анализ с первого раза. 
                            </p>
                            <button id="button-17" onclick="check('goneButton-17','button-17')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-17" class="goneButton" onclick="unlike('goneButton-17','button-17')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                    </ul>
            </div>    
        </div>
        
        <div class="drink wow fadeInLeft" id="Drinkables">
            <div class="card">        
                <h1>Напитки</h1>
                    <ul>
                        <li>
                            <h3>Кисель</h3>
                            <img src="kisel.jpg" target="_blank">
                            <p>
                                Фруктово-ягодный сладкий кисель  — сладкое десертное желеобразное или жидкое третье блюдо, приготавливаемое из свежих и сушеных фруктов и ягод, фруктово-ягодных соков, сиропов, варенья, молока с добавлением картофельного или кукурузного крахмала, сахара или мёда. 
                                Кисель быстр в приготовлении. 
                                Большинство киселей готовится с добавлением сахара. Обычно в фруктово-ягодные кисели добавляют картофельный крахмал, а в молочные и миндальные  — кукурузный.
                                Быстрое вливание разведённого крахмала в кипящий раствор обеспечивает однородность киселя.
                            </p>
                            <button id="button-18" onclick="check('goneButton-18','button-18')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-18" class="goneButton" onclick="unlike('goneButton-18','button-18')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                        <hr>
                        <li>
                            <h3>Американо</h3>
                            <img src="americano.jpg" target="_blank">
                            <p>
                                Американо  — способ приготовления кофе, заключающийся в соединении определённого количества горячей воды и эспрессо.
                                Существует популярное, но неподтвержденное мнение, что этот напиток придумали в Италии во время Второй мировой войны для американцев как аналог американского популярного фильтрового напитка «регуляр». 
                                Общим у этих двух напитков были лишь большой объём и не очень концентрированный вкус.
                            </p>
                            <button id="button-19" onclick="check('goneButton-19','button-19')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-19" class="goneButton" onclick="unlike('goneButton-19','button-19')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                        <hr>
                        <li>
                            <h3>Какао</h3>
                            <img src="kakao.jpg" target="_blank">
                            <p>
                                Любимый напиток детства многих людей.
                                Какао — напиток, в состав которого обязательно входит размолотое какао, а также молоко (или вода) и сахар.
                            </p>
                            <button id="button-20" onclick="check('goneButton-20','button-20')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-20" class="goneButton" onclick="unlike('goneButton-20','button-20')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                        <hr>
                        <li>
                            <h3>Черный чай</h3>
                            <img src="tea.jpg" target="_blank">
                            <p>
                                Напиток покоривший сердца многих школьников и студентов. Прост,вкусен,полезен.
                            </p>
                            <button id="button-21" onclick="check('goneButton-21','button-21')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-21" class="goneButton" onclick="unlike('goneButton-21','button-21')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>

                        </li>
                        <hr>
                        <li>
                            <h3>Sprite</h3>
                            <img src="sprite.jpg" target="_blank">
                            <p>
                                Sprite  — газированный безалкогольный напиток со вкусом лайма и лимона, принадлежащий американской компании The Coca-Cola Company.
                                Sprite был создан, чтобы конкурировать в первую очередь с 7 Up.
                            </p>
                            <button id="button-22" onclick="check('goneButton-22','button-22')" class="btn"><i class="fa-regular fa-thumbs-up fa-3x wow fadeInLeft"></i></button>
                            <button id="goneButton-22" class="goneButton" onclick="unlike('goneButton-22','button-22')"><i class="fa-solid fa-thumbs-up fa-3x"></i></button>
                            <hr>
                            <p>Добавить комментарий</p>
                            <p><textarea id="text" cols="70" rows="10"></textarea></p>
                            <p><input type="submit" value="Отправить"></p>
                        </li>
                    </ul>
            </div>    
        </div>    
    </div>
    
    <div class="footer">
        <a href="#"><h4>Обратная связь</h4></a>
        <a href="#"><h4>Поддержка</h4></a>
        <a href="#"><h4>Реклама</h4></a>
        <a href="#"><h4>Социальные сети</h4></a>
        <a>+7-(950)-510-78-76</a>
    </div>

    <script src="script.js"></script>
    <script src="wow.min.js"></script>
    <script>
            new WOW().init();
    </script>
    <script src="https://kit.fontawesome.com/6e89603395.js" crossorigin="anonymous"></script>
</body>
</html>


