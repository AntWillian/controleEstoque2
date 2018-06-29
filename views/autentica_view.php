
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <title>Login Paciente</title>
				<link rel="stylesheet" href="css/layout.css">

    </head>
    <body>
        <div id="back">
          <div class="backRight"></div>
          <div class="backLeft"></div>
        </div>

        <div id="slideBox">
          <div class="topLayer">
            <div class="right">
                <div class="containerLogo">
                 <img src="images/controle.jpg" alt="Logo" width="100%" height="100%">
                </div>
              <div class="content">

                <form class="" action="router.php?controller=usuario&modo=login" method="post">
                  <div class="form-groupDir">
                        <input type="text" name="txt_usuario" value="" placeholder="Usuario" maxlength="14"  >
                  </div>
                    <div class="form-group">
                        <input type="password" name="txt_senha" value="" placeholder="Senha">
                  </div>
                    <button type="submit" name="entrar" value="ENTRAR">ENTRAR</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>
