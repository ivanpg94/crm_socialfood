<?php

namespace Drupal\crm_socialfood\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class crm_socialfood_filters_users extends FormBase
{
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'crm_socialfood_filters_users';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {

    $form['elige_categoria'] = [
      '#type' => 'radios',
      '#title' => 'ELIGE CATEGORÍA',
      '#options' => [
        'form' => $this->t('mediterranea'),
        'form1' => $this->t('pescado'),
        'form2' => $this->t('carne'),
        'form3' => $this->t('asiática'),
        'form4' => $this->t('italiana'),
        'form5' => $this->t('otros'),
      ],
      '#attributes' => ['class' => ['crm-radio-categoria']],
      '#default_value' => 'form',
    ];

    $form['sensibilidades_alimentarias'] = [
      '#type' => 'radios',
      '#title' => 'SENSIBILIDADES ALIMENTARIAS',
      '#options' => [
        'form' => $this->t('vegetariano'),
        'form1' => $this->t('veganos'),
        'form2' => $this->t('celiacos'),
      ],
      '#attributes' => ['class' => ['crm-radio-sensibilidades']],
      '#default_value' => 'form',
    ];
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state)
  {

  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {

  }

}

