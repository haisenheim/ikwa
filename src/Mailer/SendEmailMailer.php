<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * SendEmail mailer.
 */
class SendEmailMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'SendEmail';

    public function sendEmail(array $data){
        $this->from('clementesso@yahoo.com','Users')
            ->to('clementessomba@gmail.com')
            ->subject(sprintf('Bienvenu',$data->objet))
            ->template('default','default')
            ->set(['data'=>$data->name]);
    }
}
