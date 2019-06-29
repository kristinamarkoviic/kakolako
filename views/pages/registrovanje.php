<div id="reglog">
        <div class="desno">
              <h2 class="text-center">Već si naš član?</h2>
              <p>
              Uloguj se sa svojim podacima.
              </p>
            <form id="formLogovanje" method="POST" action="models/korisnici/login.php">
            <label for="Email"><b class="plavo">Email</b></label>
            <input class="inputnama" type="text" name="emaillog" id="emaillog" placeholder="Email" required/>
            <label  for="Nama"><b class="plavo">Lozinka</b></label>
            <input class="inputnama" type="password" name="passlog" id="passlog" placeholder="Lozinka" required/>
            <button type="submit" class="loginBtn" id="loginBtn" name="loginBtn">Uloguj se</button>
            </form>
        </div>
        <div class="levo" id="registerKor">
        <h2 class="text-center" id="regregReg">Registruj se!</h2>
              <p>
              Da bi ste postavili oglas, morate se prvo registrovati.
              </p>
            <form id="formRegister" method="POST" action="models/korisnici/register.php">
            <label for="Nama"><b class="plavo">Ime i prezime</b></label>
            <input class="inputnama" type="text" name="username" id="username" placeholder="Ime i prezime" required/>
            <label for="Email"><b class="plavo">Email</b></label> 
            <input class="inputnama" type="text" name="email" id="email" placeholder="Email" required/>
            <label for="Alamat"><b class="plavo">Lozinka</b></label>
            <input class="inputnama" type="password" name="password" id="password" placeholder="Lozinka" required/>

            
            
            <button type="button" class="registerBtn" id="registerBtn">Registruj se</button>
            </form>
        </div>
        
        
    
    </div>
    
