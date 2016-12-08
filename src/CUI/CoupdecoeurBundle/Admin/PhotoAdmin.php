<?php

namespace CUI\CoupdecoeurBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use CUI\CoupdecoeurBundle\Entity\Photo;
use Application\Sonata\MediaBundle\Entity\Media;

class PhotoAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('image', 'sonata_type_model_list', array(), array('link_parameters' => array('context' => 'default')));
    }

}