<?php

namespace CUI\CoupdecoeurBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use CUI\CoupdecoeurBundle\Entity\Cadeau;
use CUI\CoupdecoeurBundle\Entity\Newsletter;
use CUI\CoupdecoeurBundle\Entity\Photo;
use CUI\CoupdecoeurBundle\Form\PhotoType;
use CUI\CoupdecoeurBundle\Form\CadeauType;
use CUI\CoupdecoeurBundle\Form\CadeauRepository;
use CUI\CoupdecoeurBundle\Repository\PhotoRepository;

class NewsletterAdmin extends AbstractAdmin
{

    public $supportsPreviewMode = true;

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('titre', 'text')
                ->add('dateEmailing', 'sonata_type_date_picker', array('dp_use_current' => true, 'label'=>'Date d\'envoi de l\'emailing'))
                ->add('description', 'sonata_simple_formatter_type', array(
                                                                            'format' => 'richhtml',
                                                                            'ckeditor_context'     => 'default',
                                                                            'required'=>false
                                                                        ))
                // ->add('lienFacebook', 'text', array('required'=>false))
                ->add('estPublie', 'checkbox', array('required'=>false, 'label'=>'Publier le coup de coeur'))
            ->end()
            ->with('Cadeaux')
                ->add('cadeaux', 'sonata_type_collection', array(
                    'by_reference' => 'false', 'type_options'=>array('delete'=>true)), array('edit' => 'inline', 'inline' => 'table', 'sortable'=>'ordre'))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('dateEmailing');
        $datagridMapper->add('titre');
        // $datagridMapper->add('lienFacebook');
        $datagridMapper->add('estPublie');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('dateEmailing');
        $listMapper->addIdentifier('titre');
        // $listMapper->addIdentifier('lienFacebook');
        $listMapper->addIdentifier('estPublie', 'boolean');
    }

    public function prePersist($newsletter)
    {
        $this->preUpdate($newsletter);
    }

    public function preUpdate($newsletter)
    {
        $newsletter->setCadeaux($newsletter->getCadeaux());
    }
}