<?php
namespace App\View\Cell;

use Cake\Collection\Collection;
use Cake\ORM\Table;
use Cake\View\Cell;

/**
 * Roles cell
 *
 */
class PresentationCell extends Cell
{


    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($title)
    {

        $this->loadModel('Articles');

        $presentation = $this->Articles->findById(7)->first();

        $this->set(compact('presentation'));
    }




}
