<h3 class="page-header text-center"> <?= $user->name ?> </h3>

<table class="table table-bordered table-hover">


    <tr>
        <td>PRENOM</td>
        <td><?php echo h($user->first_name); ?></td>
    </tr>
    <tr>
        <td>NOM</td>
        <td><?php echo h($user->last_name); ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo h($user->email); ?></td>
    </tr>

    <tr>
        <td>TELEPHONE</td>
        <td><?php echo h($user->phone); ?></td>
    </tr>
    <tr>
        <td>ADRESSE</td>
        <td><?php echo h($user->address); ?></td>
    </tr>
</table>

<br />
<br />


<br />
<br />


<br />

<a class="btn btn-sm btn-danger" href="<?= $this->Url->build(['action'=>'edit']) ?>"><i class="fa fa-edit"></i> EDITER MON PROFILE</a>

<br />
<br />



