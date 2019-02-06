<h1>PAGE DE CONNEXION</h1>

<br />

<div class="row">
    <div class="col-sm-5">


        <form action="<?= $this->Url->build(['controller' => 'Users', 'action' => 'signin']) ?>" method="post">

            <div class="form-group">
                <label for="control-label">EMAIL</label>
                <input type="email" name="email" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="control-label">MOT DE PASSE</label>
                <input type="password" name="password" class="form-control"/>
            </div>

            <div class="form-group">
                <button class="btn btn-danger btn-block" type="submit">SE CONNECTER</button>
            </div>
        </form>

    </div>
</div>

<br />
