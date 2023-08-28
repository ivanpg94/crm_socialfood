<?php

namespace Drupal\crm_socialfood\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CrmSocialfoodTable extends FormBase
{
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'crm_socialfood_table';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $pageNo = NULL)
  {
    $database = \Drupal::database();
    $socialfoods = $database->query('SELECT COUNT(DISTINCT SOCIALFOOD_ID) AS unique_count FROM crm_socialfood;')->fetchCol()[0];
    //$socialfoods ='none';
    $pending ='none';
    $validate ='none';
    $denegated ='none';
    $experience ='none';
    $male ='none';
    $female ='none';
    $age ='none';
    $comensal ='none';
    $date ='none';
    $hour ='none';
    $price ='none';
    $country ='none';
    $province ='none';
    $city ='none';

    $totals = [
      'total' => t('TOTALS'),
      'socialfood' => t($socialfoods . ' Socialfoods'),
      'state' => t($pending . ' P '. $validate . ' V '. $denegated .' D'),
      'experience' => t($experience),
      'sex' => t('M ' . $male . ' F ' . $female),
      'age' => t($age),
      'comensales' => t($comensal),
      'sf_date' => t($date),
      'sf_hour' => t($hour),
      'price_pp' => t($price),
      'country' => t($country),
      'province' => t($province),
      'city' => t($city),
    ];
    $form['totals'] = [
      '#type' => 'table',
      '#header' => $totals,
      '#attributes' => ['class' => ['crm-totals']],
    ];
    $header = [
      'SOCIALCHEF' => $this->t('SOCIALCHEF'),
      'SURNAME' => $this->t('SURNAME'),
      'STATE' => $this->t('STATE'),
      'EXPERIENCE' => $this->t('EXPERIENCE'),
      'SEX' => $this->t('SEX'),
      'AGE' => $this->t('AGE'),
      'COMENSALES' => $this->t('COMENSALES'),
      'SF_DATE' => $this->t('SF DATE'),
      'SF_HOUR' => $this->t('SF HOUR'),
      'PRICE_PP' => $this->t('PRICE_PP'),
      'COUNTRY' => $this->t('COUNTRY'),
      'PROVINCE' => $this->t('PROVINCE'),
      'CITY' => $this->t('CITY'),
    ];
    $form['selected_form'] = [
      '#type' => 'hidden',
      '#value' => 'form', // Valor por defecto.
    ];
    $form['table'] = [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $this->get_log(),
      '#empty' => $this->t('No logs found'),
      '#attributes' => ['class' => ['crm-header']],
    ];


    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state)
  {

  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {

  }

  function get_log()
  {
    $SOCIALCHEF = "";
    $SURNAME = "";
    $STATE = "";
    $EXPERIENCE = "";
    $SEX = "";
    $AGE = "";
    $COMENSALES = "";
    $SF_DATE = "";
    $SF_HOUR = "";
    $PRICE_PP = "";
    $COUNTRY = "";
    $PROVINCE = "";
    $CITY = "";


    $SOCIALCHEF = \Drupal::request()->query->get('SOCIALCHEF');
    $SURNAME = \Drupal::request()->query->get('SURNAME');
    $STATE = \Drupal::request()->query->get('STATE');
    $EXPERIENCE = \Drupal::request()->query->get('EXPERIENCE');
    $SEX = \Drupal::request()->query->get('SEX');
    $AGE = \Drupal::request()->query->get('AGE');
    $COMENSALES = \Drupal::request()->query->get('COMENSALES');
    $SF_DATE = \Drupal::request()->query->get('SF_DATE');
    $SF_HOUR = \Drupal::request()->query->get('SF_HOUR');
    $PRICE_PP = \Drupal::request()->query->get('PRICE_PP');
    $COUNTRY = \Drupal::request()->query->get('COUNTRY');
    $PROVINCE = \Drupal::request()->query->get('PROVINCE');
    $CITY = \Drupal::request()->query->get('CITY');

    $res = array();


    $results = \Drupal::database()->select('crm_socialfood', 'st');

    $results->fields('st');
    $res = $results->execute()->fetchAll();
    $ret = [];
    foreach ($res as $row) {

      $ret[] = [
        'SOCIALCHEF' => $row->SOCIALCHEF,
        'SURNAME' => $row->SURNAME,
        'STATE' => $row->STATE,
        'EXPERIENCE' => $row->EXPERIENCE,
        'SEX' => $row->SEX,
        'AGE' => $row->AGE,
        'COMENSALES' => $row->COMENSALES,
        'SF_DATE' => $row->SF_DATE,
        'SF_HOUR' => $row->SF_HOUR,
        'PRICE_PP' => $row->PRICE_PP,
        'COUNTRY' => $row->COUNTRY,
        'PROVINCE' => $row->COUNTRY,
        'CITY' => $row->CITY,
      ];
    }
    return $ret;
  }

}

