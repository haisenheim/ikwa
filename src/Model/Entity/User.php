<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role_id
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Absence[] $absences
 * @property \App\Model\Entity\Ecolage[] $ecolages
 * @property \App\Model\Entity\Inscription[] $inscriptions
 * @property \App\Model\Entity\Note[] $notes
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];


    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

    public function _getName(){

            return $this->last_name . ' - ' . $this->first_name;

    }
}
