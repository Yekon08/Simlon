
    <div id="navbar">
            <form id="formu" action="">
                <button id="close"><i class="fas fa-window-close"></i></button>
                        <label for="date-reservation ">Indiquer la date de votre arrivée</label>
                        <input type="date" id="date-reservation">
                        <label for="personnes">Sélectionner le nombre de personnes</label>

                        <input type="number" min="1" max="8">
                        
                        <label for="fname">Nom</label>
                        <input type="text" id="fname" name="firstname" placeholder="Votre nom..">
                    
                        <label for="lname">Prenom</label>
                        <input type="text" id="lname" name="lastname" placeholder="Votre prénom..">
                
                
                        <label for="subject">Message</label>
                        <textarea id="subject" name="subject" placeholder="Votre message.."></textarea>

                   
                    <input type="submit" value="Submit">
              
            </form>
    
        <ul id="niveau1">
            <li><a href="index.php">Notre restaurant</a></li><li class="dropdown">
                <a href="menu.php" class="dropbtn">Menus</a>
                <ul id="drop-content">
                    <li>
                        <a href="menu.php#menu1">
                            <div class="photo" id="ramen"></div>
                            <div class="details">
                                    <div class="nom">Ramen</div>
                                    <div class="prix">6€</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="menu.php#menu2">
                            <div class="photo" id="tonkatsu"></div>
                            <div class="details">
                                <div class="nom">Tonkatsu</div>
                                <div class="prix">6€</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="menu.php#menu3">
                            <div class="photo" id="yakisoba"></div>
                            <div class="details">
                                <div class="nom">Yakisoba</div>
                                <div class="prix">6€</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="menu.php#menu4">
                            <div class="photo" id="bentou"></div>
                            <div class="details">
                                <div class="nom">Bentou</div>
                                <div class="prix">6€</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="menu.php#menu5">
                            <div class="photo" id="sushi"></div>
                            <div class="details">
                                <div class="nom">Sushi</div>
                                <div class="prix">6€</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="menu.php#menu6">
                            <div class="photo" id="wrap"></div>
                            <div class="details">
                                <div class="nom">Wrap</div>
                                <div class="prix">6€</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </li><li>
                <a href="gallery.php">Gallerie</a>
            </li><li><a href="infos.php">Infos</a>
            </li><li class="declencheur">
                <a href="#" id="btn">Réservation</a>
            </li>
        </ul>     
        <button id="burger">
                <i class="fas fa-bars"></i>
            </button>  
</div>
