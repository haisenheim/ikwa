<div class="container">
    <div class="text-center" style="">
        <div style="border-radius: 5px; padding: 20px;  margin-left: auto; margin-right: auto">

            <h3 class="page-header" style="margin: 35px auto; padding: 15px 0; background-color: darkcyan; color: white; ">Authentification</h3>

            <form name="login" role="form" class="form-horizontal form-inline" method="post" accept-charset="utf-8" >
                <input name="_csrfToken" type="hidden" value="<?= $token ?>"/>
                <div class="form-group">
                    <label for="username">Email :</label>
                    <input style="border: 1px solid #ccc; border-radius: 4px;" name="username"  id="username" class="form-control" placeholder="Saisir votre email .."/>

                </div>

                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input style="border: 1px solid #ccc; border-radius: 4px;" name="password"  id="password" type="password"  class="form-control" placeholder="Mot de passe"/>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Se Connecter &nbsp;<i class="glyphicon glyphicon-arrow-right"></i> </button>
                </div>
            </form>

            <div style="margin: 30px auto; background-color: whitesmoke; padding: 50px;">
                <div class="row">
                    <div class="form-group">
                        Vous avez perdu votre mot de passe ? <a href="#">Cliquer ici</a>
                    </div>
                    <div class="form-group" style="margin-left: 50px">
                        <a href="#" ><i class=""></i> Se connecter par Gmail</a>
                    </div>
                    <div class="form-group" style="margin-left: 30px">
                        Vous etes nouveau ? <a href="<?= $this->Url->build(['controller'=>'Clients','action'=>'register']) ?>">Creer un compte</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<style>
    .form-group{
        margin-left: 20px;
    }
</style>


