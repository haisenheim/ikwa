
<div class="container">


    <div class="card">
        <div class="card-header" style="margin-top: 20px">
            <h1 style="padding: 30px; border-radius: 80px; background-color: #cccccc; margin: 20px auto; max-width: 140px">
        <i style="font-size: 80px" class="fa fa-user"></i>
    </h1>

        </div>
        <div class="card-body">
           <div style="max-width: 500px; margin: 20px auto">
               <?= $this->Form->create() ?>
               <?= $this->Form->input('email',['label'=>'EMAIL','class'=>'form-control']) ?>
               <br/>
               <?= $this->Form->input('password',['label'=>'MOT DE PASSE','class'=>'form-control']) ?>
               <hr/>
               <?= $this->Form->button('SE CONNECTER', ['class'=>'btn btn-block btn-danger btn-rounded']) ?>
               <hr/>
               <?= $this->Form->end() ?>
           </div>
        </div>
    </div>
</div>





